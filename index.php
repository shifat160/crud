<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login and Registration</title>
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
	   
<body>

	<?php require_once 'process.php';?>

	<?php
	if(isset($_SESSION['message'])): ?>

	<div class="alert alert-<?=$_SESSION['msg_type'] ?>">
		
		<?php
		echo $_SESSION['message'];
		unset($_SESSION['message']);

		?>
	</div>
	<?php endif ?>

<div class="container">
	<a href="login.php>" class="btn btn-warning float-right mb-5">Log Out</a>
	<?php 
		$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
		$result = $mysqli->query("SELECT * FROM idusers") or die(mysqli_error($mysqli));

	?>
	<div class="row justify-content-center">
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<?php 

			while($row = $result->fetch_assoc()) : ?>

			<tr>
				<td>
					<?php echo $row['name'];?>
				</td>
				<td>
					<?php echo $row['email'];?>
				</td>
				<td>
					<a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
					<a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			<?php endwhile; ?>
		</table>
			
		</div>
	</div>

	<div class="row justify-content-center">
		<form action="process.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your name">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter your email">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<?php 
				if($update==true):
				?>
				<button type="submit" class="btn btn-success" name="update">Update</button>
				<?php else: ?>
					<button type="submit" class="btn btn-primary" name="save">Save</button>
				<?php endif; ?>
			</div>	
		</form>
	</div>
</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>   
    <!-- <script src="assets/js/custom.js" ></script>  -->
</body>

</html>