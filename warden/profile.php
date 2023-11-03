<?php 
include("../path.php"); 
include(ROOT_PATH . "/app/database/db.php");

//if not login
if(!isset($_SESSION['warden_id'])){
  header('location: ' . BASE_URL . '/index.php');
}

$warden = selectOne('warden', ['id' => $_SESSION['warden_id']]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Warden Dashboard</title>
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
    <?php include(ROOT_PATH . "/app/include/warden_navbar.php"); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include(ROOT_PATH . "/app/include/warden_sidebar.php"); ?>
    
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         
                <!-- Warning message -->
                <?php // include(ROOT_PATH . "/app/helper/form_error.php"); ?>
                <!-- Session message -->
                <?php include(ROOT_PATH . "/app/helper/session_message.php"); ?>
                <div class="row">
                    <div class="col-md-2 grid-margin">
                    <div class="">
                        <div class="card-body frame">
                        
                        <img src="
                          <?php
                            if(isset($warden['image'])){
                              echo BASE_URL . '/assets/images/warden/' . $warden['image'];
                              }else{ 
                                echo "../assets/images/faces/face5.jpg"; 
                              } 
                          ?>
                        " alt="profile" class="profile-picture">

                        </div>
                    </div>
                    </div>

                    <div class="col-md-5 grid-margin stretch-card">
                    <div class="">
                        <div class="card-body">
                        
                        <h3>Student Hostel Details</h3>
                        
                        <p class="mb-md-0">Full Name: <?php echo $warden['first_name'] . ' ' .  $warden['last_name'];?></p>
                        
                        <p class="mb-md-0">Registration No: <?php echo $warden['reg_num'];?></p>
                        <p class="mb-md-0">Hall: <?php if(isset($warden)){echo $warden['hall_id'];}else{ echo 'NIL';}?></p>
                        <p class="mb-md-0">Sex: <?php if(isset($warden)){echo $warden['sex'];}else{ echo 'NIL';}?></p>
                        <p class="mb-md-0">Phone No: <?php if(isset($warden)){echo $warden['phone'];}else{ echo 'NIL';}?></p>
                        <p class="mb-md-0">Email: <?php if(isset($warden)){echo $warden['email'];}else{ echo 'NIL';}?></p>
                        <p class="mb-md-0">Address: <?php if(isset($warden)){echo $warden['address'];}else{ echo 'NIL';}?></p>
                        
                        <p><a href="edit_profile">Edit Profile</a></p>
                        <!-- <p><button id="print" onclick="window.print();">print</button></p> -->

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
  <script>
    $(document).ready(function(){
      var message = $("#regNumber").text();
      if(message){
        alert(message);
      }
    });

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

