<?php

//function OpenCon()
 
$dbhost = "localhost";
 $dbuser = "alexkarri";
 $dbpass = "Password";
 $db = "SteamGames";
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

 
 //return $conn;
 
 

?>