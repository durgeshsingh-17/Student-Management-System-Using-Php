<?php
	session_start();
	if (isset($_SESSION['uid'])) {
		echo "";
	} else {
		header('location:../login.php');
	}
?>
<?php
	include_once 'header.php';
	include_once '../db.php';

	$sid = $_SESSION['id'];
	$query = "SELECT * FROM `students` WHERE `id`=$sid";
	$result = mysqli_query($conn, $query);
	$data = mysqli_fetch_array($result);
?>

<form action="updateform.php" method="post" enctype="multipart/form-data">
	<table border="1" align="center" style="width:70%; margin-top: 40px;">
		<tr>
			<th>Roll No</td>
			<td><input type="text" name="rollno" value="<?php echo $data['rollNumber']; ?>" ></td>
		</tr>
		<tr>
			<th>Full Name</th>
			<td><input type="text" name="fname" value="<?php echo $data['name']; ?>" ></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" name="city" value="<?php echo $data['city']; ?>" ></td>
		</tr>
		<tr>
			<th>Parent Contact Number</th>
			<td><input type="text" name="pcont" value="<?php echo $data['pContactNum']; ?>" ></td>
		</tr>
		<tr>
			<th>Standard</th>
			<td><input type="text" name="std" value="<?php echo $data['standard']; ?>"></td>
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="file" name="img" value="<?php echo $data['image'];?>" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="submit" value="Update">
				
			</td>
		</tr>
	</table>
</form>
<?php 
if(isset($_POST['submit'])){
	$std_img 	= $_FILES['img']['name'];
    $destination = '../upload/' .$std_img;
	$temp 		= $_FILES['img']['tmp_name'];
    // get the file extension
    $extension = pathinfo($std_img, PATHINFO_EXTENSION);

   
   
    $size = $_FILES['img']['size'];
		
		

		if(move_uploaded_file($temp,$destination)){
		

	
  $sql = "UPDATE `students` SET `name`='".$_POST['fname']."',`rollNumber`='".$_POST['rollno']."',`city`='".$_POST['city']."',`pContactNum`='".$_POST['pcont']."',`standard`='".$_POST['std']."',`image`='".$std_img."',`size`='".$size."' WHERE `id`= $sid  ";
  //echo $sql;die;
  if (mysqli_query($conn,$sql)) {
   echo '<script>alert("Successfully updated")</script>';
    # code...
}
  }
}
  ?>
