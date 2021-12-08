<?php
$id=$_GET['id'];
include 'conn.php';

$query="delete from property where P_Id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('Location:viewproperty.php');
}else{
    echo "Failed";
}

?>