<p class="card-description <?php if (isset($_SESSION['type'])) {
    echo 'text-' . $_SESSION['type'];
    unset($_SESSION['type']);
    } ?>  ">
    <?php if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    } 
    ?>
</p>