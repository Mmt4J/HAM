<?php 
include("../path.php"); 
include(ROOT_PATH . "/app/controller/hostel.php");

//if not login
if(!isset($_SESSION['admin_id'])){
    header('location: ' . BASE_URL . '/index.php');
  }

$halls = selectAll('halls');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add Block</title>
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
                    <h4 class="card-title">Add Block</h4>
                    <?php include(ROOT_PATH . "/app/helper/form_error.php"); ?>
                    <form class="forms-sample" action="add_block" method="post">

                        <div class="form-group row">
                            <label for="hall" class="col-sm-2 col-form-label">Hall Name</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control-sm" name="hall_id">
                                <option></option>
                                <?php foreach ($halls as $hall): ?>
                                    
                                    <?php if (!empty($hall_id) && $hall_id == $hall['id']): ?>
                                        <option selected value="<?php echo $hall['id']; ?>"><?php echo $hall['name']; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $hall['id']; ?>"><?php echo $hall['name']; ?></option>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="blockName" class="col-sm-2 col-form-label">Block Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="<?php if(isset($name)){ echo $name;} ?>" placeholder="Block Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phoneNumber" class="col-sm-2 col-form-label">Block Capacity</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="room_capacity" value="<?php if(isset($room_capacity)){ echo $room_capacity;} ?>" maxlength="11" placeholder="Capacity">
                            </div>
                        </div>
                        
                        <button type="submit" name="create_block" class="btn btn-primary me-2">Submit</button>

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

