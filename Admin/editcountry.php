

<?php
include "conn.php";
$id=$_GET['id'];
$query2="select * from country where Id=".$id;
$result2=mysqli_query($conn,$query2); 
$row2=mysqli_fetch_row($result2);  


if(isset($_POST['btnSubmit']))
{ 
    $Country=$_POST['Country'];
 
    $query1="update country set Cntry_Name='$Country' where Id='$id'";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        echo "<script>alert('Country Edited Successfully')</script>";
        header("Location:viewcountry.php");


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
          <h1 class="h3 mb-4 text-gray-800">Edit Country </h1>

          <form method="POST">
    <label for="Country">Country </label><br>
    <input type="text" name="Country" value="<?php echo $row2[1];?>" class="form-control"><br>

  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
        </div>
        </div>

<?php
include "footer.php";
?>