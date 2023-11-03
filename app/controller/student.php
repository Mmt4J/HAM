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

	// Update student profile
	if(isset($_POST['update-student'])){
		
		if(!empty($_FILES['image']['name'])){
			$image_name = time() . '_' . $_FILES['image']['name'];
			$destination = ROOT_PATH . "/assets/images/student/" . $image_name;
	
			$result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
	
			if ($result) {
			
				$_POST['image'] = $image_name;

				$errors = validateStudentUdate($_POST);

			}

			if (count($errors) ===0) {


				if(isset($_SESSION['admin_id'])){
					$id = $_POST['id'];
				}else{
					$id = $_SESSION['student_id'];
				}

				$_POST['date_updated'] = date("Y-m-d H:i:s");

				unset($_POST['update-student'], $_POST['id']);

				//Update student
				$post_id = update($table, $id, $_POST);
				$_SESSION['message'] = 'Profile updated succesfully';
				$_SESSION['type'] = 'success';
				if(isset($_SESSION['admin_id'])){
					header('location:' . BASE_URL . '/admin/manage_student');
					exit();
				}

				if(isset($_SESSION['student_id'])){
					header('location:' . BASE_URL . '/student/dashboard');
					exit();
				}

			}
	
		}else{
			array_push($errors, "Post image required");
		}
			
	} 
		
	//Delete hall
	if (isset($_GET['dstudent'])) {
		$delete = id_decode($_GET['dstudent']);
		$count = delete('student', $delete);
		$_SESSION['message'] = 'Record deleted succesfully';
		$_SESSION['type'] = 'success';
		header('location:' . BASE_URL . '/admin/manage_student.php');
		exit();
	}
	
	// Application
	if(isset($_POST['application'])){

			$confirmIfExist = selectOne('application', ['student_id' => $_POST['studentId']]);
			
			if($confirmIfExist){

				$ns = selectOne('student', ['id' => $_POST['studentId']]);
				$name = array();
				$fName = $ns['name'];
				$delimeter = ' ';
				$names = explode($delimeter, $fName);

				foreach ($names as $n) {
				$name[] = $n;
				}

				array_push($errors, 'You have already applied' . ' ' . $name[0] . '!');

			}else{

				$randomRoom = randomRecord('rooms');

				$roomId = $randomRoom['id'];

				$result = selectAll('application', ['room_number_id'=>$roomId]);

				$numberOfRow = count($result);

				if($numberOfRow < $randomRoom['bed_capacity'] || $numberOfRow == 0){
					
					while($numberOfRow < $randomRoom['bed_capacity']){
					
						unset($_POST['application'], $_POST['studentId']);
						$_POST['student_id'] = $_SESSION['student_id'];
						$_POST['room_number'] = $randomRoom['room_number'];
						$_POST['room_number_id'] = $randomRoom['id'];
		
						if($numberOfRow < $randomRoom['bed_capacity']){
							
							$bed_number = $numberOfRow + 1;
							$_POST['bed_number'] = $bed_number;

							$application_id = create('application', $_POST);
							header('location: ' . BASE_URL . '/student/dashboard.php?applicationId='. $application_id);
							exit();
						}
		
					}
				}
				
			}

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

	