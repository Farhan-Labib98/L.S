<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repass= $_POST['repass'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','contacts');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into labib (name,email,password,repass) values(?, ?, ? ,?)");
		$stmt->bind_param("ssis", $name,$email, $password, $repass);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successful...";
		$stmt->close();
		$conn->close();
	}
?>