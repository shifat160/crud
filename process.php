<?php


session_start();

$name ="";
$email = "";
$update = false;
$id = 0;
$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));

if (isset($_POST['save'])){
	 $name = $_POST['name'];
	 $email = $_POST['email'];
	 $password = $_POST['password'];

	 
	 $mysqli->query("Insert Into idusers(name,email,password) Values('$name','$email','$password')") or 

	 die($mysqli->error); 
	 $_SESSION['message'] = "User has been added successfully";
	 $_SESSION['msg_type'] = "success";

	 header("location: index.php");
}
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM idusers WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "User has been deleted";
	$_SESSION['msg_type'] = "danger";

	header("location: index.php");
}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	
	$result = $mysqli->query("SELECT * FROM idusers WHERE id=$id") or die($mysqli->error());
	if (count($result)==1) {
		$row = $result->fetch_array();
		$name = $row['name'];
		$email = $row['email'];
		$password = $row['password'];
	}
}

if(isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$mysqli->query("UPDATE idusers SET name='$name',email='$email',password='$password' WHERE id=$id")  or die($mysqli->error());

	$_SESSION['message'] = "User info has been updated";
	$_SESSION['msg_type'] = "warning";
	header("location: index.php");
}


if(isset($_POST['login'])){

	$email = $_POST['email'];
	$password = $_POST['password'];

	 $sql = "SELECT id FROM idusers WHERE email = '$email' and password = '$password'";

	 $result = mysqli_query($mysqli,$sql);
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  $active = $row['active'];
	  $count = mysqli_num_rows($result);

	  if($count == 1) {
	          header("location: index.php");
	       }else {
	         echo "Your Login Name or Password is invalid";
	       }
	    }
?>