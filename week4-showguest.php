<?php
	$con=mysqli_connect("localhost","usr_2013_61","ak47jay187","db_2013_61");
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
		exit;
	}
	
	// guest Table
	$result = mysqli_query($con,"SELECT * FROM guest");
	echo "<form action = \"week4-delete.php\" method = \"get\">";
	echo "<table border='1'>
	<caption>Guest Information</caption>
	<tr>
	<th>Guest_ID</th>
	<th>Guest_Name</th>
	<th>Age</th>
	<th>Gender</th>
	<th>E_mail</th>
	<th>delete</th>
	</tr>";
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$row['Guest_ID']."</td>";
		echo "<td>".$row['Guest_Name']."</td>";
		echo "<td>".$row['Age']."</td>";
		echo "<td>".$row['Gender']."</td>";
		echo "<td>".$row['E_mail']."</td>";
		echo "<td>"."<input type = \"checkbox\" name = \"delete[]\" value = ".$row['Guest_ID']."></td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "
		<fieldset>
			<input type=\"submit\" style = \"font-size:30px\" value=\"Delete\" />
			<input type=\"reset\" style = \"font-size:30px\" value=\"Reset\" />
		</fieldset>
		</form>
		";
	mysqli_close($con);
?>