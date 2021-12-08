<?php
$id=$_GET['id'];
include 'conn.php';
$query="delete from country where Id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('Location:viewcountry.php');
}else{
    echo "Failed";
}

?>