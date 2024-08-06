<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		fieldset{
			margin-top: 80px ;
		}
	</style>
</head>
<body>
	<?php
     $EmailValue="";
     if (isset($_COOKIE['user'])) {
     	$userinf=unserialize($_COOKIE['user']);
     	if (isset($userinf['Email'])) {
     		$EmailValue=htmlspecialchars($userinf['Email']);
     	}
     }

	?>
	<?php
     $PasswordValue="";
     if (isset($_COOKIE['user'])) {
     	$userinf=unserialize($_COOKIE['user']);
     	if (isset($userinf['Password'])) {
     		$PasswordValue=htmlspecialchars($userinf['Password']);
     	}
     }

	?>
	<center>
	<fieldset style="width: 30%;  background-color: royalblue;">
	
		<form method="POST" action="">
			<h1>LOGIN FORM</h1>
			<label>Email</label><br>
			<input type="email" name="Email" placeholder="Enter Email" style="height: 30px; width: 60%;" value="<?php echo $EmailValue; ?>"><br><br>
			<label>Password</label><br>
			<input type="password" name="Password" placeholder="Enter Password" style="height: 30px; width: 60%;" value="<?php echo $PasswordValue; ?>"><br><br>
			<input type="submit" name="login" value="Login" style="width: 30%;">
			
			
		</form>
	
	</fieldset>
	</center>

</body>
</html>
<?php
require 'connection.php';

if (isset($_POST['login'])) {
	$Email=$_POST['Email'];
	$Password=$_POST['Password'];
	$select="SELECT * FROM Administrators WHERE Email='$Email' and Password='$Password'";
	$query=mysqli_query($conn,$select);
	if (mysqli_num_rows($query)>0) {
		while ($row=mysqli_fetch_assoc($query)) {
			$ID=$row['ID'];
			$Username=$row['Username'];
			session_start();
			$_SESSION['ID']=$ID;
			$_SESSION['Username']=$Username;

			$userinf=[
				"Email"=>$row['Email'],
				"Password"=>$row['Password']
			];
			setcookie('user',serialize($userinf),time() + 3600, '/');
		}
		header("location:home.php");
	}
	else{
		echo "<script> alert('Invalid Email or Password'); </script>";
	}
}


?>