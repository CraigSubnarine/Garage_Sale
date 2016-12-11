<?php
include "lib.php";
$db = getDBConnection();
if(isset($_POST['upload'])){
  $image=$_FILES['image']['name'];
  $target="images/".basename($image);
  $imageFileType = pathinfo($target,PATHINFO_EXTENSION);
  if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
  {
    if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg" && $imageFileType != "JPEG" && $imageFileType != "GIF" &&  $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }
    else
    {
      $sql="INSERT INTO `images` (`id`, `name`, `timestamp`) VALUES (NULL, '$image', CURRENT_TIMESTAMP);";
      $res=$db->query($sql);
      echo "Upload successful";
    }
  }
  else {
    echo "Image not uploaded!! ";
  }
}
?>

<!DOCTYPE html>
<html>
<head>

  <title>Image Upload</title>
  <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

</head>
<body>
<?php
  $db=getDBConnection();
?>
<div id="content">
    <form method ="post" action="upload.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="1000000">
        <div>
          <input type ="file" name="image">
          <span class="glyphicon glyphicon glyphicon-paperclip"></span>
        </div>
        <div>
          <input type ="submit" name="upload" value="Upload Image ">
          <span class="glyphicon glyphicon glyphicon-export"></span>
        </div>
      </form>
    </div>
  </body>
  </html>
