<?php
	include(ROOT_PATH . "/app/database/db.php");
	include(ROOT_PATH . "/app/helper/validate.php");

	$table = 'warden';

    $warden = selectAll($table);
	
	$errors = array();
	
	$id = ''; $reg_num = ''; $first_name =''; $last_name =''; $sex=''; $username=''; $email=''; 

	function loginWarden($warden){
		
		global $page;
		
        $page = basename($_SERVER['PHP_SELF']); 

		$_SESSION['warden_id'] = $warden['id'];
		$_SESSION['username'] = $warden['first_name'];
		$_SESSION['message'] = 'You are now logged in';
		$_SESSION['type'] = 'success';
		$_SESSION['hasLogin'] = "true";
		
        if($page == 'warden_login.php'){
			header('location: ' . BASE_URL . '/warden/dashboard.php');
			exit();
		}
		
        if($page == 'warden_registration.php'){
			header('location: ' . BASE_URL . '/admin/warden_login.php');
			exit();
		}
	}

	if(isset($_POST['register'])){

		$errors = validateWarden($_POST);
		
		if (count($errors) === 0){
			$_POST['password'] = password_hash($_POST['passwordd'], PASSWORD_DEFAULT);
			//If admin is creating the student record, get the admin id
			if(isset($_SESSION['admin_id'])){
				$_POST['admin_id'] = $_SESSION['admin_id'];
			}
			unset($_POST['register'], $_POST['cPassword']);
			$user_id = create($table, $_POST);
			$warden = selectOne($table, ['id' => $user_id]);
			$_SESSION['message'] = 'User created succesfully';
            $_SESSION['type'] = 'success';
            header('location:' . BASE_URL . '/warden_login.php');
			exit();
		}else{
			$reg_num = $_POST['reg_num'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$sex = $_POST['sex'];
			$email = $_POST['email'];
			$username = $_POST['username'];
		}

	}

	if (isset($_POST['warden_login'])) {
		
		$errors = validateLogin($_POST);

		if (count($errors) === 0) {
			
			$wardenLogin = selectOne($table, ['email' => $_POST['email']]);

			if ($wardenLogin && password_verify($_POST['password'], $wardenLogin['password'])) {
				
				loginWarden($wardenLogin);

			}else{
				array_push($errors, 'Wrong credentials');
			}
			
		}
		 $email = $_POST['email']; 	
		 $password = $_POST['password']; 	
	} 

	//Update warden profile
	if(isset($_POST['update-warden'])){
		
		if(!empty($_FILES['image']['name'])){
			$image_name = time() . '_' . $_FILES['image']['name'];
			$destination = ROOT_PATH . "/assets/images/warden/" . $image_name;
	
			$result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
	
			if ($result) {
			
				$_POST['image'] = $image_name;

				$errors = validateWardenUdate($_POST);

			}

			if (count($errors) ===0) {

				unset($_POST['update-warden']);

				$id = $_SESSION['warden_id'];

				$_POST['date_updated'] = date("Y-m-d H:i:s");

				//Create post
				$post_id = update($table, $id, $_POST);
				$_SESSION['message'] = 'Profile updated succesfully';
				$_SESSION['type'] = 'success';
				header('location:' . BASE_URL . '/warden/profile');
				exit();

			}
	
		}else{
			array_push($errors, "Post image required");
		}
			
	} 
		
	
	
	
	
	//Delete user
	if (isset($_GET['del_id'])) {
		$count = delete($table, $_GET['del_id']);
		$_SESSION['message'] = 'User deleted succesfully';
		$_SESSION['type'] = 'success';
		header('location:' . BASE_URL . '/admin/admin');
		exit();
	}

	//fetch admin info with id for edition 
	if (isset($_GET['id'])) {
		$user = selectOne($table, ['id' => $_GET['id']]);
		$id = $user['id'];
		// $avatar = $user['avatar'];
		$username = $user['username'];
		$email = $user['email'];
		// $role = $user['role'];
		// $bio = html_entity_decode($user['bio']);
	}

	if (isset($_POST['update-admin'])) {
		$errors = validateAdmin($_POST);
		$u_id = $_POST['id'];
		$confirmP =$_POST['passwordC'];
		unset($_POST['update-admin'], $_POST['passwordC'], $_POST['id']);
		if (count($errors) === 0) {

			// if (!empty($_FILES['avatar']['name'])) {
			// $image_name = time() . '_' . $_FILES['avatar']['name'];
			// $destination = ROOT_PATH . "/assets/image/" . $image_name;

			// $result = move_uploaded_file($_FILES['avatar']['tmp_name'], $destination);

			// 	if ($result) {
			// 		$_POST['avatar'] = $image_name;

			// 	}else{
			// 		unset($_POST['avatar']);
			// 	}
			// }
		
			$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
			// $_POST['bio'] = htmlentities($_POST['bio']);
			$count = update($table, $u_id, $_POST);
			
			$_SESSION['message'] = 'User updated succesfully';
			$_SESSION['type'] = 'success';
			header('location:' . BASE_URL . '/admin/admin');
		}else{
				$id = $u_id;
				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$passwordC = $confirmP;
				// $role = $_POST['role'];
				// $bio = $_POST['bio'];
			}

	}
