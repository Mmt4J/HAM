<?php 

if(isset($_GET['infoid'])){
  $infoId = id_decode($_GET['infoid']);
  $studentInfo = selectOne('student', ['id' => $infoId]);
}

?>

<!-- Hall modal for more information -->
<div class="modal" id="hallModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="title"><?php if(isset($studentInfo)){echo ucfirst($studentInfo['name']) . ' Information' ;}?></h4>
        <button type="button" class="btn-close" id="student-moda-redirect" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

      <div class="row">
            <div class="col-md-2 grid-margin">
              <div class="">
                <div class="card-body frame">
                  
                  <img src="
                    <?php 
                      if(isset($studentInfo['image'])){
                          echo BASE_URL . '/assets/images/student/' . $studentInfo['image'];
                          }else{ 
                            echo "../assets/images/faces/face5.jpg"; 
                          } 
                    ?>
                    " alt="profile" class="profile-picture">

                </div>
              </div>
            </div>

            <div class="col-md-1"></div>


            <div class="col-md-9 grid-margin ">
              <div class="">
                <div class="card-body">
                
                  <h3>Student Hostel Details</h3>
                  
                    <p>Name: <strong><?php echo $studentInfo['name']?></strong> </p>
                    <p>Registration Number: <strong><?php echo $studentInfo['reg_number']?></strong> </p>
                    <p>Sex: <strong><?php echo $studentInfo['sex']?></strong></p>
                    <p>Department: <strong><?php echo $studentInfo['department']?></strong> </p>
                    <p>Phone: <strong><?php echo $studentInfo['phone']?></strong></p>
                    <p>E-mail: <strong><?php echo $studentInfo['email']?></strong></p>
                    <p>Address: <strong><?php echo $studentInfo['address']?></strong></p>
                    <p>Date Registered: <strong><?php echo $studentInfo['date_created']?></strong></p>
                    <p>Date Updated: <strong><?php echo $studentInfo['date_updated']?></strong></p>

                    <?php 
                      $application = selectOne('application', ['student_id' => $studentInfo['id']]); 
                      if(isset($application)){
                        $room = selectOne('rooms', ['id' => $application['room_number_id']]);
                        $block = selectOne('blocks', ['id' => $room['block_id']]);
                        $hall = selectOne('halls', ['id' => $room['hall_id']]);
                      }
                    ?>
                      
                    <?php  if(isset($application)){ ?>
                      
                      <p>Hall Name: <strong><?php echo $hall['name'];?></strong> </p>
                      <p>Block Name: <strong><?php echo $block['name'];?></strong> </p>
                      <p>Room Number: <strong><?php echo $application['room_number'];?></strong> </p>
                      <p>Bed Number: <strong><?php echo $application['bed_number'];?></strong> </p>

                    <?php } else {?>
                      
                      <p><strong> <?php echo "Room Not Allocated";?> </strong></p>
                      
                    <?php } ?>

                </div>
              </div>
            </div>

          </div>

        <div class="modal-footer">
                <a type="button" href="manage_student" class="btn btn-danger btn-sm" data-bs-dismiss="">Close</a>
        </div>

      </div>
    </div>
  </div>
</div>


<script>
  window.onload = function(){
    var studentinfo = document.getElementById("title").textContent;
    var redirectPage = document.getElementById("student-moda-redirect");
    var modal = document.getElementById("hallModal");
    var hallModal = new bootstrap.Modal(modal);
    if(studentinfo){
      hallModal.show();
    }

    redirectPage.onclick = function () {
      location.href = "manage_student";
    }

    modal.onclick = function () {
      location.href = "manage_student";
    }
  }


</script>