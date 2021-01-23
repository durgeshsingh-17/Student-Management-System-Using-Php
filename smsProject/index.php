<!DOCTYPE html>
<html>
<head>
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="css\custom.css">
</head>
	<body><br/>
		<h1 class="sms" align="center">Welcome to Student Management System</h1>
		<h4 align="right" style="padding-right:50px; margin:0;">
			<a href="login.php" style="text-decoration: none;">Admin Login</a>
		</h4>
		<form action="index.php" method="post">
			<table align="center" border="2">
				<tr class="sms">
					<th colspan="2" align="center" style="padding-bottom: 10px;">Student Information</th>
				</tr>
				<tr>
					<td>Choose Standard</td>
					<td>
						<select name="std" style="width: 215px; padding: 7px;">
							<option value="0">select std</option>
							<option value="1">1st</option>
							<option value="2">2nd</option>
							<option value="3">3rd</option>
							<option value="4">4th</option>
							<option value="5">5th</option>
							<option value="6">6th</option>
							<option value="7">7th</option>
							<option value="8">8th</option>
							<option value="9">9th</option>
							<option value="10">10th</option>
							<option value="11">11th</option>
							<option value="12">12th</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Enter Roll Number</td>
					<td><input type="number" name="rollno" required style="width: 200px; padding: 7px;"></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input style="padding: 8px; cursor: pointer;     width: 100px;
    border-radius: 100px;" type="submit" name="submit" value="Show Info" class="sms">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php
	if (isset($_POST['submit'])) {
	    $std = $_POST['std'];
		$rno = $_POST['rollno'];
		
	    include_once 'function.php';
	    showDetails($std, $rno);
	}