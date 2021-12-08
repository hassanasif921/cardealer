<?php
include "conn.php";
$id=$_GET['id'];
$query2="select * from features where id=".$id;
$result2=mysqli_query($conn,$query2); 
$row2=mysqli_fetch_row($result2);  


if(isset($_POST['btnSubmit']))
{ 
    $Features=$_POST['Features'];
 
    $query1="update features set feature='$Features' where id='$id'";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        echo "<script>alert('All Features Edited Successfully')</script>";
        header("Location:allfeatures.php");


       // header("Location:viewBlog.php");
    }else{
        echo mysqli_error($conn);
    }
}

include "header.php";

?>

        <!-- Begin Page Content -->
        <div class="content">
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit All Features </h1>

          <form method="POST">
    <label for="Features">All Features </label><br>
    <input type="text" name="Features" value="<?php echo $row2[1];?>" class="form-control"><br>

  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
        </div>
        </div>

<?php
include "footer.php";
?>