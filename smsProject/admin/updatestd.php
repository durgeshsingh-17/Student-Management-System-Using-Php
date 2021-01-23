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
	include_once 'titlehead.php';
?>
<style type="text/css">
	a{
		text-decoration: none;
	}
</style>
<table align="center" style="margin-top: 10px">
	<form action="updatestd.php" method="post" accept-charset="utf-8">
		<tr>
			<th>Enter Standard</th>
			<td><input type="number" name="std" placeholder="Enter Standard" required="required"></td>
			<th>Enter Name</th>
			<td><input type="text" name="stdname" placeholder="Enter Roll Number" required="required"></td>
			<td colspan="2"><input type="submit" name="submit" value="Search"></td>
		</tr>
	</form>
</table>
<table align="center" width="75%" border="1" style="margin-top: 10px">
	<tr style="background-color: #399b75; color: #fff;">
		<th>No</th>
		<th>Image</th>
		<th>Name</th>
		<th>Roll No</th>
		<th>Edit</th>
	</tr>

	<?php
	if (isset($_POST['submit'])) {

		$std = $_POST['std'];
		$name = $_POST['stdname'];
		
		include_once '../db.php';

		//$query = "SELECT * FROM `students` WHERE `standard`=$std AND `rollNumber`=$name";

			$result =mysqli_query($conn,"SELECT * FROM `students` WHERE `standard`='$std' AND `rollNumber`=$name");
		//echo"<pre>";print_r($result);die;
	

		$rowData = mysqli_num_rows($result);
	
		//print_r($rowData);

	//die();
		
		if ($rowData < 1) {
			echo "<tr><td colspan='5'>No records found</td></tr>";
		} else {
			$count = 0;
			while ($data = mysqli_fetch_array($result)) {
				$_SESSION['id'] =  $data['id'];
				$count++;
				?>
					<tr align="center">
						<td><?php echo $count; ?></td>
						<td><img src="../upload/<?php echo $data['image']; ?>" style="max-width:50px;"></td>
						<td><?php echo $data["name"]; ?></td>
						<td><?php echo $data['rollNumber']; ?></td>
						<td><a href="updateform.php?sid=<?php echo $data['id']; ?>">Edit</a></td>
					</tr>
				<?php
			}	
    	}
	}
	?>
</table>
