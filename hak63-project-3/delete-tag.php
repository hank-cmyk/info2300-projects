<?php
 // INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/site.css" media="all">

  <title>Photo</title>
</head>

<body>

<?php include("includes/header.php"); ?>

<?php

$image_id = $_POST["image_id"];
$tag_id = $_POST["tag_id"];

$sql = "SELECT image_tags.id FROM image_tags WHERE image_tags.image_id = :image_id AND image_tags.tag_id = :tag_id";
$params = array(
    ':image_id'=>$image_id,
    ':tag_id' => $tag_id
);

$result = exec_sql_query($db, $sql, $params)->fetchAll(PDO::FETCH_ASSOC);
$get_id = $result[0]["id"];
$sql = "DELETE FROM image_tags WHERE id = :delete_id";
$params = array(
    ':delete_id' => $get_id
);
$delete_tag_result = exec_sql_query($db, $sql, $params)->fetchAll(PDO::FETCH_ASSOC);


echo "<p> Tag successfully deleted </p>"

?>
<form id ='back_tag' action = 'indiv_image.php?id=<?php echo $image_id?>' method = 'post'>
  <button class = "back-tag-button" type = 'submit' name = 'back_tag'> &#11013; Back</button>
</form>

</body>
