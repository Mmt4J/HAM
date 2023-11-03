<?php 
include("../path.php"); 
include(ROOT_PATH . "/app/controller/student.php");
if(!isset($_SESSION['student_id'])){
    header('location: ' . BASE_URL . '/index.php');
}
$table = 'student';
$id = $_SESSION['student_id'];
$student = selectOne($table, ['id' => $id]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->

  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
  
    <!-- partial:partials/_navbar.html -->
    <?php include(ROOT_PATH . "/app/include/student_navbar.php"); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include(ROOT_PATH . "/app/include/student_sidebar.php"); ?>
    
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
          
            <div class="main-panel">         
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile</h4>
                        <!-- Form error -->
                        <?php include(ROOT_PATH . "/app/helper/form_error.php"); ?>

                        <form class="forms-sample" action="profile" method="post" enctype="multipart/form-data">

                            <div class="form-group row">
                              <label for="image" class="col-sm-2 col-form-label">Profile Picture</label>  
                              <div class="col-sm-10 image-wrapper">
                                <input type="file" class="form-control" name="image" id="image">  
                              </div>
                            </div>

                            <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="<?php if(isset($student)){echo $student['name'];} ?>" placeholder="FirstName LastName OtherName">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="phoneNumber" class="col-sm-2 col-form-label">Phone No:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="phone" maxlength="11" value="<?php if(isset($student)){echo $student['phone'];} ?>" placeholder="Mobile number">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" value="<?php if(isset($student)){echo $student['email'];} ?>" name="email" placeholder="Your email">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php if(isset($student)){echo $student['address'];} ?>" name="address" placeholder="Address">
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">username:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?php if(isset($student)){echo $student['username'];} ?>" name="username" placeholder="Username">
                            </div>
                            </div>
                            
                            <button type="submit" name="update-student" class="btn btn-primary me-2">Submit</button>
                            
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

  <script>
    //Application script
    var application = document.getElementById("application-form");
    document.getElementById("application-link").addEventListener("click", function(){
      application.submit();
    });
  </script>

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
  <script src="../assets/js/jquery-3.6.4.min.js"></script>
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

