<?php
include "header.php";
if(isset($_SESSION['admin_id'])) 
{
    $id=$_SESSION['admin_id'];
$query="SELECT * FROM `admin` WHERE A_Id=".$id;
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_row($result);}
if(isset($_POST['btnsubmit'])){
  $name=$_POST['name'];  
  $username=$_POST['username'];  
  $email=$_POST['email'];  
  $password=$_POST['password'];  
$queryupdate="UPDATE admin SET A_Name='$name',A_UserName='$username',A_Email='$email',A_Password='$password' WHERE A_Id=".$id;
$resultupdate=mysqli_query($conn,$queryupdate);
if($resultupdate)
{
    echo "<script>alert('INFO UPDATED')</script>";


   // header("Location:viewBlog.php");
}else{
    echo mysqli_error($conn);
}
}

?>
<form method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">Name</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name" value="<?php echo $row[1]?>" name="name">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Username</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Username" value="<?php echo $row[2]?>" name="username">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Email</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Email" value="<?php echo $row[3]?>" name="email">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Password</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Password" value="<?php echo $row[4]?>" name="password">
  </div>
  <input type="submit" Value="Update Info" name="btnsubmit" class="btn btn-primary">
</form>
<?php
include "footer.php";
?>