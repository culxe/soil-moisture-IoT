<?php 
 $username = "root"; 
 $password = ""; 
 $server = "127.0.0.1"; 
 $db = "aplikasi_iot"; 
 $connect = mysqli_connect($server,$username,$password,$db); 
 
 $s1 = $_GET['s1']; 
 $s2 = $_GET['s2']; 
 
 
 if (!$connect){ 
  die("CONNECTION FAILED!"); 
 } 

 $sql =  "INSERT INTO sensor(sensor_time,sensor_1,sensor_2) VALUES (CURRENT_TIME(),$s1,$s2)"; 
 
 if (mysqli_query($connect,$sql)){ 	
	print  "recorded"; 
 } 
 
 mysqli_close($connect); 
?>