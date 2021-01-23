<?php
	session_start();
	if (isset($_SESSION['uid'])) {
	} else {
	    header('location:../login.php');
	}
?>

<?php
	include_once 'header.php';
?>
	<style type="text/css">
			text-decoration: none;
			color: #fff;
		}
	</style>

		<div class="admin_title" align="center">
			<h4>
				<a href="logout.php" style="float:right; margin-right: 30px; color: #fff; font-size:20px;">Logout</a>
			</h4>
			<h1>Welcome to Admin Dashboard</h1>
		</div>
		<div class="dashboard">
			<table style="width:75%; padding-top:15px; padding-left:450px;">
					<tr>
						<td>1.</td><td><a href="addstd.php">Insert Student</a></td>
					</tr>
					<tr>
						<td>2.</td><td><a href="updatestd.php">Update Student</a></td>
					</tr>
					<tr>
						<td>3.</td><td><a href="deletestd.php">Delete Student</a></td>
					</tr>
			</table>
		</div>
	</body>
</html>
