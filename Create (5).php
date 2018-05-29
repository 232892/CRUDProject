<?php
//create.php
include_once 'db_Open.php';
//echo "Connected Successfully";

	//delcare PHP variables
	
	$Name = $_POST['Name'];
	$Genere = $_POST['Genere'];
	//Output any connection error
	if ($conn->connect_error) {
		die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
	}   
	else
	{
	$statement = $conn->prepare("INSERT INTO GameData (Name, Genere) VALUES(?,?)"); //prepare sql insert query
		//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
		$statement->bind_param('ss', $Name, $Genere); //bind value
		if($statement->execute())
			{
				//print output text
				echo nl2br(" Record Inserted ");
			}
			else{
					print $conn->error; //show mysql error if any 
				}
//echo"<br><form action= 'update_delete.php' method = 'get'>";
echo "<input name = 'action'   type = 'submit' value = 'Go Back'></form>";	
	}
 
?>