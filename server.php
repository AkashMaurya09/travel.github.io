<?php
session_start();
//initializing variable
$username = "";
$email="";
$errors = array();
//connect to db
$db = mysqli_connect('localhost','root','practice') or die("could not connect to database");

//register users

$username =mysqli_real_escape_string($db,$POST['username']);
$email =mysqli_real_escape_string($db,$POST['email']);
$password =mysqli_real_escape_string($db,$POST['password']);
//form validation

if(empty($username)) {array_push($errors,"username is required")};
if(empty($email)) {array_push($errors,"email is required")};
if(empty($password)) {array_push($errors,"password is required")};


//check db for exist
$user_check_query= "SELECT " FROM user WHERE username='$username' or email='$email' LIMIT 1"; 
$results = mysqli_query($db,$user_check_query);
$user = mysqli_fetch($result);

if($user){

       if($user['username')===$username){array_push($errors, "username already exists);}
       if($user['email')===$email){array_push($errors, "email already exists);
}
}


if(count($errors)==0){

$password = md5($password_1);
$query="INSERT INTO user(username , email, password)VALUES ('$username','$email','password')";

mysqli_query($db,$query);
$_SESSION['username']=$username;
$_SESSION['success']="you r now logged in";
header('location:index.php');
}
}

if(isset($_POST['login_user'])){

$username =mysqli_real_escape_string($db,$POST['username']);
$password =mysqli_real_escape_string($db,$POST['password']);
if(empty($username)){
	array_push($errors,"username is required");
	}

		if(empty($password)){
	array_push($errors,"password is required");
}

if(count($errors)==0){



	password=md5($password);
	$query="SELECT" FROM user WHERE username='$username' AND password='$password' ";
	$results=mysqli_query($db,$query);

	if(mysql_num_rows($results)){


		$_SESSION['username']=$username;
		$_SESSION['success']=$log in successfully;
		header("location:index.php");


	}else{

		array_push($errors,"wrong username/password combination.please try again. ");
		}
		}

	}
 ?>