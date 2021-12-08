<?php 
include "conn.php";
if($_POST["action"] == "insert")
{
    $stid=$_POST['image_id'];
 $file = $_FILES["image"]["name"];
 if(move_uploaded_file($_FILES["image"]["tmp_name"],'cardimages/'.$file)){

 $query = "INSERT INTO carimage(I_Car, I_Image) VALUES ('$stid','$file')";
 if(mysqli_query($conn, $query))
 {
  echo 'Image Inserted into Database';
 }
 }
 
}
if($_POST["action"] == "update")
 {
    $stid=$_POST['image_id'];

  $file = $_FILES["image"]["name"];
  if(move_uploaded_file($_FILES["image"]["tmp_name"],'cardimages/'.$file)){

  $query = "UPDATE carimage  SET I_Image = '$file' WHERE id = '".$_POST["image_id1"]."'";
  if(mysqli_query($conn, $query))
  {
   echo 'Image Updated into Database';
  }
  }
 }
 if($_POST["action"] == "delete")
 {
  $query = "DELETE FROM carimage WHERE id = '".$_POST["image_id"]."'";
  if(mysqli_query($conn, $query))
  { 
   echo 'Image Deleted from Database';
  }
 }
?>