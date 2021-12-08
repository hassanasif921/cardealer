<?php
include "header.php";
if(isset($_SESSION['admin_id'])) 
{
    $id=$_SESSION['admin_id'];

$query="select * from country";
$result=mysqli_query($conn,$query);

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">View Country</h1>
          <a href='addcountry.php'><button  style="background-color: #4CAF50; color: white; margin-left:5px; margin-top:5px; border-radius:10px;">Add Country</button></a><br><br>
          <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
            <th>Id</th>
            <th>Country</th>
            <th>Action</th>

        </tr>
        <?php while($row=mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo"<td>".$row['Id']."</td>";
        echo "<td>".$row['Cntry_Name']."</td>";
        echo "<td><a href='editcountry.php?id=".$row['Id']."'>Edit</a>  <a href='deletecountry.php?id=".$row['Id']."'>Delete</a>  </td>";
          
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
