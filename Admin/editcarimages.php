<?php
include "header.php";
$id=$_GET['id'];

$queryimg="select * from carimage where I_Car=".$id;
$resultimg=mysqli_query($conn,$queryimg); 

?>
    <button type="button" name="add" id="add" class="btn btn-success">Add</button>
<div class="container">
  <h2>Hover Rows</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
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
 <image src="data:image/gif;base64,<?php echo base64_encode($rowimg[2]);?>" height="150px" width="150px"></div></td>
 <td><button type="button" name="update" class="btn btn-warning bt-xs update" id="<?php echo $rowimg[0]?>">Change</button></td>
 <td><button type="button" name="delete" class="btn btn-danger bt-xs delete"  id="<?php echo $rowimg[0]?>">Remove</button></td>

      </tr>
     <?php 
}
     ?>
    </tbody>
  </table>
</div>
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
    <form id="image_form" method="post" enctype="multipart/form-data">
     <p><label>Select Image</label>
     <input type="file" name="image" id="image" /></p><br />
     <input type="hidden" name="action" id="action" value="insert" />
     <input type="hidden" name="image_id" id="image_id" value="<?php echo $id?>"/>
     <input type="hidden" name="image_id1" id="image_id1"/>

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
