<?php
include("conn.php");

if(isset($_POST['make_id']))
{
?>
     <select class="selectpicker" id="modelvalue"> 
                                                   <?php 
$query_get_model=mysqli_query($conn,"select * from model_car where make_model='".$_POST['make_id']."'");
                                                             
                                                                        ?>
<option  selected value="">Please Select</option>

<?php 
while($rowfetchmodeldetails=mysqli_fetch_array($query_get_model)){
?>
<option value="<?php echo $rowfetchmodeldetails[0]?>"><?php echo $rowfetchmodeldetails[2]?></option>

<?php
}
?>
   </select> 
   <?php
}
?>