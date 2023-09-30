<?php 
include("path.php"); 
include(ROOT_PATH . "/app/controller/student.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Student Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/mystyle.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
<!-- popup login message -->
<?php include(ROOT_PATH . "/app/helper/login_message.php"); ?>

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              
              <h4>Student Login</h4>

              <?php include(ROOT_PATH . "/app/helper/form_error.php"); ?>
              
              <form class="pt-3" action="student_login" method="post">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email"  value="<?php if(isset($email)){ echo $email;} ?>" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password"  value="<?php if(isset($password)){ echo $password;} ?>" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button type="submit" name="student_login" class="btn btn-primary me-2">Submit</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="registration" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="assets/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/data-table.js"></script>
  <script src="assets/js/jquery.dataTables.js"></script>
  <script src="assets/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="assets/js/jquery-3.6.4.min.js"></script>
  <script>
     //pop-up login message
     $(document).ready( function(){
            document.querySelector('.modal-bg').style.display = 'flex';
        });

        document.querySelector('.close').addEventListener('click', function(){
            document.querySelector('.modal-bg').style.display = 'none';
        });

        document.addEventListener('keypress', function(){
            document.querySelector('.modal-bg').style.display = 'none';
        });
  </script>
</body>

</html>

