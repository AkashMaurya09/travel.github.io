<?php  


$name = filter_input(INPUT_POST, 'name');
$password= filter_input(INPUT_POST, 'password');
$confirmpassword= filter_input(INPUT_POST, 'confirmpassword');
$email = filter_input(INPUT_POST, 'email');
$phone= filter_input(INPUT_POST, 'number');
if(!empty($name) || !empty($password) || !empty($email) || !empty($phone))
	{
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "test";

		//Create Connection
		$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
		if(mysqli_connect_error())
		{
			die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
		}
		else
		{
			

			$s = "select * from registration where email = '$email'";
			$result = mysqli_query($conn, $s);
			$num = mysqli_num_rows($result);
			if ($num == 1)
			{
				echo "Email already exists";
			}
			else
			{
				$sql = "INSERT INTO registration (name, password, email, phone) 
					values ('$name','$password','$email','$phone')";
					mysqli_query($conn, $sql);
					echo "registration success";
			}
				
			/*if ($conn->query($sql))
			{
				echo "New record is inserted sucessfully \n Please do not fill the from again \nWait for us to contact you";
			}
			else
			{
				echo "Error: ". $sql ."". $conn->error;
			}
			$conn->close();*/
		}		
	}			
else
	{
		echo "All fields required";
		die();
	}
?>