<?php 
include("../path.php"); 
include(ROOT_PATH . "/app/database/db.php");

//if not login
if(!isset($_SESSION['admin_id'])){
  header('location: ' . BASE_URL . '/index.php');
}

$blocks = selectAll('blocks');
$halls = 'halls';
$admins = 'admin';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Manage Block</title>
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
                            Room Capacity
                          </th>
                          <th>
                            More
                          </th>
                          <th>
                            Edit
                          </th>
                          <th>
                            Delete
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php foreach ($blocks as $key => $block): ?>
                        <tr>
                          <td class="py-1">
                            <?php echo $block['id']; ?>
                          </td>
                          <td>
                          <?php $hall = selectOne($halls, ['id' => $block['hall_id']]); ?>
                            <?php echo $hall['name']; ?>
                          </td>
                          <td>
                            <?php echo $block['name']; ?>
                          </td>
                          <td>
                          <?php echo $block['room_capacity'] . ' Rooms'; ?>
                          </td>
                          <td>
                            <a class="text-info" id="moreInfo" href="<?php echo BASE_URL . '/admin/manage_block.php?infoid=' . id_encode($block['id']); ?>">Info</a>
                          </td>
                          <td>
                            <a class="text-primary" href="<?php echo BASE_URL . '/admin/edit_block.php?bid=' . id_encode($block['id']); ?>">Edit</a>
                          </td>
                          <td>
                          <a class="text-danger" href="<?php echo BASE_URL . '/admin/manage_block.php?db=' . id_encode($block['id']); ?>">Delete</a>
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
  <?php include(ROOT_PATH . "/app/moreInformation/block_modal.php"); ?>


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
  <?php  include(ROOT_PATH . "/app/moreInformation/delete_block.php"); ?>
</body>

</html>

