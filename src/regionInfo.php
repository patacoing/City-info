<?php
require "vendor/autoload.php";
require "class/Article.php";

use Goutte\Client;
$client = new Client();

require("class/Region.php");

print_r($_POST);

if(isset($_POST["region-path"])){
    $region_name = $_POST["region-name"];
    $region_path = $_POST["region-path"];
    $region_code = $_POST["region-code"];
    /*
    $medias = file_get_contents("data/data.json");
    $medias = json_decode($medias, true);
    */
    //on récupère la liste des médias via l'api
    $regionAPI = file_get_contents("http://localhost:3000/regions/".$region_code);
    $regionAPI = json_decode($regionAPI, true);
    $regionAPI = $regionAPI["regions"];
    echo "<pre>";
    print_r($regionAPI);
    echo "</pre>";
    
    /*
    foreach($medias["regions"] as $media){
        if($media["name"] == $region_name){
            foreach($media["medias"] as $presse){
                var_dump($presse);
                //sites de presse de la région
                echo $presse["link"]."<br>";

                $crawler = $client->request("GET",$presse["link"]);
                $recup = ($crawler->filter($presse["cssSelector"])->extract(["href","title"]));
                foreach($recup as $article){
                    if(!empty($article[0]))$articles[] = new Article($article[1],$article[0]);
                }
                unset($recup);

                foreach($articles as $article){
                    echo $article->showArticle();
                }
                

                break;
            }
        }
        
    }*/

}else header("Location:index.php");
?>