<?php
	// party Table
	$con=mysqli_connect("localhost","usr_2013_61","ak47jay187","db_2013_61");
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
		exit;
	}
	
	$result = mysqli_query($con,"SELECT * FROM party");
	echo "<form action = \"week4-join.php\" method = \"get\">";
	echo "<table border='1'>
	<caption>Party Information</caption>
	<tr>
	<th>Party_Num</th>
	<th>Time</th>
	<th>Place</th>
	<th>Host_Name</th>
	<th>join</th>
	</tr>";
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$row['Party_Num']."</td>";
		echo "<td>".$row['Time']."</td>";
		echo "<td>".$row['Place']."</td>";
		echo "<td>".$row['Host_Name']."</td>";
		echo "<td>"."<input type = \"checkbox\" name = \"join[]\" value = ".$row['Party_Num']."></td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<p>Please input your Guest_ID:<input type=\"text\" name=\"id\" /></p>";
	echo "
		<fieldset>
			<input type=\"submit\" style = \"font-size:30px\" value=\"Join the parties\" />
			<input type=\"reset\" style = \"font-size:30px\" value=\"Reset\" />
		</fieldset>
		</form>
		";
	mysqli_close($con);
?>