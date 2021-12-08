<?php
include "header.php";
if(isset($_SESSION['admin_id'])) 
{
    $id=$_SESSION['admin_id'];

include "conn.php";
$query="select * from cardetails";
$result=mysqli_query($conn,$query);

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">View Cars Details</h1>
          <a href='AddCarDetails.php'><button  style="background-color: #4CAF50; color: white; margin-left:5px; margin-top:5px; border-radius:10px;">Add Car Details</button></a><br><br>
          <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                    <th>Id</th>
            <th>Stock Id</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Year / Month</th>
            <!-- <th>Type</th>
            <th>Chasis Code</th> -->
            <th>Chasis No</th>
            <th>CC</th>
            <th>Mileage</th>
            <th>Fuel</th>
            <th>Transmission</th>
            <!-- <th>Drive</th> -->
            <th>Seats</th>
            <th>FOB</th>
            <th>Color</th>
            <th>Action</th>
        </tr>
        <?php while($row=mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo"<td>".$row['C_id']."</td>";
        echo "<td>".$row['Stock_id']."</td>";
        // echo"<td>".$row['Make']."</td>";
        $queryb="select * from brands where B_Id=".$row['Brands'];
        $resultb=mysqli_query($conn,$queryb);
        $rowb=mysqli_fetch_row($resultb);
        echo"<td>".$rowb[1]."</td>";

        echo "<td>".$row['Model']."</td>";
        echo"<td>".$row['S_YearMonth']."</td>";
        // echo "<td>".$row['Type']."</td>";
        // echo"<td>".$row['Chasis_code']."</td>";
        echo "<td>".$row['Chasis_no']."</td>";
        echo"<td>".$row['CC']."</td>";
        echo "<td>".$row['Mileage']."</td>";
        echo"<td>".$row['Fuel']."</td>";
        echo "<td>".$row['Transmission']."</td>";
        // echo"<td>".$row['Drive']."</td>";
        echo "<td>".$row['Seats']."</td>";
        echo "<td>".$row['FOB']."</td>";
        echo "<td>".$row['Color']."</td>";
              
            echo "<td><a href='editcardetails.php?id=".$row['Stock_id']."'>Edit</a>  <a href='deletecardetails.php?id=".$row['Stock_id']."'>Delete</a>  </td>";
          
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
