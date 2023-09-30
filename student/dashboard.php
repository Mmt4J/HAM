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
            <?php include(ROOT_PATH . "/app/include/application_form.php"); ?>
            <div class="me-md-3 me-xl-5">
                  <h2>Student Hostel Details</h2>
                  
                  <p class="mb-md-0">Full Name: <?php echo $items[0] . ' ' .  $items[1]; if(!empty($items[2])){ echo ' ' . $items[2];}?></p>
                  
                  <p class="mb-md-0">Registration number: <?php echo $student['reg_number'];?></p>

                  <?php if(isset($hostelDetails)){ 
                    $hall = selectOne('halls', ['id' => $hostelDetails['hall_id']]);
                    $block = selectOne('blocks', ['id' => $hostelDetails['block_id']]);
                    $room = selectOne('rooms', ['id' => $hostelDetails['room_number_id']]);
                    } 
                  ?>
                  <p class="mb-md-0">Hall Name: <?php if(isset($hall)){echo $hall['name'];}else{ echo 'NIL';}?></p>
                  <p class="mb-md-0">Block Name: <?php if(isset($block)){echo $block['name'];}else{ echo 'NIL';}?></p>
                  <p class="mb-md-0">Room Number: <?php if(isset($room)){echo $room['room_number'];}else{ echo 'NIL';}?></p>

                  <p class="mb-md-0">Bed Number: <?php if(isset($hostelDetails)){echo $hostelDetails['bed_number'];}else{ echo 'NIL';}?></p>

                  <p><button id="print" onclick="window.print();">print</button></p>
            </div>

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

    // var print  = document.getElementById("print");
    // var navbar = document.querySelector(".navbar");
    // var sidebar = document.querySelector(".sidebar");

    // print.addEventListener('click', (event)=>{
    //   navbar.classList.add("d-none");
    //   sidebar.classList.add("d-none");
    // })
  </script>
</body>

</html>

