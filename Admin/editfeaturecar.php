<?php
include "conn.php";
$id=$_GET['id'];
$carid=$_GET['carid'];

$query2="select * from car_features where id=".$id;
$result2=mysqli_query($conn,$query2); 
$row2=mysqli_fetch_row($result2);  
$queryfeaturescar="select * from features ";    
$resultfeaturescar=mysqli_query($conn,$queryfeaturescar);

if(isset($_POST['btnSubmit']))
{ 
    $featur=$_POST['featur'];
 
    $query1="update car_features set feature='$featur' where id='$id'";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        echo "<script>alert('Features Edited Successfully')</script>";
        header("Location:editcardetails.php?id=$carid");


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
          <h1 class="h3 mb-4 text-gray-800">Edit Features </h1>

          <form method="POST">
     
          <div class="form-group">
  <label for="Brands"><h4>  Feature </h4></label>
        <select name="featur" id="Brands" class="form-control">
    <?php
        while($rowb=mysqli_fetch_array($resultfeaturescar))
        {
            if($rowb[1]==$row2[2]){
    ?>          
                <option value="<?php echo $rowb[1];?>" Selected>
                <?php echo $rowb[1];?>
                </option>
    <?php
            }
            else {
                ?>
                 <option value="<?php echo $rowb[1];?>" >
                <?php echo $rowb[1];?>
                </option>
                <?php
            }
        }
    ?>
        </select>       
</div>

  <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
        </div>
        </div>

<?php
include "footer.php";
?>