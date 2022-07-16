<?php
$host = "localhost";
$port = 3306;
$database = "mywebsite";
$user = "root";
$pw = "";
$connection = new PDO("mysql:host=$host:$port;dbname=$database", $user, $pw);
if(isset($_POST["login"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$sql = "select * from account where username = ? and password = ?";
	$result = $connection->prepare($sql);
	$result->execute([$username, $password]);
	$success = false;
	$findUser = null;
	foreach($result as $value){
		$success = true;
		$findUser = $value["username"];
	}
	if($success){
		header("location: beranda.html");
	}else{
?>
		<script>alert("Password anda salah!");</script>
<?php
	}
}
$connection = null;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	<link rel="stylesheet" href="style2.css">
</head>
<body background="Kubik.jpg">
	<div class="kotak-login">
		<h2 class="center">MyWebsite</h2>
		<p class="center">Silahkan login</p>
		<hr>
		<form name="login" method="POST">
			<label>Username</label>
			<input type="text" name="username" class="form-login" placeholder="Username">
			<label>Password</label>
			<input type="password" name="password" class="form-login" placeholder="Password">
			<input type="submit" name="login" value="Login" class="tombol-login">
		</form>
		<p class="tulisan-akun center">Belum punya akun?<span><a href="signup.php"> Sign up</a></span></p>
	</div>
</body>
</html>