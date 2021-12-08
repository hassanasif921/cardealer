<?php
include "header.php";
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
            <select class="selectpicker">
            <option>Make </option>
            <option>BMW</option>
            <option>Honda </option>
            <option>Hyundai </option>
            <option>Nissan </option>
            <option>Mercedes Benz </option>
           </select>
          </div>
        </div>
        <div class="col-md-4">
        <span>Select model</span>
          <div class="selected-box">
           <select class="selectpicker">
            <option>Model</option>
            <option>3-Series</option>
            <option>Carrera</option>
            <option>GT-R</option>
            <option>Cayenne</option>
            <option>Mazda6</option>
            <option>Macan</option>
           </select>
         </div>
        </div>
        <div class="col-md-4">
        <span>Select yar</span>
         <div class="selected-box">
           <select class="selectpicker">
            <option>Year</option>
            <option>2010</option>
            <option>2011</option>
            <option>2012</option>
            <option>2013</option>
            <option>2014</option>
            <option>2015</option>
            <option>2016</option>
           </select>
          </div>
        </div>
        <div class="col-md-4">
        <span>Select body style</span>
        <div class="selected-box">
         <select class="selectpicker">
            <option>Body style</option>
            <option>2dr Car</option>
            <option>4dr Car</option>
            <option>Convertible</option>
            <option>Sedan</option>
            <option>Sports Utility</option>
           </select>
          </div>
        </div>
        <div class="col-md-4">
       <span>Select vehicle status</span>
         <div class="selected-box">
           <select class="selectpicker">
            <option>Vehicle Status</option>
            <option>Condition</option>
            <option>All Conditions</option>
            <option>Condition</option>
            <option>Brand New</option>
            <option>Slightly Used</option>
            <option>Used</option> 
           </select>
         </div>
        </div>
      </div>
     </div>
    <div class="col-md-4">
     <div class="price-slide">
        <div class="price">
         <label for="amount">Price Range</label>
          <input type="text" id="amount" class="amount" value="$50 - $300" />
          <div id="slider-range"></div>
          <a class="button" href="#">Search the Vehicle</a>
          <a class="link" href="#">ADVANCED SEARCH</a>
        </div>
       </div>
    </div>
   </div>
  </div>
 </div>
</section>   
        <div class="row">
        <?php 
     $query=mysqli_query($conn,"SELECT * FROM `cardetails` ORDER BY C_id DESC ");
     while($row=mysqli_fetch_array($query))
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

<?php
include "footer.php";
?>