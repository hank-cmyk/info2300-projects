<?php
 // INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");

$tag_id = $_GET['id'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/site.css" media="all">

  <title>Photos from tag</title>
</head>

<body>
<?php include("includes/header.php"); ?>

<div class = "h2-clicktag-style">
<h2>
  <?php
  $sql = "SELECT tag FROM tags WHERE id = :tag_id";
  $params = array(
    ':tag_id' => $tag_id,
  );
  $tag_name = exec_sql_query($db, $sql, $params)->fetchAll();

    echo ($tag_name[0]['tag'].' - tag');

  ?>
</h2>
</div>

<form id ='back_tag' action = 'tags.php' method = 'post'>
  <button class = "back-tag-button" type = 'submit' name = 'back_tag'> &#11013; Back </button>
</form>

<?php
$image_sql = "SELECT * FROM images INNER JOIN image_tags ON images.id = image_tags.image_id INNER JOIN tags ON tags.id = image_tags.tag_id WHERE image_tags.tag_id = :tag_id";
$params = array(
  ':tag_id' => $tag_id,
);
$images = exec_sql_query($db, $image_sql, $params)->fetchAll();

foreach($images as $tag_image){

  echo "<div class= 'tag_images'>
    <figure>
    <img src = 'uploads/images/".$tag_image[0].".".$tag_image["file_ext"]."' alt = '".$tag_image["file_name"]."'>
    </figure>
    </div>";
}
?>

</body>
</html>
