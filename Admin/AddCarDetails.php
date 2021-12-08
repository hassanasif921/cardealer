<?php
include "header.php";
$queryfeatures="select * from features";
$resultfeatures=mysqli_query($conn,$queryfeatures);

$feature=1;
$countfeature=mysqli_num_rows($resultfeatures);
$queryb="select * from brands";
$resultb=mysqli_query($conn,$queryb);
$queryc="select * from country";
$resultc=mysqli_query($conn,$queryc);
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Add Car Details</h1>
          <?php


 if(isset($_POST['submit']))
 {
  $StockId=$_POST['StockId'];
  $Brands=$_POST['Brands'];
  $Model=$_POST['Model'];
  $YearMonths=$_POST['YearMonths'];
  $ChasisNo=$_POST['ChasisNo'];
  $CC=$_POST['CC'];
  $Mileage=$_POST['Mileage'];
  $Fuel=$_POST['Fuel'];
  $Transmission=$_POST['Transmission'];
  $Seats=$_POST['Seats'];
  $FOB=$_POST['FOB'];
  $Color=$_POST['Color'];
  $country=$_POST['country'];
  $btype=$_POST['btype'];
  $drive=$_POST['drive'];
  $etype=$_POST['etype'];
  $doors=$_POST['doors'];
  $steering=$_POST['steering'];

  $totalfiles = count($_FILES['imge1']['name']);
  for($i=0;$i<$totalfiles;$i++){
    $filename = $_FILES['imge1']['name'][$i];

// Upload files and store in database
if(move_uploaded_file($_FILES["imge1"]["tmp_name"][$i],'cardimages/'.$filename)){
        // Image db insert sql
        $insert1 = "INSERT INTO carimage(I_Car, I_Image) VALUES ('$StockId','$filename')";
        
        $iquery = mysqli_query($conn,$insert1);

}
        

        
    else{
        echo 'Error in uploading file - '.$_FILES['imge1']['name'][$i].'<br/>';
    }

    }

 
  
$query1="insert into cardetails (Stock_id, Brands, Model, S_YearMonth, Chasis_no, CC, Mileage, Fuel, Transmission, Seats,Doors, FOB, Color,country,bodytype,enginetype,steering)values('$StockId','$Brands','$Model','$YearMonths','$ChasisNo','$CC','$Mileage','$Fuel','$Transmission','$Seats','$doors','$FOB','$Color','$country','$btype','$etype','$steering')";
$result1=mysqli_query($conn,$query1);
     if($result1)
     {
                echo "<script>alert('Car Added Succesfully')</script>";

        echo "<script>window.location.href ='viewcardetails.php'</script>";
       // header("Location:viewproperty.php");

       
     }  else{
           echo mysqli_error($conn);

     }
     for($y=1;$y<=$countfeature;$y++){
      if(isset($_POST['feature'.$y])){
        $fea=$_POST['feature'.$y];
      $query2="insert into car_features(stock_id,feature) values('$StockId','$fea')";
      $result2=mysqli_query($conn,$query2);}

}
 }
?>
<div class="content">
<form method="POST" id="upload_multiple_images" enctype="multipart/form-data">
   <div class="form-group" id="frmCheckUsername">
    <label for="StockId" >Stock Id</label>
    <input type="number"  class="form-control" name="StockId" placeholder="Stock Id" onBlur="checkAvailability()" id="StockId">
    <span id="user-availability-status"></span>
  </div>
  <p><img src="img/loader.gif" id="loaderIcon" style="display:none" /></p>

  <div class="form-group">
  <label for="Brands"><h4>  Brands </h4></label>
        <select name="Brands" id="Brands" onChange="getState(this.value);" class="form-control">
          <option selected disabled value="">PLEASE SELECT</option>
    <?php
        while($rowb=mysqli_fetch_array($resultb))
        {
    ?>
                <option value="<?php echo $rowb['B_Id'];?>" >
                <?php echo $rowb['Brands'];?>
                </option>
    <?php
        }
    ?>
        </select>       
</div>
<div class="form-group" id="model-list">
    <label for="Model">Model</label>
    <input type="text"  class="form-control" name="Model" placeholder="Model"  id="Model">
  </div>
<div class="form-group">
  <label for="Brands"><h4>  Country </h4></label>
        <select name="country" id="Brands" class="form-control">
    <?php
        while($rowc=mysqli_fetch_array($resultc))
        {
    ?>
                <option value="<?php echo $rowc['Id'];?>" >
                <?php echo $rowc['Cntry_Name'];?>
                </option>
    <?php
        }
    ?>
        </select>       
</div>



  <div class="form-group">
    <label for="YearMonths">Year / Month</label>
    <input type="number"  class="form-control" name="YearMonths" placeholder="Year / Month"  id="YearMonths">
  </div>

  <!-- <div class="form-group">
    <label for="Type">Type </label>
    <input type="text"  class="form-control" name="Type" placeholder="Type" >
  </div>
  
  <div class="form-group">
    <label for="ChasisCode">Chasis Code </label>
    <input type="text"  class="form-control" name="ChasisCode" placeholder="Chasis Code" >
  </div> -->

  <div class="form-group">
    <label for="ChasisNo">Chasis No </label>
    <input type="text"  class="form-control" name="ChasisNo" placeholder="Chasis No" >
  </div>

  <div class="form-group">
    <label for="CC">CC </label>
    <input type="text"  class="form-control" name="CC" placeholder="CC" >
  </div>

  <div class="form-group">
    <label for="Mileage">Mileage </label>
    <input type="text"  class="form-control" name="Mileage" placeholder="Mileage" >
  </div>

  <div class="form-group">
    <label for="Fuel">Fuel </label>
    <input type="text"  class="form-control" name="Fuel" placeholder="Fuel" >
  </div>

  <div class="form-group">
    <label for="Transmission">Transmission</label>
    <input type="text"  class="form-control" name="Transmission" placeholder="Transmission"  id="Transmission">
  </div>

  <!-- <div class="form-group">
    <label for="Drive">Drive</label>
    <input type="text"  class="form-control" name="Drive" placeholder="Drive"  id="Drive"> -->
  </div>

  <div class="form-group">
    <label for="Seats">Seats</label>
    <input type="number"  class="form-control" name="Seats" placeholder="Seats"  id="Seats">
  </div>

  <div class="form-group">
    <label for="FOB">FOB</label>
    <input type="text"  class="form-control" name="FOB" placeholder="FOB"  id="FOB">
  </div> 
  <div class="form-group">
    <label for="Color">Color</label>
    <input type="text"  class="form-control" name="Color" placeholder="Colors"  id="Color">
  </div> 
  <div class="form-group">
    <label for="Color">Body Type</label>
    <input type="text"  class="form-control" name="btype" placeholder="Body Type"  id="Color">
  </div> 
  <div class="form-group">
    <label for="Color">Drive</label>
    <input type="text"  class="form-control" name="drive" placeholder="Drive"  id="Color">
  </div> 
  <div class="form-group">
    <label for="Color">Engine type</label>
    <input type="text"  class="form-control" name="etype" placeholder="Engine type"  id="Color">
  </div> 
  <div class="form-group">
    <label for="Color">Doors</label>
    <input type="text"  class="form-control" name="doors" placeholder="Doors"  id="Color">
  </div> 
  <div class="form-group">
    <label for="Color">Steering</label>
    <input type="text"  class="form-control" name="steering" placeholder="Steering"  id="Color">
  </div> 
  </div>
  <div class="row">
  <input type="file" id="imgupload1"  name="imge1[]" multiple="multiple"/> 
<br>
 


 </div>
 
<h1>Features</h1>
<?php while($rowfeatures=mysqli_fetch_array($resultfeatures))
{
 
  ?>
 <input type="checkbox" style="margin-left:20px" name="feature<?php echo $feature?>" value=" <?php echo " ". $rowfeatures[1]?>"><?php echo $rowfeatures[1]?><br/>
 <?php 
 $feature++; 
}
?>
  <button type="submit" class="btn btn-primary" name="submit">Upload Car</button> 
</form>
</div>




        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

<?php

include "footer.php";
?>
<script>$('#OpenImgUpload1').click(function(){ $('#imgupload1').trigger('click'); });
$('#OpenImgUpload2').click(function(){ $('#imgupload2').trigger('click'); });
$('#OpenImgUpload3').click(function(){ $('#imgupload3').trigger('click'); });
$('#OpenImgUpload4').click(function(){ $('#imgupload4').trigger('click'); });
$('#OpenImgUpload5').click(function(){ $('#imgupload5').trigger('click'); });
$('#OpenImgUpload6').click(function(){ $('#imgupload6').trigger('click'); });
$('#OpenImgUpload7').click(function(){ $('#imgupload7').trigger('click'); });
$('#OpenImgUpload8').click(function(){ $('#imgupload8').trigger('click'); });
$('#OpenImgUpload9').click(function(){ $('#imgupload9').trigger('click'); });
$('#OpenImgUpload10').click(function(){ $('#imgupload10').trigger('click'); });
$('#OpenImgUpload11').click(function(){ $('#imgupload11').trigger('click'); });
$('#OpenImgUpload12').click(function(){ $('#imgupload12').trigger('click'); });
$('#OpenImgUpload13').click(function(){ $('#imgupload13').trigger('click'); });
$('#OpenImgUpload14').click(function(){ $('#imgupload14').trigger('click'); });
$('#OpenImgUpload15').click(function(){ $('#imgupload15').trigger('click'); });
$('#OpenImgUpload16').click(function(){ $('#imgupload16').trigger('click'); });
$('#OpenImgUpload17').click(function(){ $('#imgupload17').trigger('click'); });
$('#OpenImgUpload18').click(function(){ $('#imgupload18').trigger('click'); });
$('#OpenImgUpload19').click(function(){ $('#imgupload19').trigger('click'); });
$('#OpenImgUpload20').click(function(){ $('#imgupload20').trigger('click'); });

</script>
<script type="text/javascript">
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
              $('#OpenImgUpload1').css('background', 'transparent url('+e.target.result +') left top no-repeat');
 
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#StockId").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script>
  function getState(val) {
   // alert(val);
	$.ajax({
	type: "POST",
	url: "modeldd.php",
	data:'make_id='+val,
	success: function(data){
		$("#model-list").html(data);
	}
	});
}
  </script>