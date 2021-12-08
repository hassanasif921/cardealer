<?php
include "conn.php";
?>

<div class="content">

        <!-- Begin Page Content -->
          <?php
$query2="Select * from carimage";
$result2=mysqli_query($conn,$query2);


if(isset($_POST['btnSubmit']))
{
    $Property=$_POST['Property'];
    $imag=$_FILES['imge']['tmp_name']; //database
    $imageName=addslashes(file_get_contents($imag));

    $query1="insert into image(I_Property, I_Image)values('$Property', '$imageName')";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
      // echo "<script>window.location.href ='index.php'</script>";
      echo "<script>alert('Image Added Successfully')</script>";
      header("Location:viewimage.php");


       
    }else{
        echo "<script>alert('Some Error Occured')</script>";
    }
} 

include "header.php";
if(isset($_SESSION['admin_id'])) 
{
    $id=$_SESSION['admin_id'];


?>
<div class="content">
<div class="container">
<form method="POST" enctype="multipart/form-data">

<div class="form-group">
  <label for="Property"><h4 style="color: blue">  Property </h4></label>
        <select name="Property" id="Property" class="form-control">
    <?php
        while($row2=mysqli_fetch_array($result2))
        {
    ?>
                <option value="<?php echo $row2['P_Id'];?>" >
                <?php echo $row2['P_Details'];?>
                </option>
    <?php
        }
    ?>
        </select>       
</div>

<div class="form-group">
  <label class="required">Upload Image<span>*</span></label>
  <input required type="file" name="imge" id="FilUploader"/>
  </div>  
  
  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
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

