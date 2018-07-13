<?php
$username = $_POST["usernamep"];
$password = $_POST["passwordp"];
$con = new mysqli("localhost","id5071641_root","cellwall","id5071641_rjphp");

if(!$con){
	die("connection failed");
}
else{
	$sql = 'SELECT * FROM users WHERE username = "'.$username.'"';
	$result = mysqli_query($con,$sql);
	
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_row($result)){
			if($row[6] == $password){
				echo "success"."|".$row[1]."|".$row[2]."|".$row[3]."|".$row[4];
			}else{
				echo $row[6];
				echo "pass incorrect";
			}
		}
	}else{
		echo "user not found";
	}
}
?>