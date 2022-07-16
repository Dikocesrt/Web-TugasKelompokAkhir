<?php
$host = "localhost";
$port = 3306;
$database = "mywebsite";
$user = "root";
$pw = "";
$connection = new PDO("mysql:host=$host:$port;dbname=$database", $user, $pw);
if(isset($_POST["submit"])){
	$name = $_POST["name"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$password2 = $_POST["password2"];
	if($name == ""){
	?>
	<script>alert("Nama tidak boleh kosong!!!");</script>
	<?php
	}else if($username == ""){
	?>
	<script>alert("Username tidak boleh kosong!!!");</script>
	<?php
	}else if($email == ""){
	?>
	<script>alert("Email tidak boleh kosong!!!");</script>
	<?php
	}else if($password == ""){
	?>
	<script>alert("Password tidak boleh kosong!!!");</script>
	<?php
	}else if($password2 == ""){
	?>
	<script>alert("Konfirmasi password tidak boleh kosong!!!");</script>
	<?php
	}else if($password != $password2){
	?>
	<script>alert("Password tidak cocok!!!");</script>
	<?php
	}else{
		$sql = "insert into account (nama, username, password, email) values (?, ?, ?, ?)";
		$result = $connection->prepare($sql);
		$result->execute([$name, $username, $password, $email]);
		?>
		<script>alert("Berhasil mendaftarkan akun!!!");</script>
	<?php
	}
}
$connection = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Sign-up Page</title>
</head>
<body background="Kubik.jpg">
	<div class="kotak-login">
		<h2 class="center">MyWebsite</h2>
		<p class="center">Silahkan Daftar Baru</p>
		<hr>
		<form name="signup" method="POST">
			<label>Name</label>
			<input type="text" name="name" class="form-login" placeholder="Masukkan Nama Lengkap...">
			<label>Username</label>
			<input type="text" name="username" class="form-login" placeholder="Masukkan Username...">
			<label>Email address</label>
			<input type="text" name="email" class="form-login" placeholder="Masukkan Alamat Email...">
			<label>Password</label>
			<input type="password" name="password" class="form-login" placeholder="Masukkan Password...">
			<label>Confirm Password</label>
			<input type="password" name="password2" class="form-login" placeholder="Masukkan Password lagi...">
			<input type="submit" name="submit" value="Sign Up" class="tombol-login">
		</form>
		<p class="tulisan-akun center">Sudah punya akun?<span><a href="index.php"> Sign in</a></span></p>
	</div>
</body>
</html>