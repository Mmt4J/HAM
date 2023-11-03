<?php 

if(isset($_GET['dr'])){
  $id = id_decode($_GET['dr']);
  $delete = selectOne('rooms', ['id' => $id]);
}

?>

<!-- Hall modal for more information -->
<div class="modal" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="delete"><?php if(isset($delete)){echo 'Warning'; }?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <p> <?php if(isset($delete)){ echo 'Are you sure you want to delete room ' . $delete['room_number'];} ?> </p>

        <div class="modal-footer">
            
            <a type="button" class="btn btn-danger btn-sm" href="<?php echo BASE_URL . '/admin/edit_room.php?droom=' . id_encode($delete['id']); ?>">Yes</a>

            <a href="manage_room" type="button" id="reset-url" class="btn btn-success btn-sm" >No</a>
        </div>

      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){
    var deleteOne = document.getElementById("delete").textContent;
    var mod = document.getElementById("deleteModal");
    var deleteModal = new bootstrap.Modal(mod);
    if(deleteOne){
        deleteModal.show();
    }
});
</script>