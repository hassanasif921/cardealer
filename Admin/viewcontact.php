<?php
include "header.php";
if(isset($_SESSION['admin_id'])) 
{
    $id=$_SESSION['admin_id'];

$query="select * from contact";
$result=mysqli_query($conn,$query);

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">View Contact</h1>
          <a href='addcontact.php'><button  style="background-color: #4CAF50; color: white; margin-left:5px; margin-top:5px; border-radius:10px;">Add Contact</button></a><br><br>
          <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Message</th>
            <th>Action</th>

        </tr>
        <?php while($row=mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo"<td>".$row['Con_Id']."</td>";
        echo "<td>".$row['Con_Name']."</td>";
        echo "<td>".$row['Con_Email']."</td>";
        echo "<td>".$row['Con_Number']."</td>";
        echo "<td>".$row['Con_Msg']."</td>";
        echo "<td><a href='deletecontact.php?id=".$row['Con_Id']."'>Delete</a>  </td>";
          
          echo "</tr>";
        }
    ?>
    </table>
    </table>
              </div>
            </div>


        </div>
        <!-- /.container-fluid -->

      <!-- End of Main Content -->

<?php
}else {
  echo "<script>alert('Please Press Logout Button and than Login ! ')</script>";

}
include "footer.php";
?>
