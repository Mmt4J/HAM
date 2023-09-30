<?php
	include(ROOT_PATH . "/app/database/db.php");
	include(ROOT_PATH . "/app/helper/validate.php");

	$hall = 'halls';
    $block = 'blocks';
    $room = 'rooms';

    $halls = selectAll($hall);
    $blocks = selectAll($block);
    $rooms = selectAll($room);
	
	$errors = array();
	
	$id = ''; $name = ''; $admin_id =''; $address =''; $hall_capacity = ''; $email = '';
    $address =''; $username = ''; $password = ''; $cpassword =  $bed_capacity = '';
    
    //Create Hall
	if(isset($_POST['create_hall'])){

		$_POST['admin_id'] = $_SESSION['admin_id'];

		$errors = validateHall($_POST);

		if (count($errors) === 0){
			
			unset($_POST['create_hall']);
			
			$hall_id = create($hall, $_POST);
			
			//$hall = selectOne($hall, ['id' => $hall_id]);
			$_SESSION['message'] = 'Hall created succesfully';
            $_SESSION['type'] = 'success';
            header('location:' . BASE_URL . '/admin/manage_hall.php');
			exit();

		}else{
			
			$name = $_POST['name'];
			$address = $_POST['address'];
			$block_capacity = $_POST['block_capacity'];

		}

	}

	// Update Hall
	if(isset($_POST['update_hall'])){

		$_POST['admin_id'] = $_SESSION['admin_id'];
		
		$errors = validateHall($_POST);
		
		$id = $_POST['id'];

		if (count($errors) === 0){
			
			unset($_POST['update_hall'], $_POST['id']);

			$_POST['date_updated'] = date("Y-m-d H:i:s");
			
			$hall_id = update($hall, $id, $_POST );
			
			$_SESSION['message'] = 'Hall updated succesfully';
            $_SESSION['type'] = 'success';
            header('location:' . BASE_URL . '/admin/manage_hall.php');
			exit();

		}else{

			$id = $_POST['id'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$block_capacity = $_POST['block_capacity'];
			
		}

	}

	//Delete hall
	if (isset($_GET['dhall'])) {
		$delete = id_decode($_GET['dhall']);
		$count = delete($hall, $delete);
		$_SESSION['message'] = 'Hall deleted succesfully';
		$_SESSION['type'] = 'success';
		header('location:' . BASE_URL . '/admin/manage_hall.php');
		exit();
	}


    //Create Block
	if(isset($_POST['create_block'])){

		$_POST['admin_id'] = $_SESSION['admin_id'];
		$errors = validateBlock($_POST);

		if (count($errors) === 0){
			unset($_POST['create_block']);
			$hall_id = create($block, $_POST);
			//$hall = selectOne($hall, ['id' => $hall_id]);
			$_SESSION['message'] = 'Block created succesfully';
            $_SESSION['type'] = 'success';
            header('location:' . BASE_URL . '/admin/manage_block.php');
			exit();
		}else{
			$hall_id = $_POST['hall_id'];
			$name = $_POST['name'];
			$room_capacity = $_POST['room_capacity'];
		}

	}

	// Update Block
	if(isset($_POST['update_block'])){
		
		$_POST['admin_id'] = $_SESSION['admin_id'];
		
		$errors = validateBlock($_POST);
		
		$id = $_POST['id'];

		if (count($errors) === 0){

			unset($_POST['update_block'], $_POST['id']);

			$_POST['date_updated'] = date("Y-m-d H:i:s");
			
			$hall_id = update($block, $id, $_POST );
			
			$_SESSION['message'] = 'Block updated succesfully';
            $_SESSION['type'] = 'success';
            header('location:' . BASE_URL . '/admin/manage_block.php');
			exit();

		}else{

			$id = $_POST['id'];
			
		}

	}

	//Delete block
	if (isset($_GET['dblock'])) {
		$delete = id_decode($_GET['dblock']);
		$count = delete($hall, $delete);
		$_SESSION['message'] = 'Block deleted succesfully';
		$_SESSION['type'] = 'success';
		header('location:' . BASE_URL . '/admin/manage_hall.php');
		exit();
	}

	 //Create Rooms
	 if(isset($_POST['create_room'])){

		$_POST['admin_id'] = $_SESSION['admin_id'];
		$errors = validateRoom($_POST);
		
		if (count($errors) === 0){
			unset($_POST['create_room']);
			$room_id = create($room, $_POST);
			//$hall = selectOne($hall, ['id' => $hall_id]);
			$_SESSION['message'] = 'Room and bed space capacity created succesfully';
            $_SESSION['type'] = 'success';
            header('location:' . BASE_URL . '/admin/manage_room.php');
			exit();
		}else{
			$hall_id = $_POST['hall_id'];
			$block_id = $_POST['block_id'];
			$room_number = $_POST['room_number'];
			$bed_capacity = $_POST['bed_capacity'];
		}

	}

	// Update Room
	if(isset($_POST['update_room'])){
		
		$_POST['admin_id'] = $_SESSION['admin_id'];
		
		$errors = validateRoom($_POST);
		
		$id = $_POST['id'];

		if (count($errors) === 0){

			unset($_POST['update_room'], $_POST['id']);

			$_POST['date_updated'] = date("Y-m-d H:i:s");
			
			$hall_id = update($room, $id, $_POST );
			
			$_SESSION['message'] = 'Block updated succesfully';
            $_SESSION['type'] = 'success';
            header('location:' . BASE_URL . '/admin/manage_block.php');
			exit();

		}else{

			$id = $_POST['id'];
			
		}

	}

	//Delete room
	if (isset($_GET['droom'])) {
		$delete = id_decode($_GET['droom']);
		$count = delete($hall, $delete);
		$_SESSION['message'] = 'Room deleted succesfully';
		$_SESSION['type'] = 'success';
		header('location:' . BASE_URL . '/admin/manage_hall.php');
		exit();
	}

	