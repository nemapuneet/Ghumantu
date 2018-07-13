<?php

$fname = $_POST["fnamep"];
$lname = $_POST["lnamep"];
$email = $_POST["emailp"];
$phoneno = $_POST["ccodep"].$_POST["phonenop"];
$username = $_POST["usernamep"];
$password = $_POST["passwordp"];

$con = new mysqli("localhost","id5071641_root","cellwall","id5071641_rjphp");

if(!$con){
	die("connection failed");
}
else{
	$sql = 'INSERT INTO users (fname,lname,email,phoneno,username,password) VALUES ("'.$fname.'","'.$lname.'","'.$email.'","'.$phoneno.'","'.$username.'","'.$password.'")';
	$result = mysqli_query($con,$sql);
	if(!$result){
		echo $sql;
		echo "there is error";
	}
	else{
		echo "fine";
	}
}
?>