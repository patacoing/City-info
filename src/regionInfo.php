<?php
require "vendor/autoload.php";
require "class/Article.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegInfo</title>
    <link rel="stylesheet" href="public/regionInfo.css"/>
    <link rel="stylesheet" href="public/regionInfoAnimation.css"/>
</head>
<body>
    <div id="image"></div>

<?php
use Goutte\Client;
$client = new Client();
$articles = [];
$title;
$href;

require("class/Region.php");

if(isset($_POST["region-path"]) && isset($_POST["region-code"]) && isset($_POST["region-name"])){
    $region_name = $_POST["region-name"];
    $region_path = $_POST["region-path"];
    $region_code = $_POST["region-code"];

    //on récupère la liste des médias via l'api
    $regionAPI = file_get_contents("http://localhost:3000/regions/".$region_code);
    $regionAPI = json_decode($regionAPI, true);
    $regionAPI = $regionAPI["regions"];
    echo "<div class='title'><h1>";
    echo $regionAPI["name"];
    echo "</h1></div>";

    ?>
    <style>
        #image{
            background-image:url("http://localhost/RegInfo/src/<?= $regionAPI["path"] ?>");
        }
    </style>

<?php
    
    foreach($regionAPI["medias"] as $media){
        echo "<div class='titleMedia'><h2>";
        echo $media["name"];
        echo "</h2></div>";

        $crawler = $client->request("GET",$media["link"]);
        $recup = $crawler->filter($media["cssSelector"]);
        $recup = $recup->extract(["href","title"]);

        //Si le titre ne se situe pas dans l'attribut title alors on regarde la "valeur" du noeud (voir méthode extract de Crawler.php)
        if($recup[0][1] == "") $recup = $crawler->filter($media["cssSelector"])->extract(["href","_text"]);
        foreach($recup as $article){
            $href = $article[0];
            $title = $article[1];

            //on regarde si le href contient l'url complet ou juste une partie
            if(!stristr($href,"http")){
                //il faut concaténer l'url du média
                $href = $media["link"].$href;
            }
            $articles[] = new Article($title,$href);
        }
        unset($recup);
        //Problème : si les articles n'ont pas d'attribut title, l'article ne possède pas de titre.
        //idée : si pas de title,  récupérer les enfant du lien ?
        echo '<div class="containerArticles">';
        foreach($articles as $article){
            echo $article->showArticle();
        }
        echo '</div>';
    }

}else header("Location:index.php");
?>
    <script >
        document.querySelector('#image').style.height = document.body.clientHeight+"px";
    </script>
</body>
</html>