
<?php
$id=$_GET['id'];
include 'conn.php';
$query="delete from features where id='$id'";
$result=mysqli_query($conn,$query);
if($result)
{
    header('Location:allfeatures.php');
}else{
    echo "Failed";
}

?>