<?php
include "lib.php";
session_start();
$db = getDBConnection();
$user=$_SESSION['id'];

if(isset($_POST['upload'])){

  $target="images/".basename($_FILES['image']['name']);

  $image=$_FILES['image']['name'];//gets image from post form
  echo $image."   ";

  $temp = explode(".", $_FILES["image"]["name"]);
  $newfilename = round(microtime(true)) . '.' . end($temp);

  if(move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $newfilename)){//moves image to "images" folder

    if($db!=null){
      $sql="INSERT INTO `images`(`name`) VALUES($newfilename)";
      $res=$db->query($sql);
      $id=$db->insert_id;
      echo $id;

      echo "IMAGE UPLOADED Successfully";
    }
    else
      echo "!! No db connection. !!";
  }

}
?>


<!DOCTYPE html>
<html>
<head>

  <title>Image Upload</title>
  <link rel="stylesheet" type="text/css" href="style.css">
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
        </div>

        <div>
          <input type ="submit" name="upload" value="Upload image">
        </div>
      </form>
    </div>
  </body>
  </html>
