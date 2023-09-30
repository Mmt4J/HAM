<?php
	include(ROOT_PATH . "/app/database/db.php");
	include(ROOT_PATH . "/app/helper/validate.php");

	$table = 'student';

    $student = selectAll($table);
	
	$errors = array();
	
	$id = ''; $name = ''; $department =''; $sex =''; $phone = ''; $email = '';
    $address =''; $username = ''; $password = ''; $cpassword = '';

	function loginStudent($student){
		global $page;
		$page = basename($_SERVER['PHP_SELF']); 

		$_SESSION['student_id'] = $student['id'];
		$_SESSION['username'] = $student['username'];
		$_SESSION['message'] = 'You are now logged in';
		$_SESSION['type'] = 'success';
		$_SESSION['hasLogin'] = "true";
		if($page == 'registration.php'){
			header('location: ' . BASE_URL . '/student/dashboard.php');
			exit();
		}

		if($page == 'student_registration.php'){
			header('location: ' . BASE_URL . '/admin/manage_student.php');
			exit();
		}
		
		if($page == 'student_login.php'){
			header('location: ' . BASE_URL . '/student/dashboard.php');
			exit();
		}
	}

	if(isset($_POST['register'])){

		$errors = validateStudent($_POST);
		
		if (count($errors) === 0){
			$_POST['password'] = password_hash($_POST['passwordd'], PASSWORD_DEFAULT);
			//If admin is creating the student record, get the admin id
			if(isset($_SESSION['admin_id'])){
				$_POST['admin_id'] = $_SESSION['admin_id'];
			}
			unset($_POST['register'], $_POST['cPassword'], $_POST['passwordd']);
			$user_id = create($table, $_POST);
			$user = selectOne($table, ['id' => $user_id]);
			$_SESSION['message'] = 'User created succesfully';
            $_SESSION['type'] = 'success';
            header('location:' . BASE_URL . '/student_login.php');
			exit();
		}else{
			$reg_number = $_POST['reg_number'];
			$name = $_POST['name'];
			$depatment = $_POST['department'];
			$sex = $_POST['sex'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$username = $_POST['username'];
			$email = $_POST['email'];
		}

	}

	if (isset($_POST['student_login'])) {
		
		$errors = validateLogin($_POST);

		if (count($errors) === 0) {
			
			$studentLogin = selectOne($table, ['email' => $_POST['email']]);

			if ($studentLogin && password_verify($_POST['password'], $studentLogin['password'])) {
				
				loginStudent($studentLogin);

			}else{
				array_push($errors, 'Wrong credentials');
			}
			
		}
		 $email = $_POST['email']; 	
		 $password = $_POST['password']; 	
	} 

	// Application script
	if(isset($_POST['application'])){

		$confirmIfExist = selectOne('application', ['student_id' => $_POST['studentId']]);
		
		if($confirmIfExist){

			$ns = selectOne('student', ['id' => $_POST['studentId']]);
			$it = array();
			$fName = $ns['name'];
			$delimeter = ' ';
			$ns = explode($delimeter, $fName);

			foreach ($ns as $n) {
			$it[] = $n;
			}

			array_push($errors, 'You have already applied' . ' ' . $it[0] . '!');

		}else{
			
			$table = 'halls';
			$halls = selectAll($table);
			$randomHall = randomRecord($table);
			
			foreach($halls as  $key => $hall):
				
				if($hall['id'] == $randomHall['id']){
					
					$block = selectRandomRecord('blocks', ['hall_id' => $randomHall['id']]);
					$room = selectRandomRecord('rooms', ['block_id' => $block['id']]);
					if($room){
						$number = $room['room_number'];
						$bedCapacity = $room['bed_capacity'];
						$sql = "SELECT COUNT(*) FROM `application` WHERE room_number = $number";
						$result = $conn->query($sql);
						if($result <= $bedCapacity){
							unset($_POST['application'], $_POST['studentId']);
							$_POST['student_id'] = $_SESSION['student_id'];
							$_POST['hall_id'] = $block['hall_id'];
							$_POST['block_id'] = $room['block_id'];
							$_POST['room_number_id'] = $room['room_number'];
							$_POST['bed_number'] = $result + 1;
							$application_id = create('application', $_POST);
							header('location: ' . BASE_URL . '/student/dashboard.php');
							exit();
						}
					}

					// $blockExist = selectAll('application', ['block_id' => $block['id']]);
					// $roomExist = selectAll('application', ['room_number_id' => $block['id']]);
					// if(isset($blockExist) && );
					// dd($bedExist);
				}

			endforeach;
			// dd($hall);
			// $_POST['hall_id']='';
			// $_POST['student_id']= $_SESSION['student_id'];
			// $_POST['block_id']='';
			// $_POST['room_number_id']='';
			// $_POST['bed_number']='';

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
