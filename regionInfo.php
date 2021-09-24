<?php
require("class/Region.php");

print_r($_POST);

if(isset($_POST["region-path"])){
    $region_name = $_POST["region-name"];
    $region_path = $_POST["region-path"];

    $medias = file_get_contents("data/data.json");
    $medias = json_decode($medias, true);
    echo "<pre>";
    print_r($medias);
    echo "</pre>";
    $i = 0;
    $j = 0;
    foreach($medias["regions"] as $media){
        foreach($media["media"] as $presse){
            if($presse["name"] == $region_name){
                
                break;
            }
        }
    }

}else header("Location:index.php");
?>