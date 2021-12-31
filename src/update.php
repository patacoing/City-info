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
    <h1>This page is used to manage medias</h1>
    <form id="form">
        <?= $select ?>
        <input type="text" name="name" placeholder="Enter the name of the newspaper..." id="mediaNameAdd">
        <input type="text" name="link" placeholder="link..." id="mediaLinkAdd">
        <input type="text" name="cssSelector" placeholder="Css selector" id="mediaCssSelectorAdd">
        <input type="button" value="Add" id="addingButton">
        <input type="hidden" name="idRegion" id="idRegion" value=<?= '"'.$content[0]["id"].'"'?>/>
    </form>
    <div class="containerRegions">
        <?php
            foreach ($content as $region){
                ?>
                <div class="region">
                    <div class="infoRegion">
                        <form>
                            <input type="hidden" value="<?= $region["id"]?>"/>
                            <p><?= $region['name'] ?></p>
                            <span>id : <?= $region["id"]?></span>
                            <span>code : <?= $region["code"]?></span>
                            <span>cheminImg : <input type="text" value="<?= $region["path"]?>"/></span>
                            <input type="button" value="Modify" class="modifyingButton" onclick="modifierRegion(this.parentNode)">
                        </form>
                    </div>
                    <div class="medias">
                    <?php
                        foreach($region["medias"] as $media){
                            ?>
                            <div class="media">
                                <form>
                                    <p><input type="text" name="name"class="mediaNameUpdate" value="<?= $media['name']?>"/></p>
                                    <input type="hidden" class="mediaId" value="<?= $media['id']?>"/>
                                    <ul>
                                        <li>id : <?= $media["id"]?></li>
                                        <li>link : <input type="text" name="link"class="mediaLinkUpdate" value="<?= $media["link"]?>"/></li>
                                        <li>cssSelector : <input type="text" name="cssSelector" class="mediaCssSelectorUpdate" value=<?= "'".$media["cssSelector"]."'"?>></li>
                                    </ul>
                                    <input type="button" value="Modify" class="modifyingButton" onclick="modifier(this.parentNode,false)">
                                    <input type="button" value="Delete" class="deletingButton" onclick="modifier(this.parentNode,true)">
                                </form>
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