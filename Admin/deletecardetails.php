<?php
$id=$_GET['id'];
include 'conn.php';

$query="delete from cardetails where stock_id='$id'";
$result=mysqli_query($conn,$query);

$queryimages="delete from carimage where I_Car='$id'";
$resultimages=mysqli_query($conn,$queryimages);

$queryfeature="delete from car_features where stock_id='$id'";
$resultfeature=mysqli_query($conn,$queryfeature);
if($result && $resultimages && $resultfeature)
{
    header('Location:viewcardetails.php');
}else{
    echo "Failed";
}

?>