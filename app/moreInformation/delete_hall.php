<?php 

if(isset($_GET['dh'])){
  $id = id_decode($_GET['dh']);
  $delete = selectOne('halls', ['id' => $id]);
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

        <p> <?php if(isset($delete)){ echo 'Are you sure you want to delete ' . $delete['name'];} ?> </p>

        <div class="modal-footer">
            
            <a type="button" class="btn btn-danger btn-sm" href="<?php echo BASE_URL . '/admin/edit_hall.php?dhall=' . id_encode($delete['id']); ?>">Yes</a>

            <button type="button" id="reset-url" class="btn btn-success btn-sm" >No</button>
        </div>

      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){
    var deleteOne = document.getElementById("delete").textContent;
    // var resetUrl = document.getElementById("reset-url");
    var mod = document.getElementById("deleteModal");
    var deleteModal = new bootstrap.Modal(mod);
    if(deleteOne){
        deleteModal.show();
    }
});
</script>