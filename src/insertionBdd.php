<?php

$dbUser = "admin";
$dbPassword = "mysql";

$data = file_get_contents("data/data.json");
$data = json_decode($data,true);

$bdh = new PDO('mysql:host=localhost;dbname=regInfo',$dbUser,$dbPassword);

$i = 1;
foreach($data["regions"] as $region) {
    //insertion région
    /*Structure : 
    - id
    - code : code de la région
    - name : nom de la région
    - path : chemin vers l'image
    */
    $bdh->query('INSERT INTO region VALUES(0,'.$region["code"].',"'.$region["name"].'","data/img/'.$region["code"].'.jpg")');
    //insetion médias
    foreach($region["medias"] as $media){
        /*Structure :
        - id
        - name : nom du média
        - link : lien vers le média
        - cssSelector : sélecteur css pour récupérer les articles
        - idRegion : clé étrangère pointant vers la région adéquat
        */
        $bdh->query('INSERT INTO media VALUES(0,"'.$media["name"].'","'.$media["link"].'","a_modif",'.$i.')');
    }
    $i++;
}
echo "insertion terminé";



//var_dump($data);
