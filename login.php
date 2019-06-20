<?php  


$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
if(!empty($name))
	{
		if (!empty($email)) 
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
					$sql = "INSERT INTO test (name, email) 
					values ('$name','$email')";
				
				if ($conn->query($sql))
				{
					echo "New record is inserted sucessfully \n Please do not fill the from again \nWait for us to contact you";
				}
				else
				{
					echo "Error: ". $sql ."". $conn->error;
				}
				$conn->close();
				}	
			}
		else
		{
			echo "Email should not be empty";
			die();
		}
	}
else
	{
		echo "Name should not be Empty";;
		die();
	}
?>