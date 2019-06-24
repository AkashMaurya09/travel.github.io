<?php
	session_start();
	require_once('connection.php');

	if (isset($_POST['logIn'])) 
	{
		if (empty($_POST['email']) || empty($_POST['password'])) 
		{
			
		}
		else
		{
			$email = mysqli_real_escape_string($con,$_POST['email']);
			$password = mysqli_real_escape_string($con,$_POST['password']);

			$query = "SELECT * FROM userlogin WHERE email='".$email."'";
			$result = mysqli_query($con,$query);

			if ($row = mysqli_fetch_assoc($result)) 
			{
				$HashPass = password_verify($password,$row['password']);

				if ($HashPass==false) 
				{
					echo "incorrect password";
				}
				elseif ($HashPass==true) 
				{
					$_SESSION['U_D']=$row['ID'];
					$_SESSION['name']=$row['name'];
					$_SESSION['email']=$row['email'];
					$_SESSION['password']=$row['password'];
					$_SESSION['confirmpassword']=$row['confirmpassword'];
					$_SESSION['phone']=$row['phone'];

					echo "Welcome";
					exit();
				}
			}
			else
			{
				echo "incorrect email";
				exit();
			}
		}
	}

?>