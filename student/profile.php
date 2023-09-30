<?php 
include("../path.php"); 
include(ROOT_PATH . "/app/controller/student.php");
if(!isset($_SESSION['student_id'])){
    header('location: ' . BASE_URL . '/index.php');
}
$table = 'student';
$application = 'application';
$id = $_SESSION['student_id'];
$student = selectOne($table, ['id' => $id]);
$hostelDetails = selectOne($application, ['student_id' => $id]);

$items = array();
$fullName = $student['name'];
$delimeter = ' ';
$names = explode($delimeter, $fullName);

foreach ($names as $name) {
  $items[] = $name;
}

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
  <link rel="stylesheet" href="../assets/css/mystyle.css">
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
        <!-- Warning message -->
        <?php include(ROOT_PATH . "/app/helper/form_error.php"); ?>
          <!-- <div class="row">
           
          </div> -->


        </div>
        <!-- content-wrapper ends -->

        <!-- popup login message -->
        <?php include(ROOT_PATH . "/app/helper/login_message.php"); ?>
        
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

