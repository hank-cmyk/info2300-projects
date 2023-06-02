<?php
 // INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");

$image_id = $_GET["id"];

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
$image_id = $_POST['delete_photo'];

$sqlfile_ext = "SELECT file_ext FROM images WHERE images.id = :image_id";
$params = array(
  ':image_id' => $image_id,
);
$resultfile_ext = exec_sql_query($db, $sqlfile_ext, $params)->fetchAll();

$file_ext = $resultfile_ext[0]['file_ext'];

$sql_photo = "DELETE FROM images WHERE id = :image_id";
$params = array(
  ':image_id' => $image_id,
);
$result_photos= exec_sql_query($db, $sql_photo, $params);

$file_name = "uploads/images/$image_id.$file_ext";
$unlink = unlink($file_name);
if ($unlink){
  echo ("<p class = 'delete-photo-confirm'> Photo successfully deleted!</p>");
}

?>
