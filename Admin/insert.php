<?php


include('conn.php');
if(count($_FILES["image"]["tmp_name"]) > 0)
{
 for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++)
 {
  $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
  $query = "INSERT INTO carimage(I_Image,I_Car) VALUES ('$image_file',1)";
  $statement = $connect->prepare($query);
  $statement->execute();
 }
}


?>
