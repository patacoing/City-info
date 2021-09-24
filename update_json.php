<?php
$content = file_get_contents("data/data.json");
$content = json_decode($content, true);
$select = '<select name="region">';
$i=0;
foreach($content["regions"] as $region) {
    $select .= '<option value="'.$i.'">'.$region["name"].'</option>';
    $i++;
}
$select .= '</select>';

if(isset($_GET["action"]))
if($_GET["media"] != "")
if($_GET["link"] != ""){
    $media = $_GET["media"];
    $link = $_GET["link"];
    $index =$_GET["region"];
    $content["regions"][$index]["medias"][] = array(
        "name" => $media,
        "link" => $link
    );
    $data = json_encode($content);
    $fic = fopen("data/data.json","w");
    fwrite($fic,$data);
    fclose($fic);
    header("Location:update_json.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update the json document</title>
</head>
<body>
    <h1>This page is used to add new medias in the json file containing all regions</h1>
    <form method="GET" action="">
        <?= $select ?>
        <input type="text" name="media" placeholder="Enter the name of the newspaper...">
        <input type="text" name="link" placeholder="link...">
        <input type="submit" value="Update" name="action">
    </form>
    <?php 
        echo "<pre>";
        print_r($content["regions"]);
        echo "</pre>";
    ?>
</body>
</html>