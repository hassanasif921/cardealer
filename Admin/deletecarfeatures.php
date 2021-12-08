<?php
$id=$_GET['id'];
include 'conn.php';
$carid=$_GET['carid'];

$query="delete from car_features where id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header("Location:editcardetails.php?id=$carid");
}else{
    echo "Failed";
}

?>