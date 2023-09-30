<?php

include("../path.php"); 
include(ROOT_PATH . "/app/database/db.php");

//if not login
if(!isset($_SESSION['admin_id'])){
  header('location: ' . BASE_URL . '/index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Manage Warden</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../assets/css/mystyle.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
  
    <!-- partial:partials/_navbar.html -->
    <?php include(ROOT_PATH . "/app/include/admin_navbar.php"); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include(ROOT_PATH . "/app/include/admin_sidebar.php"); ?>
    
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
          
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Manage Wardens</h4>
                  <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            User
                          </th>
                          <th>
                            RegNumber
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Hall
                          </th>
                          <th>
                            Phone No
                          </th>
                          <th>
                            Edit
                          </th>
                          <th>
                            Delete
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1">
                            <img src="../assets/images/faces/face1.jpg" alt="image"/>
                          </td>
                          <td>
                            WD2023034
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            Ademola Hall
                          </td>
                          <td>
                            07045346788
                          </td>
                          <td>
                            <a href="#">Edit</a>
                          </td>
                          <td>
                            <a href="#">Delete</a>
                          </td>
                        </tr>

                        <tr>
                          <td class="py-1">
                            <img src="../assets/images/faces/face6.jpg" alt="image"/>
                          </td>
                          <td>
                            WD2023456
                          </td>
                          <td>
                            Olatoye Henrietta
                          </td>
                          <td>
                            Ajumobi Hall
                          </td>
                          <td>
                            07031541245
                          </td>
                          <td>
                            <a href="#">Edit</a>
                          </td>
                          <td>
                            <a href="#">Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../assets/images/faces/face7.jpg" alt="image"/>
                          </td>
                          <td>
                            WD2023123
                          </td>
                          <td>
                            Matthew Alabi
                          </td>
                          <td>
                            Ajumobi Hall
                          </td>
                          <td>
                            09054342312
                          </td>
                          <td>
                            <a href="#">Edit</a>
                          </td>
                          <td>
                            <a href="#">Delete</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            </div> 
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include(ROOT_PATH . "/app/include/footer.php"); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../assets/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../assets/vendors/chart.js/Chart.min.js"></script>
  <script src="../assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/hoverable-collapse.js"></script>
  <script src="../assets/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../assets/js/dashboard.js"></script>
  <script src="../assets/js/data-table.js"></script>
  <script src="../assets/js/jquery.dataTables.js"></script>
  <script src="../assets/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <script src="../assets/js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>

