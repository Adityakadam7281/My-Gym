<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$adress1= $_POST['adress2'];
	$adress2 = $_POST['adress2'];
	$weight = $_POST['weight'];
	$plan = $_POST['plan'];

	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, email, adress1, adress2, weight, plan) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $name, $email, $adress1, $adress2, $weight, $plan);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>