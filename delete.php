<?php
require 'connection.php';
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$delete="DELETE FROM add_student WHERE id=$id";
	$d=mysqli_query($conn,$delete);
}
header("location:View_student.php");

?>