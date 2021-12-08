<?php
include "header.php";
$row=mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM `cardetails` where Stock_id = '".$_GET['id']."' "));
$querymodel=mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM `model_car` where model_id = '".$row[2]."'"));
$querymake=mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM `brands` where B_Id = '".$row[3]."'"));

?>
<!--=================================
 header -->


<!--=================================
 inner-intro -->
 
 <section class="inner-intro bg-1 bg-overlay-black-70">
  <div class="container">
     <div class="row text-center intro-title">
           <div class="col-md-6 text-md-left d-inline-block">
             <h1 class="text-white"><?php echo $querymodel[2]?> </h1>
           </div>
           <div class="col-md-6 text-md-right float-right">
             <ul class="page-breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                <li><a href="#">CAR DETAILS</a> <i class="fa fa-angle-double-right"></i></li>
             
             </ul>
           </div>
     </div>
  </div>
</section>

<!--=================================
 inner-intro -->


<!--=================================
car-details  -->

<section class="car-details page-section-ptb">
  <div class="container">
    <div class="row">
     <div class="col-md-9">
       
       <h3><?php echo $querymodel[2]?> </h3>
      </div>
     <div class="col-md-3">
      <div class="car-price text-lg-right">
         <strong>$ <?php echo $row[4]?></strong>
        
       </div> 
      </div> 
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="details-nav">
            <ul>
              <li>
                <a href="#" data-toggle="modal" data-target="#exampleModal">
                 <i class="fa fa-question-circle"></i>Request More Info
                </a>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Request More Info</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
						<div id="rmi_notice" class="form-notice" style="display:none;"></div>
                        <p class="sub-title">Please fill out the information below and one of our representatives will contact you regarding your more information request. </p>
                        <form class="gray-form reset_css" id="rmi_form" action="http://themes.potenzaglobalsolutions.com/html/cardealer/post">
                          <input type="hidden" name="action" value="request_more_info" />
                          <div class="alrt">
                            <span class="alrt"></span>
                          </div>
                          <div class="form-group">
                            <label>Name*</label>
                            <input type="text" class="form-control" name="rmi_name" id="rmi_name" />
                          </div>
                          <div class="form-group">
                            <label>Email address*</label>
                            <input type="text" class="form-control" name="rmi_email" id="rmi_email" />
                          </div>
                          <div class="form-group">
                            <label>Phone*</label>
                            <input type="text" class="form-control"  id="rmi_phone" name="rmi_phone" >
                          </div>
                          <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" name="rmi_message" id="rmi_message"></textarea>                            
                          </div>
                          <div class="form-group">
                            <label>Preferred Contact*</label>
                            <div class="radio">
                              <label><input type="radio" name="rmi_radio" value="Email" checked="checked"/>Email</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="rmi_radio" value="Phone" />Phone</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div id="recaptcha1"></div>
                          </div>
                          <div class="form-group">
                            <a class="button red" id="request_more_info_submit">Submit <i class="fa fa-spinner fa-spin fa-fw btn-loader" style="display: none;"></i></a>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            
              <li>
               
                <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Make an Offer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
						<div id="mao_notice" class="form-notice" style="display:none;"></div>
                        <form class="gray-form reset_css" action="http://themes.potenzaglobalsolutions.com/html/cardealer/post" id="mao_form">
                          <input type="hidden" name="action" value="make_an_offer" />
                          <div class="form-group">
                            <label>Name*</label>
                            <input type="text" id="mao_name" name="mao_name" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Email address*</label>
                            <input type="text" id="mao_email" name="mao_email" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Phone*</label>
                            <input type="text" id="mao_phone" name="mao_phone" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Offered Price*</label>
                            <input type="text" id="mao_price" name="mao_price" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Financing Required*</label>
                            <div class="selected-box">
                              <select class="selectpicker" id="mao_financing" name="mao_financing">
                                <option value="Yes">Yes </option>
                                <option value="No">No</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>additional Comments/Conditions*</label>
                            <textarea class="form-control input-message" rows="4" id="mao_comments" name="mao_comments"></textarea>
                          </div>
                          <div class="form-group">
                            <label>Preferred Contact*</label>
                            <div class="radio">
                              <label><input type="radio" id="mao_radio" name="mao_radio" value="email" checked>Email</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" id="mao_radio" name="mao_radio" value="phone">Phone</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <div id="recaptcha3"></div>
                          </div>
                          <div class="form-group">
                            <a class="button red" id="make_an_offer_submit">Submit <i class="fa fa-spinner fa-spin fa-fw btn-loader" style="display: none;"></i></a>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Email to a Friend</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
						<div id="etf_notice" class="form-notice" style="display:none;"></div>
                        <form class="gray-form reset_css" action="http://themes.potenzaglobalsolutions.com/html/cardealer/post" id="etf_form">
                          <input type="hidden" name="action" value="email_to_friend" />
                          <div>
                            <span style="color: red;" class="sp"></span>
                          </div>
                          <div class="form-group">
                            <label>Name*</label>
                            <input name="etf_name" type="text" id="etf_name" class="form-control" >
                          </div>
                          <div class="form-group">
                            <label>Email address*</label>
                            <input type="text" class="form-control" id="etf_email" name="etf_email" >
                          </div>
                          <div class="form-group">
                            <label>Friends Email*</label>
                            <input type="Email" class="form-control" id="etf_fmail" name="etf_fmail">
                          </div>
                          <div class="form-group">
                            <label>Message to friend*</label>
                            <textarea class="form-control input-message" id="etf_fmessage" name="etf_fmessage" rows="4"></textarea>
                          </div>
                          <div class="form-group">
                            <div id="recaptcha4"></div>
                          </div>
                          <div class="form-group">
                            <a class="button red" id="email_to_friend_submit">Submit <i class="fa fa-spinner fa-spin fa-fw btn-loader" style="display: none;"></i></a>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="modal fade bd-example-modal-lg" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Trade-In Appraisal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
						<div id="tia_notice" class="form-notice" style="display:none;"></div>
                        <form class="gray-form reset_css" action="http://themes.potenzaglobalsolutions.com/html/cardealer/post" id="tia_form">
                          <div class="row">
                            <div class="col-md-6">
                              <input type="hidden" name="action" value="trade_in_appraisal" />
                            <div class="row">
                             <div class="col-md-12">
                               <h6>Contact Information </h6>
                              </div> 
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>First Name*</label>
                                  <input type="text" class="form-control" name="tia_firstname" id="tia_firstname">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Last Name *</label>
                                  <input type="text" class="form-control" name="tia_lastname" id="tia_lastname">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Work Phone*</label>
                                  <input type="Phone" class="form-control" name="tia_workphone" id="tia_workphone">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Phone*</label>
                                  <input type="Phone" class="form-control" name="tia_phone" id="tia_phone">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Email*</label>
                                  <input type="Email" class="form-control" name="tia_email" id="tia_email">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Preferred Contact*</label>
                                  <div class="radio">
                                    <label><input type="radio" name="tia_optradio" id="tia_optradio" value="email" checked>Email</label>
                                  </div>
                                  <div class="radio">
                                    <label><input type="radio" name="tia_optradio" id="tia_optradio" value="phone">Phone</label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Comments*</label>
                                  <textarea class="form-control input-message" rows="4" name="tia_comments" id="tia_comments"></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                            <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-12">
                                <h6>Options</h6>
                                </div>
                              <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="tia_options[]" value="Navigation">Navigation</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="tia_options[]" value="Sunroof">Sunroof</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="tia_options[]" value="Leather">Leather</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="tia_options[]" value="Air conditioning">Air conditioning</label>
                                      </div>
                                    </div>
                                     <div class="col-md-6">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="tia_options[]" value="Air conditioning"> Power Windows</label>
                                      </div>
                                    </div>
                                     <div class="col-md-6">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="tia_options[]" value="Air conditioning"> Power Locks</label>
                                      </div>
                                    </div>
                                     <div class="col-md-6">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="tia_options[]" value="Air conditioning"> Power Seats</label>
                                      </div>
                                    </div>
                                     <div class="col-md-6">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="tia_options[]" value="Air conditioning"> Cruise Control</label>
                                      </div>
                                    </div>
                                     <div class="col-md-6">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="tia_options[]" value="Air conditioning"> Cassette</label>
                                      </div>
                                    </div>
                                     <div class="col-md-6">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="tia_options[]" value="Air conditioning"> DVD Player</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="tia_options[]" value="Air conditioning">  Alloy Wheels</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="tia_options[]" value="Air conditioning">  Satellite Radio</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="tia_options[]" value="Air conditioning">  CD Player / Changer</label>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="tia_options[]" value="Air conditioning"> AM/FM Stereo</label>
                                      </div>
                                    </div> 
                                  </div>
                               </div>
                             </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                               <div class="row">
                            <div class="col-md-12">
                              <h6>Vehicle Information </h6>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Year*</label>
                                  <input type="text" class="form-control" name="tia_year" id="tia_year">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Make*</label>
                                  <input type="text" class="form-control" name="tia_make" id="tia_make">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Model*</label>
                                  <input type="text" class="form-control" name="tia_model" id="tia_model">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Exterior Colour*</label>
                                  <input type="text" class="form-control" name="tia_colour" id="tia_colour">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>VIN*</label>
                                  <input type="text" class="form-control" name="tia_vin" id="tia_vin">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Kilometres *</label>
                                  <input type="text" class="form-control" name="tia_kilometers" id="tia_kilometers">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Engine *</label>
                                  <input type="text" class="form-control" name="tia_engine" id="tia_engine">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Doors </label>
                                  <div class="selected-box">
                                    <select class="selectpicker" name="tia_doors" id="tia_doors">
                                      <option value="2">2 </option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Transmission </label>
                                  <div class="selected-box">
                                    <select class="selectpicker" name="tia_transmission" id="tia_transmission">
                                      <option value="Automatic">Automatic</option>
                                      <option value="Manual">Manual</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Drivetrain  </label>
                                  <div class="selected-box">
                                    <select class="selectpicker" name="tia_drivetrain" id="tia_drivetrain">
                                      <option value="AWD">AWD</option>
                                      <option value="2WD">2WD</option>
                                      <option value="4WD">4WD</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="row">

                            <div class="col-md-12">
                              <h6>Vehicle Rating </h6>
                             </div> 
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Body (dents, dings, rust, rot, damage)   </label>
                                  <div class="selected-box">
                                    <select class="selectpicker" name="tia_vehicle_rating_body" id="tia_vehicle_rating_body">
                                      <option value="1">1 </option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10 best</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Tires (tread wear, mismatched)  </label>
                                  <div class="selected-box">
                                    <select class="selectpicker" name="tia_vehicle_rating_tires" id="tia_vehicle_rating_tires">
                                      <option value="1">1 </option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10 best</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Engine (running condition, burns oil, knocking)  </label>
                                  <div class="selected-box">
                                    <select class="selectpicker" name="tia_vehicle_rating_engine" id="tia_vehicle_rating_engine">
                                      <option value="1">1 </option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10 best</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Transmission / Clutch (slipping, hard shift, grinds)   </label>
                                  <div class="selected-box">
                                    <select class="selectpicker" name="tia_vehicle_rating_clutch" id="tia_vehicle_rating_clutch">
                                      <option value="1">1 </option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10 best</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Glass (chips, cracks, pitted)    </label>
                                  <div class="selected-box">
                                    <select class="selectpicker" name="tia_vehicle_rating_glass" id="tia_vehicle_rating_glass">
                                      <option value="1">1 </option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10 best</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Interior (rips, tears, burns, faded/worn) </label>
                                  <div class="selected-box">
                                    <select class="selectpicker" name="tia_vehicle_rating_interior" id="tia_vehicle_rating_interior">
                                      <option value="1">1 </option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10 best</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Exhaust (rusted, leaking, noisy) </label>
                                  <div class="selected-box">
                                    <select class="selectpicker" name="tia_vehicle_rating_exhaust" id="tia_vehicle_rating_exhaust">
                                      <option value="1">1 </option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10 best</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                           </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="row">
                              <div class="col-md-12">
                              <h6>VEHICLE HISTORY </h6>
                               <div class="form-group">
                                <label>Was it ever a lease or rental return? </label>
                                <div class="selected-box">
                                  <select class="selectpicker" name="tia_vehical_info_1" id="tia_vehical_info_1">
                                    <option value="yes">yes </option>
                                    <option value="no">No</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Is the odometer operational and accurate? </label>
                                <div class="selected-box">
                                  <select class="selectpicker" name="tia_vehical_info_2" id="tia_vehical_info_2">
                                    <option value="yes">yes </option>
                                    <option value="no">No</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Detailed service records available?  </label>
                                <div class="selected-box">
                                  <select class="selectpicker" name="tia_vehical_info_3" id="tia_vehical_info_3">
                                    <option value="yes">yes </option>
                                    <option value="no">No</option>
                                  </select>
                                </div>
                               </div>
                              </div>
                             </div>
                            </div>
                            <div class="col-md-6">
                            <div class="row">
                             <div class="col-md-12">
                               <h6>Title History </h6>
                              <div class="form-group">
                                <label>Is there a lienholder? </label>
                                <input type="Email" class="form-control" name="tia_lineholder_email" id="tia_lineholder_email">
                              </div>
                              <div class="form-group">
                                <label>Who holds this title? </label>
                                <input type="Email" class="form-control" name="tia_titleholder_email" id="tia_titleholder_email">
                              </div>
                             </div>
                             </div>
                            </div>
                          </div>
                          <div class="row">
                            
                            <div class="col-md-12 vehicle-assessment">
                              <h6>Vehicle Assessment </h6>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Does all equipment and accessories work correctly?</label>
                                  <textarea class="form-control input-message" rows="4" name="tia_textarea_1" id="tia_textarea1"></textarea>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Did you buy the vehicle new? </label>
                                  <textarea class="form-control input-message" rows="4" name="tia_textarea_2" id="tia_textarea2"></textarea>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Has the vehicle ever been in any accidents? </label>
                                  <textarea class="form-control input-message" rows="4" name="tia_textarea_3" id="tia_textarea3"></textarea>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Is there existing damage on the vehicle? Where? </label>
                                  <textarea class="form-control input-message" rows="4" name="tia_textarea_4" id="tia_textarea4"></textarea>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Has the vehicle ever had paint work performed? </label>
                                  <textarea class="form-control input-message" rows="4" name="tia_textarea_5" id="tia_textarea5"></textarea>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Is the title designated 'Salvage' or 'Reconstructed'?   </label>
                                  <textarea class="form-control input-message" rows="4" name="tia_textarea_6" id="tia_textarea6"></textarea>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group captcha">
                                  <div id="recaptcha5"></div>
                                </div>
                                <div class="form-group">
                                  <a class="button red" id="trade_in_appraisal_submit">Submit <i class="fa fa-spinner fa-spin fa-fw btn-loader" style="display: none;"></i></a>
                                </div>
                              </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li><a href="javascript:window.print()"><i class="fa fa-print"></i>Print this page</a></li>
            </ul>
         </div>
      </div>
    </div>
    <div class="row">
     <div class="col-md-8">
        <div class="slider-slick">
          <div class="slider slider-for detail-big-car-gallery"> 
            <?php 
            $queryimages=mysqli_query($conn,"SELECT * FROM `carimage` where I_Car = '".$row[1]."' ");
          while($rowimagesbig1=mysqli_fetch_array($queryimages))
          {
            ?>
                <img class="img-fluid" src="Admin/cardimages/<?php echo $rowimagesbig1[2]?>" alt="">
             <?php }?>
            </div>
            <div class="slider slider-nav"> 
            <?php 
            $queryimages1=mysqli_query($conn,"SELECT * FROM `carimage` where I_Car = '".$row[1]."' ");
          while($rowimagesbig2=mysqli_fetch_array($queryimages1))
          {
            ?>
                <img class="img-fluid" src="Admin/cardimages/<?php echo $rowimagesbig2[2]?>" alt="">
             <?php }?>
            </div>
         </div>
      
      <div class="extra-feature">
       <h6>  feature</h6>
        <div class="row">
          <div class="col-lg-4">
             <ul class="list-style-1">
               <?php $queryfeatures=mysqli_query($conn,"select * from car_features where stock_id='$row[1]' LIMIT 0,7 ");
               while($rowf1=mysqli_fetch_array($queryfeatures))
               {?>
               <li><i class="fa fa-check"></i><?php echo $rowf1[2]?></li>
     
               <?php }?>
             </ul>
          </div>
          <div class="col-lg-4">
             <ul class="list-style-1">
               <?php $queryfeatures2=mysqli_query($conn,"select * from car_features where stock_id='$row[1]' LIMIT 7,14 ");
               while($rowf2=mysqli_fetch_array($queryfeatures2))
               {?>
               <li><i class="fa fa-check"></i><?php echo $rowf2[2]?></li>
     
               <?php }?>
             </ul>
          </div>
          <div class="col-lg-4">
             <ul class="list-style-1">
               <?php $queryfeatures3=mysqli_query($conn,"select * from car_features where stock_id='$row[1]' LIMIT 14,21 ");
               while($rowf3=mysqli_fetch_array($queryfeatures3))
               {?>
               <li><i class="fa fa-check"></i><?php echo $rowf3[2]?></li>
     
               <?php }?>
             </ul>
          </div>
        </div>
   </div>
  <div class="feature-car">
   <h6>Recently Vehicle</h6>
    <div class="row">
     <div class="col-md-12">
       <div class="owl-carousel" data-nav-arrow="true" data-nav-dots="true" data-items="3" data-md-items="3" data-sm-items="2" data-space="15">
        
       <?php 
     $queryrecent=mysqli_query($conn,"SELECT * FROM `cardetails` ORDER BY C_id DESC LIMIT 2");
     while($rowrecent=mysqli_fetch_array($queryrecent))
  {
    $querymodelr=mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM `model_car` where model_id = '".$rowrecent[2]."'"));
    $queryimagesr=mysqli_fetch_row(mysqli_query($conn,"SELECT * FROM `carimage` where I_Car = '".$rowrecent[1]."' Limit 1 "));

     ?>
        <div class="item">
         <div class="car-item gray-bg text-center">
           <div class="car-image">
             <img class="img-fluid" src="Admin/cardimages/<?php echo $queryimagesr[2]?>" alt="">
             <div class="car-overlay-banner">
              <ul> 
                <li><a href="cardetails.php?id=<?php echo $row[1]?>"><i class="fa fa-link"></i></a></li>
             
               </ul>
             </div>
           </div>
           <div class="car-list">
             <ul class="list-inline">
               <li><i class="fa fa-registered"></i> <?php echo $rowrecent[7]?></li>
               <li><i class="fa fa-cog"></i> <?php echo $rowrecent[6]?> </li>
               <li><i class="fa fa-dashboard"></i> <?php echo $rowrecent[12]?> mi</li>
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
           <a href="cardetails.php?id=<?php echo $rowrecent[1]?>"> <?php echo $querymodelr[2]?></a>
             <div class="separator"></div>
             <div class="price">
               <span class="old-price">$35,568</span>
               <span class="new-price">$32,698 </span>
             </div>
           </div>
         </div>
        </div>
        <?php }?>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class="col-md-4">
       <div class="car-details-sidebar">
          <div class="details-block details-weight">
            <h5>DESCRIPTION</h5>
            <ul>
              <li> <span>Make</span> <strong class="text-right"><?php echo $querymake[1]?></strong></li>
              <li> <span>Model</span> <strong class="text-right"><?php echo $querymodel[2]?></strong></li>
              <li> <span>Registration date </span> <strong class="text-right"><?php echo $row[7]?></strong></li>
              <li> <span>Mileage</span> <strong class="text-right"><?php echo $row[12]?> mi</strong></li>
              <?php 
              $country=mysqli_fetch_row(mysqli_query($conn,"select * from country where Id='".$row[18]."'"));
              ?>
              <li> <span>Country</span> <strong class="text-right"><?php echo $country[1]?></strong></li>
              <li> <span>Color</span> <strong class="text-right"><?php echo $row[5]?></strong></li>
              <li> <span>Seats</span> <strong class="text-right"><?php echo $row[16]?></strong></li>
              <li> <span>Transmission</span> <strong class="text-right"><?php echo $row[14]?></strong></li>
              <li> <span>Engine Size</span> <strong class="text-right"><?php echo $row[6]?></strong></li>
              <li> <span>Body Type</span> <strong class="text-right"><?php echo $row[20]?></strong></li>
            </ul>
          </div>
         
            <div class="details-form contact-2 details-weight">
               <form class="gray-form" action="http://themes.potenzaglobalsolutions.com/html/cardealer/post" id="send_enquiry_form">
                <h5>SEND ENQUIRY</h5>
				        <div id="send_enquiry_notice" class="form-notice" style="display:none;"></div>
                <input type="hidden" name="action" value="send_enquiry" />
                <div class="form-group">
                   <label>Name*</label>
                   <input type="text" class="form-control" placeholder="Name" name="send_enquiry_name" id="send_enquiry_name">
                </div>
                 <div class="form-group">
                    <label>Email address*</label>
                    <input type="text" class="form-control" placeholder="Email" name="send_enquiry_email" id="send_enquiry_email">
                </div>
                 <div class="form-group">
                   <label>Message* </label>
                   <textarea class="form-control" rows="4" placeholder="Message" name="send_enquiry_message" id="send_enquiry_message"></textarea>
                  </div>
                  <div class="form-group">
                   <div id="recaptcha6"></div>
                  </div>
                 <div class="form-group">
                  <a class="button red" id="send_enquiry_submit" href="javascript:void(0)">Submit <i class="fa fa-spinner fa-spin fa-fw btn-loader" style="display: none;"></i></a>
                </div>
              </form>
            </div> 
            <div class="details-phone details-weight">
              <div class="feature-box-3">
              <div class="icon">
                 <i class="fa fa-headphones"></i>
               </div>
               <div class="content">
                 <h4>1-888-345-888 </h4>
                <p>Call our seller to get the best price </p>
                </div>
            </div>
            </div>
            <div class="details-form contact-2">
               <form id="financing-calculator-01" class="gray-form">
                <h5>Financing Calculator</h5>
                <div class="form-group">
                   <label>Vehicle Price ($)*</label>
                   <input type="number" class="form-control" placeholder="Price" id="loan-amount" name="loan-amount">
                </div>
				<div class="form-group">
                    <label>Down Payment *</label>
                    <input type="number" class="form-control" placeholder="Payment" id="down-payment" name="down-payment">
                </div>
                 <div class="form-group">
                    <label>Interest rate (%)*</label>
                    <input type="number" class="form-control" placeholder="Rate" id="interest-rate" name="interest-rate">
                </div>
                <div class="form-group">
                    <label>Period (Month)*</label>
                    <input type="number" class="form-control" placeholder="Month" id="period" name="period">
                </div>                  
				<div class="form-group">
					<label>Payment</label>                    
					<div class="cal_text payment-box">
						<div id="txtPayment"></div>
					</div>
				</div>
                <div class="form-group">
				  <a class="button red calculate_finance" href="javascript:void(0)" data-form-id="financing-calculator-01">Estimate Payment</a>
                </div>
              </form>
            </div>
          </div>
        </div>
       </div>
     </div>
</section>

<!--=================================
car-details -->
 
 
<!--=================================
 footer -->

<?php
include "footer.php"
?>