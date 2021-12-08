<?php
include 'conn.php';
$id=$_GET['id'];

$UserQuery2="select * from property";  //getting data from product table based on given id
$UserResult2=mysqli_query($conn,$UserQuery2);

$query2="select * from image where I_Id=".$id;
$result2=mysqli_query($conn,$query2); 
$row2=mysqli_fetch_row($result2);  


if(isset($_POST['btnSubmit']))
{ 
    if(is_uploaded_file($_FILES['imgname']['tmp_name'])){
        $images1=$_FILES['imgname']['tmp_name'];
    
      $img=addslashes(file_get_contents($images1));

    $Property=$_POST['Property'];

    $query1="update image set I_Property='$Property' , I_Image='$img' where I_Id='$id'";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
        echo "<script>alert('Data Updated')</script>";

        header("Location:viewimage.php");
    }else{
        echo mysqli_error($conn);
    }
}
}

include "header.php";

?>
        <div class="container-fluid">

<form method="POST">

<label for="Property">Property</label><br>
    <select name="Property">
        <?php
        while($UserRow2=mysqli_fetch_array($UserResult2))
        {
            if($UserRow2["P_Id"]==$QuestRow2['P_Id'])
            {
            ?>
            <option value="<?php echo $UserRow2['P_Id'];?>" selected>
            <?php echo $UserRow2['P_Details'];?>
            </option>
            <?php
            }
            else {
                ?>
            <option value="<?php echo $UserRow2['P_Id'];?>">
            <?php echo $UserRow2['P_Details'];?>
            </option>
        <?php
        }
    }
        ?>
    </select> <br>

    <label for="Image"><h4 >Image</h4></label><br>
    <input  type="file" name="imgname" /> 
    <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
</form>
</div>


<?php
include "footer.php";
?>