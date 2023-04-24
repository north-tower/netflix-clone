<?php
	session_start();
	include('connect.php');
//Array to store validation errors
	$errmsg_arr = array();
	$errflag = false;
	//Select database


$con=mysqli_connect("localhost","borafuds_Eve","lawrenza12@","borafuds_Pos");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security

	//Function to sanitize values received from the form. Prevents SQL injection



	//Sanitize the POST values

	$login = $_POST['username'];
	$password = $_POST['password'];

	

	//Input Validations

	if($login == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;

	}

	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;

	}

	

	//If there are input validations, redirect back to the login form

	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: index.php");
		exit();

	}

	

	//Create query

 $stmt = $db->prepare("SELECT * FROM user WHERE username=:uname AND password=:umail");
 $stmt->bindParam(':uname', $login);
 $stmt->bindParam(':umail', $password);
          $stmt->execute();
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0){
		  session_regenerate_id();
		   $_SESSION['SESS_MEMBER_ID'] = $userRow['id'];

			$_SESSION['SESS_FIRST_NAME'] = $userRow['name'];

			$_SESSION['SESS_LAST_NAME'] = $userRow['position'];

			$_SESSION['SESS_CITY'] = $userRow['city'];

			$_SESSION['usertype'] = $userRow['user_type'];
			
			session_write_close();

			header("location: main/welcome.php");

			exit();
			}else {

			//Login failed

			header("location: index.php");

			exit();

		}

           ?>