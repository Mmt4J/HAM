<?php
	include("path.php");
	session_start();
	
	unset($_SESSION['student_id']);
    unset($_SESSION['admin_id']);
	unset($_SESSION['username']);
	unset($_SESSION['message']);
	unset($_SESSION['type']);
    unset($_SESSION['email']);
	session_destroy();

	header('location: ' . BASE_URL . '/index.php');