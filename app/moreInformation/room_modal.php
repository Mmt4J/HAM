<?php 

if(isset($_GET['infoid'])){
  $infoId = id_decode($_GET['infoid']);
  $moreInfo = selectOne('rooms', ['id' => $infoId]);
}

?>



<!--  Block modal for more information-->
<div class="modal" id="hallModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="title"><?php if(isset($moreInfo)){echo 'Info about room ' . strtolower($moreInfo['room_number']); }?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <?php $hall = selectOne('halls', ['id' => $moreInfo['hall_id']]); ?>
        <p>Hall: <?php echo $hall['name']?></p>
        <?php $block = selectOne('blocks', ['id' => $moreInfo['block_id']]); ?>
        <p>Block: <?php echo $block['name']?> </p>
        <p>Romm Number: <?php echo $moreInfo['room_number']?> </p>
        <p>Bed Space Capacity: <?php echo $moreInfo['bed_capacity']?> </p>
        <?php $admin = selectOne('admin', ['id' => $moreInfo['admin_id']]); ?>
        <p>Created By: <?php echo $admin['user_name']?> </p>
        <p>Created on: <?php echo $moreInfo['date_created']?> </p>
        <p>Updated on: <?php echo $moreInfo['date_updated']?> </p>
      
        <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" id="room-moda-redirect" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</div>


<script>
  window.onload = function(){
    var moreinfo = document.getElementById("title").textContent;
    var redirectPage = document.getElementById("room-moda-redirect");
    var modal = document.getElementById("hallModal");
    var hallModal = new bootstrap.Modal(modal);
    if(moreinfo){
      hallModal.show();
    }

    redirectPage.onclick = function () {
      location.href = "manage_room";
    }

    modal.onclick = function () {
      location.href = "manage_room";
    }

  }
</script>