<?php 

//Validate Student
function validateStudent($register)
	{
		$select = 'Select';
		$errors = array();

		if (empty($register['reg_number'])) {
			array_push($errors, 'Reg_number is required');
		}

		$gostRegNumber = selectOne('registration_number', ['reg_number' => $register['reg_number']]);
		if (!isset($gostRegNumber)) {
				array_push($errors, 'Registration number does not exist');
		}

		if (empty($register['name'])) {
			array_push($errors, 'Your full name is required');
		}

		if (!preg_match( "/^[a-zA-Z]*$/", $register['name'])) {
			array_push($errors, 'Name cannot caontain special character');
		}

		if (empty($register['department'])) {
			array_push($errors, 'Please selecct department');
		}

		if ($register['department'] === $select) {
			array_push($errors, 'Please select department');
		}

        if (empty($register['sex'])) {
			array_push($errors, 'Please select sex');
		}

		if ($register['sex'] === $select) {
			array_push($errors, 'Please select your genda');
		}
		
		$existingRegNumber = selectOne('student', ['reg_number' => $register['reg_number']]);
		if ($existingRegNumber) {
			if (isset($register['update-post']) && $existingRegNumber['id'] != $register['id']) {
				array_push($errors, 'Student with that registration number already exist');
			}

			if (isset($register['register'])) {
				array_push($errors, 'Student with that registration number already exist');
			}
		}

		if (empty($register['username'])) {
			array_push($errors, 'Please enter your username');
		}

		if (!preg_match( "/^[a-zA-Z]*$/", $register['usernane'])) {
			array_push($errors, 'Username cannot contain special character');
		}

		if (empty($register['passwordd'])) {
			array_push($errors, 'Please enter your password');
		}


		if ($register['passwordd'] !== $register['cPassword']) {
			array_push($errors, 'Password do not match');
		}
		
		return $errors;
	}

	//Validate Warden
function validateWarden($warden)
{
	$select = 'Select';
	$errors = array();

	$gostRegNumber = selectOne('registration_number', ['reg_number' => $warden['reg_num']]);
	if (!isset($gostRegNumber)) {
			array_push($errors, 'Registration number does not exist');
	}

	if (empty($warden['reg_num'])) {
		array_push($errors, 'Reg_number is required');
	}

	if (empty($warden['first_name'])) {
		array_push($errors, 'Your first name is required');
	}

	if (!preg_match( "/^[a-zA-Z]*$/", $warden['first_name'])) {
		array_push($errors, 'First name cannot contain special character');
	}

	if (empty($warden['last_name'])) {
		array_push($errors, 'Your last name is required');
	}

	if (!preg_match( "/^[a-zA-Z]*$/", $warden['last_name'])) {
		array_push($errors, 'Last name cannot contain special character');
	}

	if (empty($warden['sex'])) {
		array_push($errors, 'Please select sex');
	}

	if ($warden['sex'] === $select) {
		array_push($errors, 'Please select your genda');
	}
	
	$existingRegNumber = selectOne('warden', ['reg_num' => $warden['reg_num']]);
	if ($existingRegNumber) {
		if (isset($warden['update-warden']) && $existingRegNumber['id'] != $warden['id']) {
			array_push($errors, 'Warden with that registration number already exist');
		}

		if (isset($warden['register'])) {
			array_push($errors, 'Warden with that registration number already exist');
		}
	}

	if (empty($warden['username'])) {
		array_push($errors, 'Please enter your username');
	}

	if (!preg_match( "/^[a-zA-Z]*$/", $warden['username'])) {
		array_push($errors, 'Username cannot caontian special character');
	}

	if (empty($warden['password'])) {
		array_push($errors, 'Please enter your password');
	}


	if ($warden['password'] !== $warden['cPassword']) {
		array_push($errors, 'Password do not match');
	}
	
	return $errors;
}

	//Not sure
	function validateAdmin($admin)
	{
		$select = 'Select';
		$errors = array();

		if (empty($admin['reg_number'])) {
			array_push($errors, 'Reg_number is required');
		}

		$gostRegNumber = selectOne('registration_number', ['reg_number' => $admin['reg_number']]);
		if (!isset($gostRegNumber)) {
				array_push($errors, 'Registration number does not exist');
		}

		if (empty($admin['name'])) {
			array_push($errors, 'Your full name is required');
		}

		if (!preg_match( "/^[a-zA-Z]*$/", $admin['name'])) {
			array_push($errors, 'Name cannot contain special character');
		}

		if (empty($admin['department'])) {
			array_push($errors, 'Please selecct department');
		}

		if ($admin['department'] === $select) {
			array_push($errors, 'Please select department');
		}

        if (empty($admin['sex'])) {
			array_push($errors, 'Please select sex');
		}

		if ($admin['sex'] === $select) {
			array_push($errors, 'Please select your genda');
		}
		
		$existingRegNumber = selectOne('student', ['reg_number' => $admin['reg_number']]);
		if ($existingRegNumber) {
			if (isset($admin['update-post']) && $existingRegNumber['id'] != $admin['id']) {
				array_push($errors, 'Student with that registration number already exist');
			}

			if (isset($admin['register'])) {
				array_push($errors, 'Student with that registration number already exist');
			}
		}

		if (empty($admin['username'])) {
			array_push($errors, 'Please enter your username');
		}

		if (!preg_match( "/^[a-zA-Z]*$/", $admin['username'])) {
			array_push($errors, 'Username cannot contain special character');
		}

		if (empty($admin['passwordd'])) {
			array_push($errors, 'Please enter your password');
		}


		if ($admin['passwordd'] !== $admin['cPassword']) {
			array_push($errors, 'Password do not match');
		}
		
		return $errors;
	}


	//Done
	function validateLogin($user)
	{	
		$errors = array();
		
		if (empty($user['email'])) {
			array_push($errors, 'Email is required');
		}

		if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
			array_push($errors, 'Please enter a valid email');
		}
		
		if (empty($user['password'])) {
			array_push($errors, 'Password is required');
		}
		return $errors;
	}

	function validateHall($hall){
		
		$errors = array();
		
		if (empty($hall['name'])) {
			array_push($errors, 'Hall name is required');
		}
		
		if (empty($hall['admin_id'])) {
			array_push($errors, 'Please, login as admin to create hall');
		}

		if (empty($hall['address'])) {
			array_push($errors, 'Hall address is required');
		}

		if (empty($hall['block_capacity'])) {
			array_push($errors, 'Block capacity is required');
		}
		return $errors;
	}

	function validateBlock($block){
		
		$errors = array();

		if (empty($block['hall_id'])) {
			array_push($errors, 'Please, select hall');
		}
		
		if (empty($block['name'])) {
			array_push($errors, 'Block name is required');
		}
		
		if (empty($block['admin_id'])) {
			array_push($errors, 'Please, login as admin to create block');
		}

		if (empty($block['room_capacity'])) {
			array_push($errors, 'Block capacity is required');
		}
		return $errors;
	}

	function validateRoom($room){
		
		$errors = array();

		if (empty($room['hall_id'])) {
			array_push($errors, 'Please, select Hall');
		}

		if (empty($room['block_id'])) {
			array_push($errors, 'Block name is required');
		}
		
		if (empty($room['room_number'])) {
			array_push($errors, 'Room number is required');
		}
		
		if (empty($room['admin_id'])) {
			array_push($errors, 'Please, login as admin to create rooms');
		}

		if (empty($room['bed_capacity'])) {
			array_push($errors, 'Bed space capacity is required');
		}
		return $errors;
	}

	function validateRegistrationNumber($reg_number){

		$errors = array();
		
		if (empty($reg_number['firstName'])) {
			array_push($errors, 'First name is required');
		} 

		if (!preg_match( "/^[a-zA-Z]*$/", $reg_number['firstName'])) {
			array_push($errors, 'Name cannot contain special character');
		}

		if ($reg_number['category']  == 'Please select category') {
			array_push($errors, 'Please, select cayegory');
		}

		$exist = selectOne('registration_number', ['reg_number' => $reg_number['reg_number']]);
		if ($exist) {
			array_push($errors, 'Try again');
		}
		return $errors;
	}


	function validateStudentUdate($update){
		
		$errors = array();

		if (empty($update['name'])) {
			array_push($errors, 'Your full name is required');
		}

		if (!preg_match( "/^[a-zA-Z]*$/", $update['name'])) {
			array_push($errors, 'Name cannot contain special character');
		}

		if (empty($update['username'])) {
			array_push($errors, 'Please enter your username');
		}

		if (!preg_match( "/^[a-zA-Z]*$/", $update['username'])) {
			array_push($errors, 'Username cannot contain speccial character');
		}

		if (empty($update['phone'])) {
			array_push($errors, 'Please enter your phone number');
		}

		if (empty($update['email'])) {
			array_push($errors, 'Please enter your email');
		}

		if (!filter_var($update['email'], FILTER_VALIDATE_EMAIL)) {
			array_push($errors, 'Please enter a valid email');
		}

		if (empty($update['address'])) {
			array_push($errors, 'Please enter your address');
		}

		if (empty($update['image'])) {
			array_push($errors, 'Fail to upload image');
		}
		
		return $errors;
	}
	

	function validateWardenUdate($update){
		
		$errors = array();

		if (empty($update['first_name'])) {
			array_push($errors, 'Your first name is required');
		}

		if (!preg_match( "/^[a-zA-Z]*$/", $update['first_name'])) {
			array_push($errors, 'First name cannot contain special character');
		}

		if (empty($update['last_name'])) {
			array_push($errors, 'Your last name is required');
		}

		if (!preg_match( "/^[a-zA-Z]*$/", $update['last_name'])) {
			array_push($errors, 'Last Name cannot contain special character');
		}

		if (empty($update['username'])) {
			array_push($errors, 'Please enter your username');
		}

		if (!preg_match( "/^[a-zA-Z]*$/", $update['username'])) {
			array_push($errors, 'Username cannot contain special character');
		}

		if (empty($update['phone'])) {
			array_push($errors, 'Please enter your phone number');
		}

		if (empty($update['email'])) {
			array_push($errors, 'Please enter your email');
		}

		if (empty($update['address'])) {
			array_push($errors, 'Please enter your address');
		}

		if (empty($update['image'])) {
			array_push($errors, 'Fail to upload image');
		}
		
		return $errors;
	}
	