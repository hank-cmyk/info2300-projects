<?php
  include("includes/init.php");



  const MAX_FILE_SIZE = 1000000;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/site.css" media="all">

  <title>Upload</title>
</head>

<body>
<?php include("includes/header.php"); ?>

<h2>Upload a photo!</h2>


  <form id = "uploadFile" action = "upload.php" method = 'post' enctype = "multipart/form-data">

    <input type = "hidden" name = "MAX_FILE_SIZE" value = "<?php echo MAX_FILE_SIZE; ?>" />

    <div class = "column">

    <div class = 'upload-form'>
      <label class = 'upload-label' for = "image_file" >Upload File:</label>
      <input id = "image_file" type = "file" name = "image_file">
    </div>

    <div class = "upload-form">
      <label class = 'upload-label' for = "image_desc">Description:</label>
      <textarea id = "image_desc" name = "description"></textarea>
    </div>

      <!-- Source of upload icon: (original) Hanna Kang -->
      <button class = 'upload-button' name = "submit_upload" type = "submit"> <div class = "row"> Upload  <img src='images/upload-icon.png' alt='upload icon'></div></button>
    </div>

    </div>
  </form>



<?php
if (isset($_POST["submit_upload"])) {

  $upload_info = $_FILES["image_file"];
  $description = $_POST["description"];

  if ( ($upload_info['error'] == UPLOAD_ERR_OK) && ($upload_info["size"] <=  MAX_FILE_SIZE ) ) {
    $basename = basename($upload_info["name"]);
    $upload_ext = strtolower( pathinfo($basename, PATHINFO_EXTENSION) );
    $description = filter_var($description, FILTER_SANITIZE_STRING);
    $success = TRUE;
  }

  if ($success) {
    $sql = "INSERT INTO images (file_name, file_ext, description) VALUES (:file_name, :file_ext, :description);";
    $params = array(
      ':file_name' => $basename,
      ':file_ext' => $upload_ext,
      ':description' => $description
    );
    $result = exec_sql_query($db, $sql, $params);
    $new_id = $db->lastInsertId("id");
    $new_path = "uploads/images/".$new_id.".".$upload_ext;

    move_uploaded_file($_FILES["image_file"]["tmp_name"], $new_path);

    echo "<p class = upload-confirmation'> Image uploaded successfully! </p>";
  }
  else {
    echo "<p class = upload-confirmation'> Image could not be uploaded. </p>";
  }

}
?>

</body>
</html>
