<?php
 // INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");

$image_id = $_GET["id"];


//function that prints records
function print_record($record) {
  echo ("<div class = 'indiv_img'><img src = 'uploads/images/".$record["id"].".".$record["file_ext"]."'alt = '".$record["file_name"]."'></div>");
}

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


<div class = "row">
<?php

$sql = "SELECT * FROM images WHERE images.id = :image_id";
$params = array(
  ':image_id' => $image_id,
);
$result = exec_sql_query($db, $sql, $params)->fetchAll();
foreach ($result as $record){
  print_record($record);
  echo "<div class = 'column'> <p class='description-style'>".$record['description']."</p>";
}
?>

<div class = "column">
<h2 class = "h2-style"> Tags for this photo: </h2>
<ul>
  <?php
  $sql = "SELECT image_tags.image_id, image_tags.tag_id, tags.tag, tags.id FROM image_tags INNER JOIN images ON images.id = image_tags.image_id INNER JOIN tags ON image_tags.tag_id = tags.id WHERE images.id = :image_id";
  $params = array(
    ':image_id' => $image_id,
  );
  $tags = exec_sql_query($db, $sql, $params)->fetchAll();

  if($tags == NULL) {
    echo "There are no tags for this image.";

  } else {

    foreach ($tags as $tag) {
      $tag_id = $tag["id"];
      global $image_tag_id; ?>

      <div class = "tags-list-style"><div class = "row"><li> <?php echo($tag['tag'].
      "<form class = 'delete-tag-form' id ='delete_tag' action = 'delete-tag.php?".http_build_query(array('image_id' => $image_id,'tag_id' => $tag_id))."' method = 'post'>
        <input type = 'hidden' id = 'image_id' name = 'image_id' value = '$image_id'/>
        <input type = 'hidden' id = 'tag_id' name = 'tag_id' value = '$tag_id'/>
        <button class = 'delete-tag-submit' type = 'submit' name = 'delete_tag'> X </button>
      </form>"); ?></li></div></div>
      <?php }
  }?>

</ul>
</div>

<!-- ADD TAG -->
<div class = "column">
<h2 class = "add-tag-h2">Add New Tag:</h2>
<?php
  echo "<form class = 'add-tag-form' id ='add_tag' action = 'indiv_image.php?id=$image_id' method = 'post'>
          <input class = 'input-style' type = 'text' name='text_tag'></input>
          <button class = 'add-tag-submit' type = 'submit' name = 'add_tag'> + </button>
        </form>";


  $sql = "SELECT tag FROM tags INNER JOIN image_tags ON tags.id = image_tags.tag_id WHERE image_tags.image_id = :image_id";
  $params = array(
    ':image_id' => $image_id,
  );
  $tags = exec_sql_query($db, $sql, $params)->fetchAll();


  if (isset($_POST['add_tag'])) {
    $text = filter_input(INPUT_POST, 'text_tag', FILTER_SANITIZE_STRING);

    $new_tag_name = trim(strtolower($text));

    $add_brandnew = TRUE;

    foreach ($tags as $tag){

      if ($new_tag_name == $tag['tag']){
        echo "<p class = 'confirmation-style'>This tag is already listed</p>";
        $add_brandnew = FALSE;
      }

      if ($new_tag_name == $all_tags['tag']){
        $add_brandnew = FALSE;


        $sql_all_tagnames = "SELECT * FROM tags";

        $all_tags = exec_sql_query($db, $sql_all_tagnames)->fetchAll(PDO::FETCH_ASSOC);

        $array_all_tagnames = [];
        foreach($all_tags as $result){
          array_push($array_all_tagnames, $all_tags["tag"]);
        }

        $get_id_sql = "SELECT tags.id FROM tags WHERE tags.tag = :tag";
        $params = array(
        ':tag' => $new_tag_name
        );
        $result_get_id = exec_sql_query($db, $get_id_sql, $params)->fetchAll();

        $tag_id = $result_get_id[0]["id"];

        $sql_insert = "INSERT INTO image_tags (image_id, tag_id) VALUES (:image_id, :tag_id)";
        $params = array(
          ':image_id' => $image_id,
          ':tag_id' => $new_tag_id
        );

        $final = exec_sql_query($db, $sql_insert, $params);
        if($final) {
          echo "<p class = 'confirmation-style'>Your tag was added.</p>";
        } else {
          echo "<p class = 'confirmation-style'>Your tag was not added.</p>";



      }

    }
  }


    if ($add_brandnew == TRUE){
      $sql_add_tag = "INSERT INTO tags (tag) VALUES (:tag)";
      $params = array(
        ':tag' => $new_tag_name
      );
      $result_add_tag = exec_sql_query($db, $sql_add_tag, $params);


      $sql_get_newid = "SELECT * FROM tags WHERE tag = :tag";
      $params = array(
      ':tag' => $new_tag_name
      );
      $result_get_id = exec_sql_query($db, $sql_get_newid, $params)->fetchAll();

      foreach($result_get_id as $result) {
        $new_tag_id= $result['id'];

      }

      $sql_insert = "INSERT INTO image_tags (image_id, tag_id) VALUES (:image_id, :tag_id)";
      $params = array(
        ':image_id' => $image_id,
        ':tag_id' => $new_tag_id
      );
      $final = exec_sql_query($db, $sql_insert, $params);
      if($final) {
        echo "<p class = 'confirmation-style'> Your tag was added. Refresh! </p>";
      } else {
        echo "<p class = 'confirmation-style'> Your tag was not added.</p>";
      }

    }

  }

?>

<?php

echo "<form class = 'delete-photo-style id ='delete_photo' action = 'delete-image.php?id=$image_id' method = 'post'>
   <button name = 'delete_photo' type = 'submit' value =$image_id > Delete <img src='images/trash-icon.png' alt='trash icon'></button>
 </form>";

?>


</div>
</div>


</body>
</html>
