<?php
include "header.php";
$id=$_GET['id'];

$query2="select * from cardetails where Stock_id=".$id;
$result2=mysqli_query($conn,$query2); 
$row2=mysqli_fetch_row($result2);  
$queryfeatures="select * from car_features where Stock_id=".$id;
$resultfeatures=mysqli_query($conn,$queryfeatures);
$queryimg="select * from carimage where I_Car=".$id;
$resultimg=mysqli_query($conn,$queryimg); 
$UserQuerybrand="select * from brands";  //getting data from product table based on given id
$UserResultbrand=mysqli_query($conn,$UserQuerybrand);//executing query
$queryc="select * from country";
$resultc=mysqli_query($conn,$queryc);
if(isset($_POST['btnSubmit']))
{ 
  $Brands=$_POST['Brands'];
  $country=$_POST['country'];

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
  $btype=$_POST['btype'];
  $etype=$_POST['etype'];
  $doors=$_POST['doors'];
  $steering=$_POST['steering'];
   // $query1="update cardetails set Stock_id='$StockId', Make='$Make', Model='$Model', S_YearMonth='$YearMonths', Type='test', Chasis_code='$ChasisCode', Chasis_no='$ChasisNo', Displacement='$Displacement', Mileage='$Mileage', Fuel='$Fuel, Transmission='$Transmission', Drive=124, Seats='$Seats', Doors='$Doors' where C_id=9";
   $query1="UPDATE cardetails SET Model='$Model',Brands='$Brands',FOB='$FOB',Color='$Color',CC='$CC',S_YearMonth='$YearMonths',Chasis_no='$ChasisNo',Mileage='$Mileage',Fuel='$Fuel',Transmission='$Transmission',Seats='$Seats',Doors='$doors',country='$country',bodytype='$btype',enginetype='$etype',steering='$steering' WHERE Stock_id='".$id."'"; 
   $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        echo "<script>alert('Car Details Edited Successfully')</script>";

       // header("Location:viewBlog.php");
    }else{
        echo mysqli_error($conn);
    }
}


?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Edit Car Details</h1>

          <form method="POST">
          <form method="POST" id="upload_multiple_images" enctype="multipart/form-data">
   <div class="form-group" id="frmCheckUsername">
    <label for="StockId" >Stock Id</label>
    <input type="number"  class="form-control" value="<?php echo $row2[1]?>" name="StockId" placeholder="Stock Id" onBlur="checkAvailability()" id="StockId">
    <span id="user-availability-status"></span>
  </div>
  <p><img src="img/loader.gif" id="loaderIcon" style="display:none" /></p>

  <div class="form-group">
  <label for="Brands">Brand</label><br>
    <select name="Brands" class="form-control">
        <?php
        while($UserRowbrand=mysqli_fetch_array($UserResultbrand))
        {
            if($UserRowbrand['B_Id']==$row2[3])
            {
            ?>
            <option value="<?php echo $UserRowbrand['B_Id'];?>" selected>
            <?php echo $UserRowbrand['Brands'];?>
            </option>
            <?php
            }
            else {
                ?>
            <option value="<?php echo $UserRowbrand['B_Id'];?>">
            <?php echo $UserRowbrand['Brands'];?>
            </option>
        <?php
        }
    }
        ?>
    </select>     
</div>

<div class="form-group">
  <label for="country">Country</label><br>
    <select name="country" class="form-control">
        <?php
        while($UserRowc=mysqli_fetch_array($resultc))
        {
            if($UserRowc['Id']==$row2[18])
            {
            ?>
            <option value="<?php echo $UserRowc['Id'];?>" selected>
            <?php echo $UserRowc['Cntry_Name'];?>
            </option>
            <?php
            }
            else {
                ?>
            <option value="<?php echo $UserRowc['Id'];?>">
            <?php echo $UserRowc['Cntry_Name'];?>
            </option>
        <?php
        }
    }
        ?>
    </select>     
</div>
<div class="form-group">
    <label for="Model">Model</label>
    <input type="text"  class="form-control" name="Model" placeholder="Model"  value="<?php echo $row2[2]?>" id="Model">
  </div>

  <div class="form-group">
    <label for="YearMonths">Year / Month</label>
    <input type="number"  class="form-control" name="YearMonths" value="<?php echo $row2[7]?>" placeholder="Year / Month"  id="YearMonths">
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
    <input type="text"  class="form-control" name="ChasisNo" placeholder="Chasis No" value="<?php echo $row2[10]?>">
  </div>

  <div class="form-group">
    <label for="CC">CC </label>
    <input type="text"  class="form-control" name="CC" placeholder="CC" value="<?php echo $row2[6]?>">
  </div>

  <div class="form-group">
    <label for="Mileage">Mileage </label>
    <input type="text"  class="form-control" name="Mileage" placeholder="Mileage" value="<?php echo $row2[12]?>">
  </div>

  <div class="form-group">
    <label for="Fuel">Fuel </label>
    <input type="text"  class="form-control" name="Fuel" placeholder="Fuel" value="<?php echo $row2[13]?>">
  </div>

  <div class="form-group">
    <label for="Transmission">Transmission</label>
    <input type="text"  class="form-control" name="Transmission" placeholder="Transmission"  id="Transmission" value="<?php echo $row2[14]?>">
  </div>

  <!-- <div class="form-group">
    <label for="Drive">Drive</label>
    <input type="text"  class="form-control" name="Drive" placeholder="Drive"  id="Drive"> -->
  </div>

  <div class="form-group">
    <label for="Seats">Seats</label>
    <input type="number"  class="form-control" name="Seats" placeholder="Seats"  id="Seats" value="<?php echo $row2[16]?>">
  </div>

  <div class="form-group">
    <label for="FOB">FOB</label>
    <input type="text"  class="form-control" name="FOB" placeholder="FOB"  id="FOB" value="<?php echo $row2[4]?>">
  </div> 
  <div class="form-group">
    <label for="Color">Color</label>
    <input type="text"  class="form-control" name="Color" placeholder="Colors"  id="Color" value="<?php echo $row2[5]?>">
  </div> 
  <div class="form-group">
    <label for="Color">Body Type</label>
    <input type="text"  class="form-control" name="btype" placeholder="Body Type"  id="Color" value="<?php echo $row2[20]?>">
  </div> 

  <div class="form-group">
    <label for="Color">Engine type</label>
    <input type="text"  class="form-control" name="etype" placeholder="Engine type"  id="Color"value="<?php echo $row2[21]?>">
  </div> 
  <div class="form-group">
    <label for="Color">Doors</label>
    <input type="text"  class="form-control" name="doors" placeholder="Doors"  id="Color" value="<?php echo $row2[17]?>">
  </div> 
  <div class="form-group">
    <label for="Color">Steering</label>
    <input type="text"  class="form-control" name="steering" placeholder="Steering"  id="Color" value="<?php echo $row2[22]?>">
  </div> 
    <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
    <h1>Features</h1>
   
          <a href='addfeature.php?id=<?php echo $id?>' class="btn" style="background-color: #4CAF50; color: white; margin-left:5px; margin-top:5px; border-radius:10px;">Add Features</a><br><br>
          <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
            <th>Id</th>
            <th>Stock Id</th>
            <th>Features</th>
            <th>Action</th>

        </tr>
        <?php while($row=mysqli_fetch_array($resultfeatures))
        {
        echo "<tr>";
        echo"<td>".$row[0]."</td>";
        echo "<td>".$row[1]."</td>";
        echo "<td>".$row[2]."</td>";
        echo "<td><a href='editfeaturecar.php?id=".$row[0]."&carid=$id'>Edit</a>  <a href='deletecarfeatures.php?id=".$row[0]."&carid=$id''>Delete</a>  </td>";
          
          echo "</tr>";
        }
    ?>
    </table>
    </table>
              </div>
            </div>
            <h1>Images</h1>
            <button type="button" name="add" id="add" class="btn btn-success">Add</button>
<div class="container">
         
  <table class="table table-hover">
    <thead>
      <tr>
      <th>Id</th>
        <th>Stock Id</th>
        <th>IMAGE</th>
        <th>EDIT</th>
        <th>DELETE</th>

      </tr>
    </thead>
    <tbody>
    <?php 
while($rowimg=mysqli_fetch_row($resultimg)){
 
?>
      <tr>
      <td><?php echo $rowimg[0]?></td>
        <td><?php echo $id?></td>
        <td>
 <image src="cardimages/<?php echo $rowimg[2]?>" height="150px" width="150px"></div></td>
 <td><button type="button" name="update" class="btn btn-warning bt-xs update" id="<?php echo $rowimg[0]?>">Change</button></td> 
 <td><button type="button" name="delete" class="btn btn-danger bt-xs delete"  id="<?php echo $rowimg[0]?>">Remove</button></td>

      </tr>
     <?php 
}
     ?>
    </tbody>
  </table>
</div>

    
</form>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

<?php

include "footer.php";
?>


<div id="imageModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Add Image</h4>
   </div>
   <div class="modal-body">
    <form id="image_form" method="post" enctype="multipart/form-data" >
     <label>Select Image</label>
     <input type="file" name="image" id="image" /><br />
     <input type="text" name="action" id="action" value="insert" />
     <input type="text" name="image_id" id="image_id" value="<?php echo $id?>"/>
     <input type="text" name="image_id1" id="image_id1"/>

     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
      
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
 
<script>  
$(document).ready(function(){
 
 fetch_data();

 function fetch_data()
 {
  var action = "fetch";
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#image_data').html(data);
   }
  })
 }
 $('#add').click(function(){
  $('#imageModal').modal('show');
  $('#image_form')[0].reset();
  $('.modal-title').text("Add Image");
  $('#action').val('insert');
  $('#insert').val("Insert");
 });
 $('#image_form').submit(function(event){
  event.preventDefault();
  var image_name = $('#image').val();
  if(image_name == '')
  {
   alert("Please Select Image");
   return false;
  }
  else
  {
   var extension = $('#image').val().split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    alert("Invalid Image File");
    $('#image').val('');
    return false;
   }
   else
   {
    $.ajax({
     url:"action.php",
     method:"POST",
     data:new FormData(this),
     contentType:false,
     processData:false,
     success:function(data)
     {
      alert(data);
      fetch_data();
      $('#image_form')[0].reset();
      $('#imageModal').modal('hide');
     }
    });
   }
  }
 });
 $(document).on('click', '.update', function(){
  $('#image_id1').val($(this).attr("Id"));
  $('#action').val("update");
  $('.modal-title').text("Update Image");
  $('#insert').val("Update");
  $('#imageModal').modal("show");
 });
 $(document).on('click', '.delete', function(){
  var image_id = $(this).attr("Id");
  var action = "delete";
  if(confirm("Are you sure you want to remove this image from database?"))
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{image_id:image_id, action:action},
    success:function(data)
    {
     alert(data);
     fetch_data();
    }
   })
  }
  else
  {
   return false;
  }
 });
});  
</script>
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
<script type="text/javascript">
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#OpenImgUpload2').css('background', 'transparent url('+e.target.result +') left top no-repeat');
 
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>