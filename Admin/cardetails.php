<?php
$id=$_GET['id'];
include 'conn.php';

$query="delete from cardetails where id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('Location:viewcardetails.php');
}else{
    echo "Failed";
}

?>