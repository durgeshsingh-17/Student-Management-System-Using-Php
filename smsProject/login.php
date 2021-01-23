<?php
	session_start();
	if (isset($_SESSION['uid'])) {
	    header('location: admin/admindash.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
	</head>
	<body><br/>
		<h1 align="center" style="margin:0;">Admin Login</h1>
		<h4 align="right" style="padding-right:50px; margin:0;">
			<a href="index.php" style="text-decoration: none;">Home Page</a>
		</h4>
		<form action="login.php" method="post">
			<table align="center">
				<tr>
					<td align="left">User Name</td>
					<td><input type="text" name="uname" required></td>
				</tr>
				<tr>
					<td align="left">Password</td>
					<td><input type="password" name="pass" required></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
					<input type="submit" name="login" value="Login" style="margin-top: 25px; padding: 5px;" ></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php
require_once 'db.php';
if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    // print_r($username);
    // print_r($password);

    include_once 'db.php';

    $query = "SELECT * FROM admins WHERE userName = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    // die();
	$row = mysqli_num_rows($result);
	echo "$row";
	// die();
    if ($row < 1) {
        ?>
		<script>
			alert('User name or password not matched..');
			window.open('login.php','_self'); // _blank to open in new tab
		</script>
		<?php
} else {
        $data = mysqli_fetch_assoc($result);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $id = $data['id'];
        session_start();
        $_SESSION['uid'] = $id;
        header('location: admin/admindash.php');
    }
}
?>