<?php
	
	require_once('connection.php');

	if (isset($_POST['signup'])) 
	{
		if(empty($_POST['name']) || empty($_POST['password']) || empty($_POST['confirmpassword']) || empty($_POST['email']) || empty($_POST['phone']))
		{
			#
		}
		else
		{
			$name = mysqli_real_escape_string($con,$_POST['name']);
			$email = mysqli_real_escape_string($con,$_POST['email']);
			$password = mysqli_real_escape_string($con,$_POST['password']);
			$confirmpassword = mysqli_real_escape_string($con,$_POST['confirmpassword']);
			$phone = mysqli_real_escape_string($con,$_POST['phone']);

			$query = "SELECT * FROM userlogin WHERE email='".$email."'";
			$result = mysqli_query($con,$query);

			if (mysqli_fetch_assoc($result)) 
			{
				echo "Email already exists";
				exit();
			}
			else
			{
				$Hash = password_hash($password, PASSWORD_DEFAULT);
				$Hashc = password_hash($confirmpassword, PASSWORD_DEFAULT);
				$query = "INSERT INTO userlogin (name,email,password,confirmpassword,phone) values('$name','$email','$Hash','$Hashc','$phone')";
				$result = mysqli_query($con,$query);
				echo "success";
				exit();
			}

		}

	}

	else
	{
		# redirect to main page
		exit();
	}

?>