<?php 
include("../path.php"); 
include(ROOT_PATH . "/app/database/db.php");

//if not login, redirect to index page
if(!isset($_SESSION['admin_id'])){
  header('location: ' . BASE_URL . '/index.php');
}

$halls = selectAll('halls');
$admins = 'admin';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Manage Hall</title>
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
                  <h4 class="card-title">Manage Hall</h4>

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
                            Name
                          </th>
                          <th>
                            Hall Address
                          </th>
                          <th>
                            Block Capacity
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
                    <?php foreach ($halls as $key => $hall): ?>
                        <tr>
                          <td class="py-1">
                            <?php echo $hall['id']; ?>
                          </td>
                          <td>
                            <?php echo $hall['name']; ?>
                          </td>
                          <?php $admin = selectOne($admins, ['id' => $hall['admin_id']]); ?>
                          <td>
                            <?php echo $hall['address']; ?>
                          </td>
                          <td>
                          <?php echo $hall['block_capacity'] . ' Block'; ?>
                          </td>
                          <td>
                            <a class="text-info" id="moreInfo" href="<?php echo BASE_URL . '/admin/manage_hall.php?infoid=' . id_encode($hall['id']); ?>">Info</a>
                          </td>
                          <td>
                            <a class="text-primary" href="<?php echo BASE_URL . '/admin/edit_hall.php?hid=' . id_encode($hall['id']); ?>">Edit</a>
                          </td>
                          <td>
                            <a class="text-danger" href="<?php echo BASE_URL . '/admin/manage_hall.php?dh=' . id_encode($hall['id']); ?>">Delete</a>
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

  <!-- More information about Hall -->
  <?php include(ROOT_PATH . "/app/moreInformation/hall_modal.php"); ?>

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
  <script src="../assets/js/myjs.js"></script>
  <!-- Delete warning -->
  <?php  include(ROOT_PATH . "/app/moreInformation/delete_hall.php"); ?>

  <script>
    $(document).ready(function(){
      $("#resetUrl").click(function(){
      alert("It worked");
    })

    })
  </script>
</body>

</html>

