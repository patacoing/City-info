<?php
require "vendor/autoload.php";
require "class/Article.php";

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
    echo "<pre>";
    print_r($regionAPI);
    echo "</pre>";
    
    foreach($regionAPI["medias"] as $media){
        echo "<pre>";
        var_dump($media);
        echo "</pre>";

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
        foreach($articles as $article){
            echo $article->showArticle();
        }
    }

}else header("Location:index.php");
?>