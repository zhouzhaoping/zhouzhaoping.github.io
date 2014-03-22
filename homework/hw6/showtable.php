<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Wizard Form Result</title>
	<link rel="stylesheet" type="text/css"  href="../../mystyle.css" />
	<link rel="stylesheet" type="text/css"  href="mystyle.css" />
	<link rel="stylesheet" type="text/css"  href="code1style.css" />
	<link rel="shortcut icon" href="../../images/favicon.ico" />
</head>

<body>
	<!-- navbar -->
	<div>
		<ul class = "navigation">
		<li><a href = "../../index.html">Home</a></li>
		<li><a href = "http://162.105.146.183/b2evolution/blogs/index.php/zhouzhaoping/">My Blog</a></li>
		<li><a id = "choice" href = "../../homework.html">Homework</a></li>
		<li><a href = "../../aboutme.html">About me</a></li>
		</ul>
	</div>
	<div class = "bar"></div>
	<!-- navbar -->
	
	
	<div class = "main">
		<!-- Hommwork1 -->
		<div class = "title">
			<p>Survey Result</p>
		</div>
		
		<!-- Result -->
		<div class = "content">
			
			<?php
				$con=mysqli_connect("localhost","usr_2013_61","ak47jay187","db_2013_61");
				if (mysqli_connect_errno($con)){
					echo "Failed to connect to MySQL: ".mysqli_connect_error();
					exit;
				}
				
				// guest Table
				$result = mysqli_query($con,"SELECT * FROM tourist");
				echo "<form action = \"delete.php\" method = \"get\">";
				echo "<table border='1' style = 'width:100%;'>
				<caption>Tourist Information</caption>
				<tr>
				<th>ID_Number</th>
				<th>First_Name</th>
				<th>Last_Name</th>
				<th>Age</th>
				<th>Gender</th>
				<th>Watch</th>
				<th>Holiday</th>
				<th>Knowledge</th>
				<th>E_mail</th>
				<th>delete</th>
				</tr>";
				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>".$row['ID_Number']."</td>";
					echo "<td>".$row['First_Name']."</td>";
					echo "<td>".$row['Last_Name']."</td>";
					echo "<td>".$row['Age']."</td>";
					echo "<td>".$row['Gender']."</td>";
					echo "<td>".$row['Watch']."</td>";
					echo "<td>".$row['Holiday']."</td>";
					echo "<td>".$row['Knowledge']."</td>";
					echo "<td>".$row['E_mail']."</td>";
					echo "<td>"."<input type = \"checkbox\" name = \"delete[]\" value = ".$row['Tourist_ID']."></td>";
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
					
			<table id = "foot-nav">
			<tr>
			<td><p id = "left"><a href = "wizardForm.html" >&lt;&lt; Do Survey again</a></p></td>
			<td><p id = "center"><a href = "index.html">Return to Week6 Home</a></p></td>
			<td><p id = "right"><a href = "index.html">Bonus:More Functions &gt;&gt;</a></p></td>
			</tr>
			</table>
			
		</div>		
	</div>
	<div class = "end">Copyright © 周钊平（Zhou Zhaoping）</div>
</body>

</html>