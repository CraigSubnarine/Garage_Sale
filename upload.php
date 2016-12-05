<?php
include "lib.php";
$db = getDBConnection();

if(isset($_POST['upload'])){

  $target="images/".basename($_FILES['image']['name']);

  $image=$_FILES['image']['name'];
//  $text=$_POST['text'];

  $sql="INSERT into `images` (`name`)VALUES ($image);";
  $res=$db->query($sql);

  if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
  {
    echo "IMAGE UPLOADED Successfully";
  }

}
?>


//for testing
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
