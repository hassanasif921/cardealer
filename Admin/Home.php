<?php
include "header.php";
if(isset($_SESSION['admin_id'])) 
{
    $id=$_SESSION['admin_id'];

?>
        <!-- Begin Page Content -->
        <div class="content">
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

          </div>
          <!-- Content Row -->
          <div class="row">
          <p></p>
<?php
    include "conn.php";
    $count="SELECT count( * ) as  B_Id FROM brands";
    $result=mysqli_query($conn,$count);
    $countc="SELECT count( * ) as  C_id FROM cardetails";
    $resultc=mysqli_query($conn,$countc);

?>
            <!-- Earnings (Monthly) Card Example -->
            <?php
                while($row=mysqli_fetch_array($result))
                {
?>        
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Brands</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['B_Id'];?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
        }
?>

            <!-- Earnings (Monthly) Card Example -->
            <?php
                while($rowc=mysqli_fetch_array($resultc))
                {
?>        

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Cars</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rowc['C_id'];?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-car-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
                }
                ?>
          </div>
          <!-- Content Row -->
          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Our Total Cars</h6>
                  <div class="dropdown no-arrow">
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <?php
                $querycar="select * from cardetails";
                $resultcar=mysqli_query($conn,$querycar);
?>                
                <div class="card-body">

                  <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
            <th>Id</th>
            <th>Stock Id</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Year / Month</th>
            <th>Chasis No</th>
            <th>CC</th>
            <th>Mileage</th>
            <th>Fuel</th>
            <th>Transmission</th>
            <th>Seats</th>
            <th>FOB</th>
            <th>Color</th>

        </tr>
        <?php while($rowcar=mysqli_fetch_array($resultcar))
        {
        echo "<tr>";
          echo"<td>".$rowcar['C_id']."</td>";
          echo "<td>".$rowcar['Stock_id']."</td>";
          $querybrand="select * from brands where B_Id=".$rowcar['Brands'];
          $resultbrand=mysqli_query($conn,$querybrand);
          $rowbrand=mysqli_fetch_row($resultbrand);
          echo"<td>".$rowbrand[1]."</td>";
          echo "<td>".$rowcar['Model']."</td>";
          echo"<td>".$rowcar['S_YearMonth']."</td>";
          echo "<td>".$rowcar['Chasis_no']."</td>";
          echo"<td>".$rowcar['CC']."</td>";
          echo "<td>".$rowcar['Mileage']."</td>";
          echo"<td>".$rowcar['Fuel']."</td>";
          echo "<td>".$rowcar['Transmission']."</td>";
          echo "<td>".$rowcar['Seats']."</td>";
          echo "<td>".$rowcar['FOB']."</td>";
          echo "<td>".$rowcar['Color']."</td>";          
          echo "</tr>";
        }
    ?>
    </table>
              </div>



                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
          <!-- Content Row -->
          <?php
$querybrand="select * from brands";
$resultbrand=mysqli_query($conn,$querybrand);

          ?>
          <div class="container">
          <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Our Total Brands</h6>
          <div class="dropdown no-arrow">
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">

          <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr >
            <th>Id</th>
            <th>Brands</th>

        </tr>
        <?php while($rowbrand=mysqli_fetch_array($resultbrand))
        {
        echo "<tr>";
        echo"<td>".$rowbrand['B_Id']."</td>";
        echo "<td>".$rowbrand['Brands']."</td>";          
        echo "</tr>";
        }
    ?>
    </table>
              </div>
          </div>
        </div>
        <!-- /.container-fluid -->
</div>
      </div>
      <!-- End of Main Content -->
</div>
      </div>
</div>
<?php
}
include "footer.php";
?>