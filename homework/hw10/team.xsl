<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
<xsl:output method="xml" version="1.0" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN" doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"/>
<xsl:template match="/">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Barcelona</title>
	<link rel="stylesheet" type="text/css" href="../../mystyle.css" />
	<link rel="stylesheet" type="text/css" href="mystyle.css" />
	<link rel="shortcut icon" href="../../images/favicon.ico" />
	<style>
	table { text-align:center; margin: 0 auto; margin-bottom:10px; border-collapse:collapse; border:1px #ccc solid; } 
	td, th { height:40px; width:150px; border:1px #ccc solid; } 
	th { text-align:center; background-color:red; color:white; font-size:20px; }
	.bluebg {background-color:blue; }
	</style>
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
		<div class = "title">
			<p>My Favourite Football Club</p>
		</div>
		
		<div class = "content">
			<h1>FC_Barcelona</h1>
			<xsl:for-each select="myteam/team">
			<table border="1">
				<tr>
					<th colspan="3" class = "bluebg">Club</th>
				</tr>
				<tr>
					<td rowspan="9"><img src="{emblem}"/></td>
					<th>Full Name</th>
					<td><xsl:value-of select="name/fullname"/></td>
				</tr>
				<tr>
					<th>Nick Name</th>
					<td><xsl:value-of select="name/nickname"/></td>
				</tr>
				<tr>
					<th>Founded</th>
					<td><xsl:value-of select="founded"/></td>
				</tr>
				<tr>
					<th>Ground</th>
					<td><xsl:value-of select="local/ground"/></td>
				</tr>
				<tr>
					<th>Nation</th>
					<td><xsl:value-of select="local/nation"/></td>
				</tr>
				<tr>
					<th>City</th>
					<td><xsl:value-of select="local/city"/></td>
				</tr>
				<tr>
					<th>President</th>
					<td><xsl:value-of select="president"/></td>
				</tr>
				<tr>
					<th>Manager</th>
					<td><xsl:value-of select="manager"/></td>
				</tr>
				<tr>
					<th>Website</th>
					<td><a href = "{website}"><xsl:value-of select="website"/></a></td>
				</tr>
				<tr>
					<th colspan="3" class = "bluebg">Player</th>
				</tr>
				<xsl:for-each select="staff/player">
				<tr>
					<td rowspan="7"><img src="{picture}"/></td>
					<th>Name</th>
					<td><xsl:value-of select="name"/></td>
				</tr>
				<tr>
					<th>No.</th>
					<td><xsl:value-of select="number"/></td>
				</tr>
				<tr>
					<th>Position</th>
					<td><xsl:value-of select="position"/></td>
				</tr>
				<tr>
					<th>Nationality</th>
					<td><xsl:value-of select="nationality"/></td>
				</tr>
				<tr>
					<th>Birth</th>
					<td><xsl:value-of select="birth"/></td>
				</tr>
				<tr>
					<th>Weight</th>
					<td><xsl:value-of select="weight"/></td>
				</tr>
				<tr>
					<th>Height</th>
					<td><xsl:value-of select="height"/></td>
				</tr>
				</xsl:for-each>
			</table>
			</xsl:for-each>
		</div>
	</div>
</body>
</html>
</xsl:template>
</xsl:stylesheet>