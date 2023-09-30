 <!-- popup message -->
<div class="
    <?php 
        if(isset($_SESSION['hasLogin']) || isset($_SESSION['type'])){ 
            
            echo 'modal-bg'; 
            $success = $_SESSION['type'];
            
            unset($_SESSION['hasLogin'], $_SESSION['type']); 
            
        }else{
                echo 'd-none';
        }
    ?>
    ">
    <div class="my-modal-content">
        <div class="close text-danger" id="close">+</div>
        <h3 class="text-success">Success</h3>
        <p> 
            <?php 
            if(isset($admin['user_name'])){
                echo 'Welcome ' . $admin['user_name'];
            } 
            elseif(isset($items[0])){ 
                echo 'Welcome ' . $items[0];
            }
            elseif(isset($success)){ 
                echo 'Please login';
            }
            ?> 
        </p>
    </div>
</div>