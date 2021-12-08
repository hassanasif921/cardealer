<?php
include "header.php";
$id=$_GET['id'];
// include "conn.php";
$queryfeaturescar="select * from features ";    
$resultfeaturescar=mysqli_query($conn,$queryfeaturescar);
?>

<div class="content">

        <!-- Begin Page Content -->
          <?php

if(isset($_POST['btnSubmit']))
{

  $featur=$_POST['featur'];

    $query1="insert into car_features(feature, stock_Id)values('$featur','$id')";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
      // echo "<script>window.location.href ='index.php'</script>";
      echo "<script>alert('Feature Added Successfully')</script>";
    //   header("Location:viewpurpose.php");


       
    }else{
        echo mysqli_error($conn);
    }
} 

?>
<div class="content">
<div class="container">
<form method="POST" enctype="multipart/form-data">

<div class="form-group">
    <label for="StockId"><h4 style="color: gray"> Stock Id</h4></label>
    <input type="text" required class="form-control" name="StockId" placeholder="Enter Stock Id" style="width:50%; " id="StockId" disabled value="<?php echo $id?>">
  </div>

  <div class="form-group">
  <label for="Brands"><h4>  Feature </h4></label>
        <select name="featur" id="Brands" class="form-control">
    <?php
        while($rowb=mysqli_fetch_array($resultfeaturescar))
        {
    ?>
                <option value="<?php echo $rowb[1];?>" >
                <?php echo $rowb[1];?>
                </option>
    <?php
        }
    ?>
        </select>       
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

include "footer.php";
?>

