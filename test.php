<?php 
include "conn.php";
?>
<select id="test" class="target" >
            <?php 
              $queryfetchdetails=mysqli_query($conn,"select * from brands");
          ?>
          <option disabled selected>Please Select</option>
          <?php 
              while($rowfetchdetails=mysqli_fetch_array($queryfetchdetails)){
          ?>
          <option value="<?php echo $rowfetchdetails[0]?>"><?php echo $rowfetchdetails[1]?></option>
          <?php
              }
          ?>
           </select>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

<script>
$( ".target" ).change(function() {
 alert( "Handler for .change() called." );
});

 </script>
