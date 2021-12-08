<?php
include "header.php";
if(isset($_GET['Search']))
{
  $fields = array('Brands', 'Model', 'S_YearMonth', 'Stock_id', 'bodytype');
  $conditions = array();

  // loop through the defined fields
  foreach($fields as $field){
      // if the field is set and not empty
      if(isset($_GET[$field]) && $_GET[$field] != '') {
          // create a new condition while escaping the value inputed by the user (SQL Injection)
          $conditions[] = "`$field` LIKE '%" . mysqli_real_escape_string($conn,$_GET[$field]) . "%'";
      }
  }

  // builds the query
  $query = "SELECT * FROM cardetails ";
  // if there are conditions defined
  if(count($conditions) > 0) {
      // append the conditions
      $query .= "WHERE " . implode (' AND ', $conditions); // you can change to 'OR', but I suggest to apply the filters cumulative
  }
}
  // define the list of fields
  else {
    $query = "SELECT * FROM cardetails ";

  }

 

?>
<!--=================================
 header -->


<!--=================================
 inner-intro -->
 
 <section class="inner-intro bg-1 bg-overlay-black-70">
  <div class="container">
     <div class="row text-center intro-title">
           <div class="col-md-6 text-md-left d-inline-block">
             <h1 class="text-white">Car listing </h1> 
           </div>
           <div class="col-md-6 text-md-right float-right">
             <!-- <ul class="page-breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                <li><a href="#">pages</a> <i class="fa fa-angle-double-right"></i></li>
                <li><span>listing 01</span> </li>
             </ul> -->
           </div>
     </div>
  </div>
</section>

<!--=================================
 inner-intro -->


<!--=================================
product-listing  -->

<section class="product-listing page-section-ptb">
 <div class="container">
  <div class="row">
   <div class="col-lg-3 col-md-4">
     <div class="listing-sidebar">
      <div class="widget">
        
       <div class="clearfix">
         <ul class="list-group">
            
                </ul>
              </li>
           
            
            
             
              
            </ul>
          </div>
         </div>
        <div class="widget-banner">
          <img class="img-fluid center-block" src="images/banner.jpg" alt="">
       </div>
      </div>
     </div>
     <div class="col-lg-9 col-md-8">
       <div class="sorting-options-main"> 
        <div class="row">
            
       </div>
<section class="search white-bg">
  <div class="container">
   <div class="search-block">
    <div class="row">
     <div class="col-md-8">
      <div class="row">
       <div class="col-md-4">
        <span>Select make</span>
          <div class="selected-box">
            <select id="test" class=" selectpicker  target" >
            <?php 
              $queryfetchdetails=mysqli_query($conn,"select * from brands");
          ?>
          <option disabled selected value="">Please Select</option>
          <?php 
              while($rowfetchdetails=mysqli_fetch_array($queryfetchdetails)){
          ?>
          <option value="<?php echo $rowfetchdetails[0]?>"><?php echo $rowfetchdetails[1]?></option>
          <?php
              }
          ?>
           </select>
          </div>
        </div>
        <div class="col-md-4">
        <span>Select model</span>
          <div class="selected-box" id="model">
           <select class="selectpicker" id="modelvalue">
                <option value="">PLEASE SELECT BRAND </option>
           </select>
         </div>
        </div>
        <div class="col-md-4">
        <span>Select year</span>
         <div class="selected-box">
           <select class="selectpicker" id="modelyear">
            <option selected value="">Year</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
           </select>
          </div>
        </div>
        <div class="col-md-4">
        <span>Select body style</span>
        <div class="selected-box">
         <select class="selectpicker" id="typeofcar">
        <option value="">Type : </option>
        <option value="Sedan">Sedan</option>
        <option value="Hatchback">Hatchback</option>
        <option value="Station Wagon">Station Wagon</option>
        <option value="Coupe">Coupe</option>
        <option value="Open Top">Open Top</option>
        <option value="SUV">SUV</option>
        <option value="MUV">MUV</option>
        <option value="Mini Van">Mini Van</option>
        <option value="Van">Van</option>
        <option value="Pickup">Pickup</option>
        <option value="Truck">Truck</option>
        <option value="Machinery">Machinery</option>
        <option value="Tractor">Tractor</option>
       
           </select>
          </div>
        </div>
        <div class="col-md-4">
      
        </div>
      </div>
     </div>
    <div class="col-md-4">
     <div class="price-slide">
        <div class="price">
        <span>Stock Id</span>
        
           <input type="text"   style="border: 1px solid #e3e3e3; color: #777;  display: block; line-height: 14px; max-width: 100%; min-width: 100%; padding: 14px;" id="stockid" value="">
        
         
          <a class="button btn-search" href="#">Search the Vehicle</a>
          <a class="link" href="#"></a>
        </div>
       </div>
    </div>
   </div>
  </div>
 </div>
</section>      
   
        <div class="row">
        <?php 
                //echo $query;

        $quer1=mysqli_query($conn,$query);
     while($row=mysqli_fetch_array($quer1))
  {
    $querymodel=mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM `model_car` where model_id = '".$row[2]."'"));
    $queryimages=mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM `carimage` where I_Car = '".$row[1]."' Limit 1 "));

     ?>
          <div class="col-lg-4">
            <div class="car-item gray-bg text-center">
             <div class="car-image">
               <img class="img-fluid" src="Admin/cardimages/<?php echo $queryimages[2]?>" alt="">
               <div class="car-overlay-banner">
                <ul> 
                  <li><a href="cardetails.php?id=<?php echo $row[1]?>"><i class="fa fa-link"></i></a></li>
                
                 </ul>
               </div>
             </div>
             <div class="car-list">
               <ul class="list-inline">
               <li><i class="fa fa-registered"></i> <?php echo $row[7]?></li>
               <li><i class="fa fa-cog"></i> <?php echo $row[6]?> </li>
               <li><i class="fa fa-dashboard"></i> <?php echo $row[12]?> mi</li>
               </ul>
            </div>
             <div class="car-content">
              <div class="star">
               <i class="fa fa-star orange-color"></i>
                <i class="fa fa-star orange-color"></i>
                <i class="fa fa-star orange-color"></i>
                <i class="fa fa-star orange-color"></i>
                <i class="fa fa-star orange-color"></i>
               </div>
               <a href="cardetails.php?id=<?php echo $row[1]?>"> <?php echo $querymodel[2]?></a>
               <div class="separator"></div>
               <div class="price">
               
               <span class="new-price">$<?php echo $row[4]?> </span>
               </div>
             </div>
           </div>
          </div>
           <?php }?>
          </div>
         
       </div>
     </div>
  </div>
</section>

<!--=================================
product-listing  -->
 
 
<!--=================================
 footer -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

 <?php 
include "footer.php";

?>
 <script>
$( ".target" ).change(function() {
  var val=this.value;
  $.ajax({
	type: "POST",
	url: "modeldd.php",
	data:'make_id='+val,
	success: function(data){
		$("#model").html(data);
	}
	});
});


  </script>
<script>
$( ".btn-search" ).click(function() {
  var select = document.getElementById('test').value;
var selectmodel = document.getElementById('modelvalue').value;
var selectyear = document.getElementById('modelyear').value;
var stockid = document.getElementById('stockid').value;
var typeofcar = document.getElementById('typeofcar').value;

var index = 1;
window.location = 'carlisting.php?Brands=' + select + '&Model=' + selectmodel + '&S_YearMonth=' + selectyear + '&Stock_id=' + stockid +  '&bodytype=' + typeofcar +  '&Search=' + index;

  //  $.ajax({
	//  type: "POST",
	//  url: "carlisting.php",
  //  data:{'maker': select, 'model': selectmodel, 'year': selectyear, 'stockid': stockid, 'typeofcar': typeofcar, 'page': index},
	//  success: function(data){
	//  	$("#model").html(data);
	//  }
  //   });
});


  </script>