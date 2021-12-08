<?php
include "conn.php";
$id=$_GET['id'];
$query2="select * from brands where B_Id=".$id;
$result2=mysqli_query($conn,$query2); 
$row2=mysqli_fetch_row($result2);  


if(isset($_POST['btnSubmit']))
{ 
    $Brands=$_POST['Brands'];
 
    $query1="update brands set brands='$Brands' where B_Id='$id'";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        echo "<script>alert('Brands Edited Successfully')</script>";
        header("Location:viewbrands.php");


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
          <h1 class="h3 mb-4 text-gray-800">Edit Brands </h1>

          <form method="POST">
    <label for="Brands">Brands </label><br>
    <input type="text" name="Brands" value="<?php echo $row2[1];?>" ><br>

  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
        </div>
        </div>

<?php
include "footer.php";
?>