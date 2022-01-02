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
<html lang="fr">
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
    <div class="containerRegions"></div>    
</body>
</html>