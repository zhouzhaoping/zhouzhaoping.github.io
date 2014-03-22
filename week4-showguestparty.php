<?php
	// guest_party Table
	$con=mysqli_connect("localhost","usr_2013_61","ak47jay187","db_2013_61");
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
		exit;
	}
	
	$result = mysqli_query($con,"SELECT * FROM guest_party");
	echo "<form action = \"week4-deleterelation.php\" method = \"get\">";
	echo "<table border='1'>
	<caption>Guest_Party Information</caption>
	<tr>
	<th>Guest_ID</th>
	<th>Party_Num</th>
	<th>delete</th>
	</tr>";
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$row['Guest_ID']."</td>";
		echo "<td>".$row['Party_Num']."</td>";
		echo "<td>"."<input type = \"checkbox\" name = \"delete[]\" value = \"".$row['Guest_ID']." ".$row['Party_Num']."\"></td>";
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