<?php
//read.php
//require_once 'Login.php';
include_once 'db_Open.php';
//include 'db_Close.php';
//if ($conn->connect_error) 
//{
    //die("Connection faile7d: " . $conn->connect_error);
//}

	
//$sql = "SELECT * FROM GameData;";
//$sql = "SELECT * FROM GameData WHERE Genere='" . $_POST['Type'] . "'";
if (isset($_POST['Type'])){
$search = mysqli_real_escape_string($conn, $_POST['Type']);
if ($search == 'All'){
	$sql = "SELECT * FROM GameData ";
}
else{
$sql = "SELECT * FROM GameData WHERE Genere='$search'";

}
}
if (isset($_POST['update'])){
$updatequery = "UPDATE GameData SET Name='$_POST [Name]', Genere='$_POST [Genere]'";
mysql_query($updatequery, $sql);
}
//$sql = "SELECT * FROM GameData WHERE Genere='$search'";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);


// HTML to display the form on this page.
echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD><BODY>";
echo nl2br("<H2>Here are the results found "." ". $_POST['Name']."</H2>");
//$num_names = mysql_num_rows($roster_table);
if ($resultcheck > 0)//will only do this if there is something to be returned from the aboe line
	{	echo"<HEAD> <link rel='stylesheet' href='styles.css'></HEAD>";
		echo "<TABLE><TR><TH>Name</TH><TH>Genere</TH></TR>";
		//echo "<TABLE><TR><TH>ID</TH><TH> Name</TH><TH>Genere</TH></TR>";
		// Iterate through all of the returned images, placing them in a table for easy viewing
	/*while($row = mysqli_fetch_assoc($result))
		{
			//echo $row['Name'];
			// The following few lines store information from specific cells in the data about an image
			echo "<TR>";
			//echo "<TD>".$row['Name']. "</TD><TD>". $row['Genere']. "</TD>";
			echo "<TD>".$row['ID']. "</TD><TD>". $row['Name']. "</TD><TD>".$row['Genere'] ."</TD>";
			echo "</TR>";
		}*/
	while($row = mysqli_fetch_array($result))
		{
			//echo $row['Name'];
			// The following few lines store information from specific cells in the data about an image
			//echo "<form action="Read.php" method = POST>";
			//echo "<tr><form action="Read.php" method=post>";
			echo "<td><input type=text name=Name value=' ".$row['Name']."'></td>";
			echo "<td><input type=text name=Genere value=' ".$row['Genere']."'></td>";
			echo "<input type=hidden name=ID value=' ".$row['ID']."'>";
			echo "<td><input type=Submit name= update value='update' </td>";
			echo "</form></tr>";


			/*echo "<TR>";
			//echo "<TD>".$row['Name']. "</TD><TD>". $row['Genere']. "</TD>";
			echo "<TD>".$row['ID']. "</TD><TD>". $row['Name']. "</TD><TD>".$row['Genere'] ."</TD>";
			echo "</TR>";*/
		}
		
	/*echo "</TABLE>";
	echo"<br> Need to update an item? <form action= 'update_delete.php' method = 'get'>";
	echo "<input name = 'action'   type = 'submit' value = 'Yes'>";
	echo "<input name = 'action'   type = 'submit' value = 'No'>";
	echo "</FORM>";*/
	}
	else{
		echo "<br> 0 results";
		}
		echo '</body>';
	
	
?>