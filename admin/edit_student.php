<?php include("../path.php"); 

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
  <title>Edit Student</title>
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
          
            <div class="main-panel">         
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Edit Student</h4>
                    <p class="card-description">
                        Ensure you fill all the info
                    </p>
                    <form class="forms-sample" action="">
                        <div class="form-group row">
                        <label for="registrationNumber" class="col-sm-2 col-form-label">Reg No:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="regNumber" placeholder="Registration number">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="fullName" class="col-sm-2 col-form-label">Full Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fullname" placeholder="Surname FirstName LastName">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="department" class="col-sm-2 col-form-label">Department:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="department" placeholder="Department">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="sex" class="col-sm-2 col-form-label">Sex</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sex" placeholder="Sex">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="phoneNumber" class="col-sm-2 col-form-label">Phone No:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phoneNumber" maxlength="11" placeholder="Mobile number">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Your email">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" placeholder="Address">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">username:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" placeholder="Username">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="confirmPassword" class="col-sm-2 col-form-label">Re-password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="cPassword" placeholder="Confirm password">
                        </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
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

