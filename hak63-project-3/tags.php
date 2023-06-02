<?php include("includes/init.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/site.css" media="all">

  <title>Tags</title>
</head>

<body>
<?php include("includes/header.php"); ?>

<div class = "h2-tags-style">
<h2>Click on a tag to see photos!</h2>
</div>

<?php
  $sql_tags = "SELECT * FROM tags";
  $params = array();
  $result_tag = exec_sql_query($db, $sql_tags, $params);
?>

<ul> <?php
if ($result_tag){
  $result_tags = $result_tag ->fetchAll();

  foreach($result_tags as $tags) { ?>
    <div class = "tags-page-list"> <li> <?php echo ('<a href = "click-tag.php?id='.$tags['id'].'">'.$tags['tag'].'</a>');
    ?></li></div>
  <?php }
} ?>
</ul>

</body>
</html>
