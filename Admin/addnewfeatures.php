<?php
include "header.php";

// include "conn.php";
?>

<div class="content">

        <!-- Begin Page Content -->
          <?php

if(isset($_POST['btnSubmit']))
{
    $Feature=$_POST['Feature'];

    $query1="insert into features(feature)values('$Feature')";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
      // echo "<script>window.location.href ='index.php'</script>";
      echo "<script>alert('Feature Added Successfully')</script>";
    //   header("Location:viewpurpose.php");


       
    }else{
        echo "<script>alert('Some Error Occured')</script>";
    }
} 

if(isset($_SESSION['admin_id'])) 
{
    $id=$_SESSION['admin_id'];


?>
<div class="content">
<div class="container">
<form method="POST" enctype="multipart/form-data">

<div class="form-group">
    <label for="Feature"><h4 style=""> Feature</h4></label>
    <input type="text" required class="form-control" name="Feature" placeholder="Enter Feature Name" style="width:50%; " id="purpose">
  </div>
  
  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
</div>
</div>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
</div>
      </div>
<?php
}
include "footer.php";
?>

