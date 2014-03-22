<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>HW4-3_Zhouzhaoping's website</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css" />
	<link rel="stylesheet" type="text/css" href="homework4-3style.css" />
	<link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
	<!-- navbar -->
	<div>
		<ul class = "navigation">
		<li><a href = "index.html">Home</a></li>
		<li><a href = "http://162.105.146.183/b2evolution/blogs/index.php/zhouzhaoping/">My Blog</a></li>
		<li><a id = "choice" href = "homework.html">Homework</a></li>
		<li><a href = "aboutme.html">About me</a></li>
		</ul>
	</div>
	<div class = "bar"></div>
	<!-- navbar -->
	
	
	<div class = "main">
		<!-- Title -->
		<div class = "title">
			<p>Homework3~5 for Week 4</p>
		</div>
		<!-- Title end-->
		
		<script language='javascript'>
		function checkForm(form){
			var pattern = /^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/;
			if(form.name.value==""){
				alert("Please input your name.");
				form.name.focus();
				return false;
			}else if(form.age.value==""){
				alert("Please input your age.");
				form.age.focus();
				return false;
			}else if (isNaN(form.age.value) || form.age.value < 10 || form.age.value > 100){
				alert("You age should be integer(10~100).");
				form.age.focus();
				return false;
			}else if(form.email.value==""){
				alert("Please input your email.");
				form.email.focus();
				return false;
			}else if (!pattern.test(form.email.value)) {
				alert("please input right email address!");
				return false;
			}else
				return confirm("Are you sure? Please check your information.");
		}
		
		function checkParty(form){
			if(form.name.value==""){
				alert("Please input your name.");
				form.name.focus();
				return false;
			}else if (form.place.value==""){
				alert("Please input the place.");
				form.place.focus();
				return false;
			}else if (form.time.value==""){ 
				alert("Please input the time.");
				form.time.focus();
				return false;
			}else
				// alert(form.time.value);
				return confirm("Are you sure?\nOnce you decide to hold a party，there will be no going back!\nPlease check the information.");
		}
		</script>
				
		<!-- Survey -->
		<div class = "survey">
			<h1>Please do a survey(check the input with javascript)</h1>
			<form action = "week4-collector.php" method = "get" onsubmit="return checkForm(this)">
				<p>Your Name:<input type="text" name="name"/></p>
				<p>Your Age:<input type="number" name="age" min="10" max="100"></p>
				<p>Your Gender:
					<input type="radio" name="gender" value="female" checked="checked" />Female
					<input type="radio" name="gender" value="male"/>Male
				</p>
				<p>Email Address:<input type="text" name="email" /></p>
				<p>Select a party:
					<select name = "select">
						<?php include 'week4-showselect.php'; ?>
					</select>
				</p>
				<fieldset>
					<input type="submit" style = "font-size:30px" value="Submit" />
					<input type="reset" style = "font-size:30px" value="Reset" />
				</fieldset>
			</form>
		</div>
		<!-- Survey end -->
		
		<!-- Survey -->
		<div class = "survey">
			<h1>Survey Result</h1>
			<?php include 'week4-showguest.php'; ?>
		</div>
		<!-- Survey end -->
		
		<!-- Survey -->
		<div class = "survey">
			<h1>Find Guest(And we will show the party he participating)</h1>
			<p>No input is default to all.<br /></p>
			<form action = "week4-query.php" method = "get">
				<p>Name:<input type="text" name="name"/></p>
				<p>Age:<input type="number" name="age" min="10" max="100"></p>
				<p>Gender:
					<input type="radio" name="gender" value="unknown" checked="checked" />Unknown
					<input type="radio" name="gender" value="female" />Female
					<input type="radio" name="gender" value="male"/>Male
				</p>
				<p>Email Address:<input type="text" name="email" /></p>
				<fieldset>
					<input type="submit" style = "font-size:30px" value="Query" />
					<input type="reset" style = "font-size:30px" value="Reset" />
				</fieldset>
			</form>
		</div>
		
		<!-- Survey -->
		<div class = "survey">
			<h1>Hold a party</h1>
			<form action = "week4-addparty.php" method = "get" onsubmit="return checkParty(this)">
				<p>Your Name:<input type="text" name="name"/></p>
				<p>Place:<input type="text" name="place" /></p>
				<p>Time:<input type="datetime-local" name="time"></p>
				<fieldset>
					<input type="submit" style = "font-size:30px" value="Submit" />
					<input type="reset" style = "font-size:30px" value="Reset" />
				</fieldset>
			</form>
		</div>
		<!-- Survey end -->
		
		<!-- Survey -->
		<div class = "survey">
			<h1>Party List</h1>
			<?php include 'week4-showparty.php'; ?>
		</div>
		<!-- Survey end -->
		
		<!-- Survey -->
		<div class = "survey">
			<h1>Guest-Party Relation</h1>
			<?php include 'week4-showguestparty.php'; ?>
		</div>
		<!-- Survey end -->
		
		<!-- Survey -->
		<div class = "survey">
			<h1>Show all details</h1>
			<?php include 'week4-showall.php'; ?>
		</div>
		<!-- Survey end -->
		
	</div>
	<div class = "end">Copyright © 周钊平（Zhou Zhaoping）</div>
</body>

</html>