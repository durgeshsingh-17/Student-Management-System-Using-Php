<?php
	session_start();
	if (isset($_SESSION['uid'])) {
		// echo "";
	} else {
		header('location: ../login.php');
	}
	include_once '../db.php';
?>
<?php
	include_once 'header.php';
	include_once 'titlehead.php';
?>
<style type="text/css">
	a{
		text-decoration: none;
	}
</style>

<form action="addstd.php" method="post" enctype="multipart/form-data">
	<table border="1" align="center" style="width:70%; margin-top: 40px;">
		<tr>
			<th>Roll No</td>
			<td><input type="text" name="rollno" placeholder="Enter your roll number" required></td>
		</tr>
		<tr>
			<th>Full Name</th>
			<td><input type="text" name="fname" placeholder="Enter your name" required></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" name="city" placeholder="Enter your city" required></td>
		</tr>
		<tr>
			<th>Parent Contact Number</th>
			<td><input type="text" name="pcont" placeholder="Enter your parent number" required></td>
		</tr>
		<tr>
			<th>Standard</th>
			<td><input type="text" name="std" placeholder="Enter your standard" required></td>
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="file" name="img" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
</form>
</body>
</html>
<?php 
	if (isset($_POST['submit'])) {
		$rollno		= $_POST['rollno'];
		$fname  	= $_POST['fname'];
		$city   	= $_POST['city'];
		$pcont 		= $_POST['pcont'];
		$std  		= $_POST['std'];
		$std_img 	= $_FILES['img']['name'];
    $destination = '../upload/' .$std_img;
	$temp 		= $_FILES['img']['tmp_name'];
    // get the file extension
    $extension = pathinfo($std_img, PATHINFO_EXTENSION);

   
   
    $size = $_FILES['img']['size'];
		
		

		if(move_uploaded_file($temp,$destination)){
		
		// $fname=mysql_real_escape_string($fname);
		// $city=mysql_real_escape_string($city);
			//$query ="INSERT INTO `students`(`id`, `rollNumber`, `name`, `city`, `pContactNum`, `standard`, `image`, `size`) VALUES (,$rollno,$fname,$city,$pcont,$std,$std_img,$size)";
 $query = "INSERT INTO students set `name`= '$fname', `rollNumber`='$rollno', `city`='$city', `pContactNum`='$pcont', `standard`='$std',`image`= '$std_img', `size` = '$size'";
		//$query = "INSERT INTO `student` VALUES ('','','','','','','','')";
		//echo "<pre>";print_r($query);die;

		
		}

		//$result = mysqli_query($conn,$query);
	
		if(mysqli_query($conn,$query)){
			 echo "<script>alert('Data inserted successfully.');</script>"; 
		}
		else{
			echo "<script>alert('Data  not inserted successfully.');</script>";
		}
	}
?>