<?php
include("includes/init.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/site.css" media="all">

  <title>Gallery</title>
</head>

<body>
<?php include("includes/header.php"); ?>

<h2 class = "index-h2"> Click on a photo to learn more! </h2>

<?php
$records = exec_sql_query($db, "SELECT * FROM images")->fetchAll();
foreach($records as $record){
  echo
  "<div class = 'gallery-style'>
  <figure>
  <!-- Source: (original image) Hanna Kang -->
  <a class = 'click-img' href = 'indiv_image.php?id=".$record["id"]."'><img src = 'uploads/images/".$record["id"].".". $record["file_ext"]."' alt = '".$record["file_name"]."'></a>
  </figure>
  </div>";

}

?>


</body>
</html>
