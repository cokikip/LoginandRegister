<?php 
session_start();

$username="";
$email="";
$errors = array();
   //connect to database
	$db = mysqli_connect('localhost','coki','91681995','vote');

	//if the register button is clicked
	if (isset($_POST['register'])) {
		$username =mysqli_real_escape_string($db, $_POST['username']);
		$email =mysqli_real_escape_string($db, $_POST['email']);
		$password_1 =mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 =mysqli_real_escape_string($db, $_POST['password_2']);
//ensure that form field are filles properly
		if (empty($username)) {
			array_push($errors, "Username is Required"); //add error to the array
		}
		if (empty($email)) {
			array_push($errors, "Email is Required"); 
		}
		if (empty($password_1)) {
			array_push($errors, "Password is Required"); 
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two password don't match"); 
		}
		if (count($errors) ==0) {
			$password = md5($password_1);//encrypt password before storing in database
			$sql= "INSERT INTO users(username, email, password)VALUES('$username','$email','$password')";
			mysqli_query($db,$sql);
			$_SESSION['username'] = $username;
			$_SESSION['success']  ="You are now logged in";
			header('location: index.php');
		}

	}
	//log in users
	if (isset($_POST['login'])) {
		$username =mysqli_real_escape_string($db, $_POST['username']);
		$password =mysqli_real_escape_string($db, $_POST['password']);
//ensure that form field are filles properly
		if (empty($username)) {
			array_push($errors, "Username is Required"); //add error to the array
		}
		if (empty($password)) {
			array_push($errors, "Password is Required"); 
		}
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($db,$query);
			if (mysqli_num_rows($result) == 1) {
				# login user
			$_SESSION['username'] = $username;
			$_SESSION['success']  ="You are now logged in";
			header('location: index.php');
			}else{ 
				array_push($errors, "wrong username/password ");
			}
		}
	}

	//logout
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location: index.php');
	}
 ?>
