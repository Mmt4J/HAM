<?php 
include("../path.php");
include(ROOT_PATH . "/app/controller/warden.php");

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
  <title>Register Warden</title>
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
                    <h4 class="card-title">Warden Resgiteration Form</h4>

                    <!-- Form error -->
                    <?php include(ROOT_PATH . "/app/helper/form_error.php"); ?>

                    <form class="forms-sample" action="warden_registration" method="post">
                        <div class="form-group row">
                        <label for="registrationNumber" class="col-sm-2 col-form-label">Reg No:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="reg_num" id="reg_num" value="<?php if(isset($reg_num)){echo $reg_num;} ?>" placeholder="Registration number">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="fullName" class="col-sm-2 col-form-label">Fisrt Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php if(isset($first_name)){echo $first_name;} ?>" placeholder="FirstName">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="department"  class="col-sm-2 col-form-label">LastName:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="last_name" id="last_name" value="<?php if(isset($last_name)){echo $last_name;} ?>" placeholder="LastName">
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="sex" class="col-sm-2 col-form-label">Sex</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control-lg" selected value="<?php if(isset($sex)){echo $sex;} ?>" name="sex">
                                <option>Select</option>
                                <option>Male</option>
                                <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" value="<?php if(isset($email)){echo $email;} ?>" placeholder="Your email">
                        </div>
                        </div>
                
                        <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" id="username" value="<?php if(isset($username)){echo $username;} ?>" placeholder="Username">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="confirmPassword" class="col-sm-2 col-form-label">Re-password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="cPassword" id="cPassword" placeholder="Confirm password">
                        </div>
                        </div>
                        
                        <button type="submit" name="register" class="btn btn-primary me-2">Submit</button>

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

