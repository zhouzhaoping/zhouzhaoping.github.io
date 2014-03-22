<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>HW7&amp;8_3</title>
	<link rel="stylesheet" type="text/css" href="../../mystyle.css" />
	<link rel="stylesheet" type="text/css" href="mystyle.css" />
	<link rel="shortcut icon" href="../../images/favicon.ico" />
	
	<script type="text/javascript">
		function change(n) 
		{
			document.getElementById('arg') = n;
		}
	</script>
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
			<p>Homework3 for Week 7&amp;8</p>
		</div>
		
		<div class = "content">
			
			<?php
				// 初始化变量
				$colorArr = array('black', 'red', 'green', 'blue');
				$shapeArr = array('round', 'rectangle');
				if (isset($_POST['color']))
					$color = $_POST['color'];
				else
					$color = 'blue';
				if (isset($_POST['shape']))
					$shape = $_POST['shape'];
				else
					$shape = 'round';
				if (isset($_POST['fill']))
					$fill = $_POST['fill'];
				else
					$fill = 'yes';
				
				// applet
				echo "<applet code='drawChange.class' width='220' height='220'>\n";
				echo "<param name='color' value='".$color."'>\n";
				echo "<param name='shape' value='".$shape."'>\n";
				echo "<param name='fill' value='".$fill."'>\n";
				echo "</applet><br />\n";
				
				// 表单
				echo "<form action = 'hw3.php' method = 'post'>\n";				
					echo "Color:";
					echo "<select name='color' style='width:100px'>\n";
					foreach ($colorArr as $i)
					{
						echo "<option value='".$i."' ";
						if ($i == $color)echo "selected='selected'";
						echo ">".$i."</option>\n";
					}
					echo "</select>\n&nbsp;&nbsp;";
					echo "Shape:";
					echo "<select name='shape' style='width:100px'>\n";
					foreach ($shapeArr as $i)
					{
						echo "<option value='".$i."' ";
						if ($i == $shape)echo "selected='selected'";
						echo ">".$i."</option>\n";
					}
					echo "</select>\n&nbsp;&nbsp;";
					echo "Fill:";
					
					if ($fill == 'yes')
					{
						echo "<input type='radio' name='fill' value = 'yes' checked='checked' />yes\n";
						echo "<input type='radio' name='fill' value = 'no' />no\n";
					}
					else
					{
						echo "<input type='radio' name='fill' value = 'yes' />yes\n";
						echo "<input type='radio' name='fill' value = 'no' checked='checked' />no\n";
					}
					echo "<br />\n";
				echo "<input type='submit' style = 'font-size:30px' value='Change now!' />\n";
				echo "</form>\n";
			?>
			
			<p>Click to see code:<a href = "code/code_drawChange.html">drawChange.java</a></p>
			
			
			<table id = "foot-nav">
			<tr>
			<td><p class = "left"><a href = "hw2.html">&lt;&lt; Hommwork2</a></p></td>
			<td><p class = "center"><a href = "index.html">Week7&amp;8 Home</a></p></td>
			<td><p class = "right"><a href = "hw4.html">Hommwork4 &gt;&gt;</a></p></td>
			</tr>
			</table>
		</div>
		
		
	</div>
	
	<div class = "end">Copyright &copy; 周钊平（Zhou Zhaoping）</div>
</body>

</html>