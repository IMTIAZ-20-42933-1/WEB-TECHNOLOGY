<?php
include '../view/navbar_logged.php';
require_once '../model/model.php';
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file_name_only = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    echo "<a href='../view/change_pp.php'>Back</a>";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    echo "<a href='../view/change_pp.php'>Back</a>";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  echo "<a href='../view/change_pp.php'>Back</a>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  echo "<a href='../view/change_pp.php'>Back</a>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  echo "<a href='../view/change_pp.php'>Back</a>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  echo "<a href='../view/change_pp.php'>Back</a>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $data['image'] = $target_file_name_only;
    $_SESSION['image'] = $target_file_name_only;
    $id = $_POST['id'];
    updatePicture($data,$id);
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    echo "<a href='../view/change_pp.php'>Back</a>";
  } else {
    echo "Sorry, there was an error uploading your file.";
    echo "<a href='../view/change_pp.php'>Back</a>";
  }
}
?>