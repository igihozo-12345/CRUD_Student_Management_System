<?php
require 'connection.php';
session_start();
if (isset($_SESSION['Username'])) {
	$Username=$_SESSION['Username'];
}
else{
	header("location:index.php");
}
if (isset($_POST['Add'])) {
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$department=$_POST['department'];

	$insert="INSERT INTO add_student(firstname,lastname,dob,gender,address,department)VALUES('$firstname','$lastname','$dob','$gender','$address','$department')";
	$query=mysqli_query($conn,$insert);
	if ($query) {
		echo "<script> alert('Add student successful') </script>";
		header("location:View_student.php");
	}
	else{
		echo "<script> alert('Add student failed') </script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<style>
		body {
			font-family: 'Roboto', sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f4f4f4;
		}
		.header {
			width: 100%;
			height: 80px;
			background-color: #0073e6;
			color: white;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.nav {
			width: 20%;
			background-color: #1e90ff;
			color: white;
			padding: 20px;
			box-sizing: border-box;
			float: left;
		}
		.nav ul {
			list-style-type: none;
			padding: 0;
		}
		.nav ul li {
			padding: 10px 0;
		}
		.nav ul li a {
			color: white;
			text-decoration: none;
			display: block;
			transition: background-color 0.3s;
		}
		.nav ul li a:hover {
			background-color: #0073e6;
			padding-left: 10px;
		}
		.nav2 {
			width: 74%;
			background-color: white;
			padding: 20px;
			box-sizing: border-box;
			float: left;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		.body {
			display: flex;
			width: 100%;
			box-sizing: border-box;
			margin: 0 auto;
			padding: 20px;
		}
		.footer {
			width: 100%;
			height: 80px;
			background-color: #004080;
			color: white;
			display: flex;
			align-items: center;
			justify-content: center;
			position: relative;
			clear: both;
		}
		@media (max-width: 768px) {
			.nav, .nav2 {
				width: 100%;
				float: none;
				height: auto;
			}
			.body {
				flex-direction: column;
				padding: 0;
			}
		}
	</style>
</head>
<body>
	<div class="header">
		<center><h1>Welcome to student Management System
        <?php
         echo $Username;
        ?>
           
  		</h1></center>
	</div>
	
	<div class="body">
	<div class="nav">
		<!-- <h2>Navigation Menu</h2> -->
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="Add_Student.php">Add Student</a></li>
				<li><a href="View_student.php">View Student</a></li>
					<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<div class="nav2">
		<center>
			<form method="POST" action="Add_Student.php">
			<h2>Add Student Information</h2>
			<input type="text" name="firstname" placeholder="Enter FirstName" required><br><br>
			 <input type="text" name="lastname" placeholder="Enter LastName" required><br><br>
             <input type="date" name="dob" placeholder="Enter date of birth" required><br><br>
             <input type="radio" name="gender" value="Male">M
             <input type="radio" name="gender" value="Female">F<br><br>
             <input type="text" name="address" placeholder="Enter Address" required><br><br>
             <input type="text" name="department" placeholder="Enter Department" required><br><br>
             <input type="submit" name="Add" value="Add Student">
             </form>


		</center>
	</div>
	</div>
	<div class="footer">
		<center>
			<h1>&copy; IGIHOZO Racheal</h1>
		</center>
	</div>


</body>
</html>