<?php
$content = file_get_contents("http://localhost:3000/regions/");
$content = json_decode($content, true);
$content = $content["regions"];

$select = '<select name="region" onchange="changement(this)">';
foreach($content as $region) {
    $select .= '<option value="'.$region["id"].'">'.$region["name"].'</option>';
}
$select .= '</select>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add medias</title>
    <link rel="stylesheet" href="public/update.css"/>
    <script type="text/javascript" src="public/update.js"></script>
</head>
<body>
    <h1>This page is used to add medias to the database</h1>
    <form method="POST" action="http://localhost:3000/medias/" id="form" target="_blank">
        <?= $select ?>
        <input type="text" name="name" placeholder="Enter the name of the newspaper..." id="name">
        <input type="text" name="link" placeholder="link..." id="link">
        <input type="text" name="cssSelector" placeholder="Css selector" id="cssSelector">
        <input type="button" onClick="actionFormulaire()" value="Update" id="button">
        <input type="hidden" name="idRegion" id="idRegion" value=<?= '"'.$content[0]["id"].'"'?>/>
    </form>
    <div class="containerRegions">
        <?php
            foreach ($content as $region){
                ?>
                <div class="region">
                    <div class="infoRegion">
                        <p><?= $region['name'] ?></p>
                        <span>id : <?= $region["id"]?></span>
                        <span>code : <?= $region["code"]?></span>
                        <span>cheminImg : <?= $region["path"]?></span>
                    </div>
                    <div class="medias">
                    <?php
                        foreach($region["medias"] as $media){
                            ?>
                            <div class="media">
                                <p><?= $media['name'] ?></p>
                                <ul>
                                    <li>id : <?= $media["id"]?></li>
                                    <li>link : <?= $media["link"]?></li>
                                    <li>cssSelector : <?= $media["cssSelector"]?></li>
                                </ul>
                            </div>
                            <?php
                        }
                    ?>
                    </div>
                </div>
                <?php
            }

        ?>
    </div>
    <?php 
        // echo "<pre>";
        // print_r($content);
        // echo "</pre>";
    ?>
    
</body>
</html>