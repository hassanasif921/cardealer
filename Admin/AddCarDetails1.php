<?php
include "header.php";
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Add Car Details</h1>
          <?php


 if(isset($_POST['submit']))
 {
  $StockId=$_POST['StockId'];
  $Make=$_POST['Make'];
  $Model=$_POST['Model'];
  $YearMonths=$_POST['YearMonths'];
  $Type=$_POST['Type'];
  $ChasisCode=$_POST['ChasisCode'];
  $ChasisNo=$_POST['ChasisNo'];
  $Displacement=$_POST['Displacement'];
  $Mileage=$_POST['Mileage'];
  $Fuel=$_POST['Fuel'];
  $Transmission=$_POST['Transmission'];
  $Drive=$_POST['Drive'];
  $Seats=$_POST['Seats'];
  $Doors=$_POST['Doors'];

  $imagecount=0;
  for($i=1;$i<21  ;$i++){
 
    // $imag=$_FILES['imge'.$i]['tmp_name']; //database
    if(!file_exists($_FILES['imge'.$i]['tmp_name'])){
     
   
    }
    else{
      $imageName=addslashes(file_get_contents($_FILES['imge'.$i]['tmp_name']));
   
     $query1="insert into carimage(I_Car, I_Image) values('$StockId', '$imageName')";
     $result1=mysqli_query($conn,$query1);
     if($result1)
     {
       $imagecount++;
    
     }else{
    //   echo mysqli_error($conn);
         // echo "<script>alert('Some Error Occured')</script>";
     }
    }
  
} 
   
     $query1="insert into cardetails (Stock_id, Make, Model, S_YearMonth, Type, Chasis_code, Chasis_no, Displacement, Mileage, Fuel, Transmission, Drive, Seats, Doors)values('$StockId','$Make','$Model','$YearMonths','$Type','$ChasisCode','$ChasisNo','$Displacement','$Mileage','$Fuel','$Transmission','$Drive','$Seats','$Doors')";
     $result1=mysqli_query($conn,$query1);
     if($result1)
     {
       // echo "<script>window.location.href ='index.php'</script>";
       echo "<script>alert('Car Added Succesfully')</script>";
       // header("Location:viewproperty.php");

       
     }else{
       echo "<script>alert('Some Error Occured')</script>";
     }
   

 }
?>
<div class="content">
<form method="POST" id="upload_multiple_images" enctype="multipart/form-data">
   <div class="form-group">
    <label for="StockId" >Stock Id</label>
    <input type="number"  class="form-control" name="StockId" placeholder="Stock Id"  id="StockId">
  </div>

  <div class="form-group">
    <label for="Make">Make</label>
    <input type="text"  class="form-control" name="Make" placeholder="Make"  id="Make">
  </div>

  <div class="form-group">
    <label for="Model">Model</label>
    <input type="number"  class="form-control" name="Model" placeholder="Model"  id="Model">
  </div>

  <div class="form-group">
    <label for="YearMonths">Year / Month</label>
    <input type="date"  class="form-control" name="YearMonths" placeholder="Year / Month"  id="YearMonths">
  </div>

  <div class="form-group">
    <label for="Type">Type </label>
    <input type="text"  class="form-control" name="Type" placeholder="Type" >
  </div>
  
  <div class="form-group">
    <label for="ChasisCode">Chasis Code </label>
    <input type="text"  class="form-control" name="ChasisCode" placeholder="Chasis Code" >
  </div>

  <div class="form-group">
    <label for="ChasisNo">Chasis No </label>
    <input type="text"  class="form-control" name="ChasisNo" placeholder="Chasis No" >
  </div>

  <div class="form-group">
    <label for="Displacement">Displacement </label>
    <input type="text"  class="form-control" name="Displacement" placeholder="Displacement" >
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

  <div class="form-group">
    <label for="Drive">Drive</label>
    <input type="text"  class="form-control" name="Drive" placeholder="Drive"  id="Drive">
  </div>

  <div class="form-group">
    <label for="Seats">Seats</label>
    <input type="number"  class="form-control" name="Seats" placeholder="Seats"  id="Seats">
  </div>

  <div class="form-group">
    <label for="Doors">Doors</label>
    <input type="number"  class="form-control" name="Doors" placeholder="Doors"  id="Doors">
  </div> 
  <div class="row">
  <input type="file" id="imgupload1" style="display:none;" name="imge1" onchange="readURL1(this);"/> 
  
 <div id="OpenImgUpload1" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
  background-size: 150px  "></div>

  <input type="file" id="imgupload2" style="display:none;" name="imge2"/> 

<div id="OpenImgUpload2" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>

 <input type="file" id="imgupload3" style="display:none;" name="imge3"/> 

<div id="OpenImgUpload3" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>

<input type="file" id="imgupload4" style="display:none;" name="imge4"/> 

<div id="OpenImgUpload4" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>

<input type="file" id="imgupload5" style="display:none;" name="imge5"/> 

<div id="OpenImgUpload5" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>
 </div>
 <div class="row">
  <input type="file" id="imgupload6" style="display:none;" name="imge6"/> 

 <div id="OpenImgUpload6" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
  background-size: 150px;width:150px;height:150px"></div>

  <input type="file" id="imgupload7" style="display:none;" name="imge7"/> 

<div id="OpenImgUpload7" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>

 <input type="file" id="imgupload8" style="display:none;" name="imge8"/> 

<div id="OpenImgUpload8" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>

<input type="file" id="imgupload9" style="display:none;" name="imge9"/> 

<div id="OpenImgUpload9" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>

<input type="file" id="imgupload10" style="display:none;" name="imge10"/> 

<div id="OpenImgUpload10" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>
 </div>
 <div class="row">
  <input type="file" id="imgupload11" style="display:none;" name="imge11"/> 

 <div id="OpenImgUpload11" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
  background-size: 150px;width:150px;height:150px"></div>

  <input type="file" id="imgupload12" style="display:none;" name="imge12"/> 

<div id="OpenImgUpload12" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>

 <input type="file" id="imgupload13" style="display:none;" name="imge13"/> 

<div id="OpenImgUpload13" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>

<input type="file" id="imgupload14" style="display:none;" name="imge14"/> 

<div id="OpenImgUpload14" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>

<input type="file" id="imgupload15" style="display:none;" name="imge15"/> 

<div id="OpenImgUpload15" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>
 </div>
 <div class="row">
  <input type="file" id="imgupload16" style="display:none;" name="imge16"/> 

 <div id="OpenImgUpload16" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
  background-size: 150px;width:150px;height:150px"></div>

  <input type="file" id="imgupload17" style="display:none;" name="imge17"/> 

<div id="OpenImgUpload17" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>

 <input type="file" id="imgupload18" style="display:none;" name="imge18"/> 

<div id="OpenImgUpload18" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>

<input type="file" id="imgupload19" style="display:none;" name="imge19"/> 

<div id="OpenImgUpload19" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>

<input type="file" id="imgupload20" style="display:none;" name="imge20"/> 

<div id="OpenImgUpload20" type="file" style="background-image: url('img/1.png'); background-repeat:no repeat;
 background-size: 150px;width:150px;height:150px"></div>
 </div>
 

  <button type="submit" class="btn btn-primary" name="submit">Upload Images</button> 
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