<?php
$id=$_GET['id'];
include 'conn.php';
$query="delete from brands where B_Id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('Location:viewbrands.php');
}else{
    echo "Failed";
}

?>