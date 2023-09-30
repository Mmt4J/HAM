<?php 
include("../path.php");
include(ROOT_PATH . "/app/controller/hostel.php");

//IF not login
if(!isset($_SESSION['admin_id'])){
  header('location: ' . BASE_URL . '/index.php');
}
if(isset($_GET['rid'])){
  $id = id_decode($_GET['rid']);
  $record = selectOne('rooms', ['id' => $id]);
}

if(isset($id)){
    $record = selectOne('rooms', ['id' => $id]);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit Hall</title>
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
                    <h4 class="card-title">Update Room</h4>
                    <?php include(ROOT_PATH . "/app/helper/form_error.php"); ?>
                    <form class="forms-sample" id ="edit_room" action="edit_room" method="post">
                        
                        <div class="form-group row">
                            <label for="block" class="col-sm-2 col-form-label">Select Hall</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control-sm" id="hall_id" name="hall_id">
                                <?php if(isset($record['hall_id'])){ $selectedHall = selectOne('halls', ['id' => $record['hall_id']]);} ?>

                                    <option value="<?php  echo $selectedHall['id']; ?>"><?php  echo $selectedHall['name']; ?></option>
                                    
                                    <?php 
                                    $halls = selectAll('halls');
                                    foreach ($halls as $hall): ?>
                                        
                                        <?php if (!empty($hall_id) && $hall_id == $hall['id']): ?>
                                            <option selected value="<?php echo $hall['id']; ?>"><?php echo $hall['name']; ?></option>
                                        <?php else: ?>
                                            <option value="<?php  if(isset($selectedHall['id']) && $hall['id'] != $selectedHall['id']){ echo $hall['id'];}  ?>"><?php if(isset($selectedHall['name']) && $hall['name'] != $selectedHall['name']){ echo $hall['name'];} ?></option>
                                            <?php  ?>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <?php if(isset($record['block_id'])){  $selectedBlock = selectOne('blocks', ['id' =>  $record['block_id']]);} ?>

                        <div class="form-group row">
                            <label for="block" class="col-sm-2 col-form-label">Select Block</label>
                            <div class="col-sm-10">
                                <select class="form-control form-control-sm" name="block_id">

                                <option value="<?php  echo $selectedBlock['id']; ?>"><?php  echo $selectedBlock['name']; ?></option>
                                
                                <?php 
                                $blocks = selectAll('blocks');
                                foreach ($blocks as $block): ?>
                                    
                                    <?php if (!empty($block_id) && $block_id == $block['id']): ?>
                                        <option selected value="<?php echo $block['id']; ?>"><?php echo $block['name']; ?></option>
                                    <?php else: ?>
                                        <option value="<?php  if(isset($selectedblock['id']) && $block['id'] != $selectedBlock['id']){ echo $block['id'];}  ?>"><?php if(isset($selectedBlock['name']) && $block['name'] != $selectedBlock['name']){ echo $block['name'];} ?></option>
                                            <?php  ?>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="blockName" class="col-sm-2 col-form-label">Room Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="room_number" value="<?php if(isset($record)){ echo $record['room_number'];} ?>" placeholder="Room number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phoneNumber" class="col-sm-2 col-form-label">Bed Capacity</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="bed_capacity" value="<?php if(isset($record)){ echo $record['bed_capacity'];} ?>" maxlength="11" placeholder="Bed capacity">

                                <input type="number" class="form-control d-none" name="id" value="<?php if(isset($record)){ echo $record['id'];} ?>" maxlength="11" placeholder="id">
                            </div>
                        </div>
                        
                        <button type="submit" name="update_room" class="btn btn-primary me-2">Update</button>

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

