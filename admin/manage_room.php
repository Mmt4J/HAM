<?php 
include("../path.php"); 
include(ROOT_PATH . "/app/database/db.php");

//if not login
if(!isset($_SESSION['admin_id'])){
  header('location: ' . BASE_URL . '/index.php');
}

$rooms = selectAll('rooms');
$halls = 'halls';
$admins = 'admin';
$blocks = 'blocks';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Manage Room</title>
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
          
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Manage Block</h4>
                  
                  <!-- Session message -->
                  <?php include(ROOT_PATH . "/app/helper/session_message.php"); ?>

                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th>
                            S/N
                          </th>
                          <th>
                            Hall Name
                          </th>
                          <th>
                            Block Name
                          </th>
                          <th>
                            Room Number
                          </th>
                          <th>
                            Bed Space Capacity
                          </th>
                          <th colspan="3">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php foreach ($rooms as $key => $room): ?>
                        <tr>
                          <td class="py-1">
                            <?php echo $room['id']; ?>
                          </td>
                          <td>
                          <?php $hall = selectOne($halls, ['id' => $room['hall_id']]); ?>
                            <?php echo $hall['name']; ?>
                          </td>
                          <?php $block = selectOne($blocks, ['id' => $room['block_id']]); ?>
                          <td>
                            <?php echo $block['name']; ?>
                          </td>
                          <td>
                          <?php echo $room['room_number']; ?>
                          </td>
                          <td>
                          <?php echo $room['bed_capacity']; ?>
                          </td>
                          <td>
                            <a class="text-info" data-bs-toggle="tooltip" title="<?php echo "Room " .$room['room_number'] . " Information"; ?>"  id="moreInfo" href="<?php echo BASE_URL . '/admin/manage_room.php?infoid=' . id_encode($room['id']); ?>"><i class="mdi mdi-information menu-icon"></i></a>
                          </td>
                          <td>
                            <a class="text-primary" data-bs-toggle="tooltip" title="Edit" href="<?php echo BASE_URL . '/admin/edit_room.php?rid=' . id_encode($room['id']); ?>"><i class="mdi mdi-export menu-icon"></i></a>
                          </td>
                          <td>
                          <a class="text-danger" data-bs-toggle="tooltip" title="Delete" href="<?php echo BASE_URL . '/admin/manage_room.php?dr=' . id_encode($room['id']); ?>"><i class="mdi mdi-delete menu-icon"></i></a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                        
                      </tbody>
                    </table>
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

  <!-- Hall more Information -->
  <?php include(ROOT_PATH . "/app/moreInformation/room_modal.php"); ?>

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
    <!-- Delete warning -->
    <?php  include(ROOT_PATH . "/app/moreInformation/delete_room.php"); ?>
</body>

</html>

