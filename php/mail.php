<?php
function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } 
 
}

$x = $_Post["latp"];
$y = $_Post["longp"];
$fname = $_Post["fnamep"];
$lname = $_Post["lnamep"];
$uemail = $_Post["emailp"];
$uphone = $_Post["phonep"];

$email = "";
$loclat="";
$loclon="";
$name=" ";
$min=1000000;
$distances= array();
$i=0;
$con = new mysqli("localhost","id5071641_root","cellwall","id5071641_rjphp");
if($con){
$sql="SELECT * from info";
$result=$con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    			
    	$templat= $row["lattitude"];
    	$templong= $row["longitude"];
    	$tempemail=$row["email"];
    	$tempname=$row["name"];
        $tempdistance=round(distance($x,$y,$templat,$templong,"K"),3) ;
       //echo "temp dist is $tempdistance <br>";

        if($min > $tempdistance)
        {
           $min= $tempdistance;
         //  echo "value of $min ";
           $email=$tempemail;
           $name=$tempname;
           $loclon=$templong;
           $loclat=$templat;
        }

    	}   	
}else {
    echo "0 results";
}
}

$to = $email;
$subject = "EMERGENCY!!";
$txt = "Details of the person is :lattitude ; $x :longitude ; $y  name of the user  is : $fname.' '.$lname ; Contact no : $uphone ; Email : $uemail ";
$headers = "From: help@ghumantu.com" . "\r\n" .
"CC: $email";

mail($to,$subject,$txt,$headers);
if (mail($to,$subject,$txt,$headers)) {
	echo "success";
	# code...
}



?>