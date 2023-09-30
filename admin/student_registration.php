<?php 
include("../path.php"); 
include(ROOT_PATH . "/app/controller/student.php");

//if not login
if(!isset($_SESSION['admin_id'])){
    header('location: ' . BASE_URL . '/index.php');
  }
  
$table = 'admin';
$id = $_SESSION['admin_id'];
$admin = selectOne($table, ['id' => $id]);
$department = selectAll('department');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register Student</title>
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
                        <h4 class="card-title">Student Registration Form</h4>
                        <!-- Form error -->
                        <?php include(ROOT_PATH . "/app/helper/form_error.php"); ?>

                        <form class="forms-sample" action="student_registration" method="post">
                            <div class="form-group row">
                            <label for="registrationNumber" class="col-sm-2 col-form-label">Reg No:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="reg_number" value="<?php if(isset($reg_number)){echo $reg_number;} ?>" placeholder="Registration number">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="<?php if(isset($name)){echo $name;} ?>" placeholder="FirstName LastName OtherName">
                            </div>
                            </div>
                            <div class="form-group row">
                              <label for="department" class="col-sm-2 col-form-label">Department</label>
                              <div class="col-sm-10">
                                <select class="form-control form-control-lg" value="" name="department">
                                <option><?php if(isset($depatment)){echo $depatment;}else{echo 'Select';} ?></option>
                                <?php foreach ($department as $dept): ?>
                                <option><?php echo $dept['name'];?></option>
                                <?php endforeach; ?>
                                </select>
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
                            <label for="phoneNumber" class="col-sm-2 col-form-label">Phone No:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="phone" maxlength="11" value="<?php if(isset($phone)){echo $phone;} ?>" placeholder="Mobile number">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" value="<?php if(isset($email)){echo $email;} ?>" name="email" placeholder="Your email">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php if(isset($address)){echo $address;} ?>" name="address" placeholder="Address">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">username:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php if(isset($username)){echo $username;} ?>" name="username" placeholder="Username">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="passwordd" placeholder="Password">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="confirmPassword" class="col-sm-2 col-form-label">Re-password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="cPassword" placeholder="Confirm password">
                            </div>
                            </div>
                            
                            <button type="submit" name="register" class="btn btn-primary me-2">Submit</button>
                            <!-- <button class="btn btn-light">Cancel</button> -->
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

