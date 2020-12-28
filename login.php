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

 <!-- Login Form -->
   
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-4 mt-5 border p-5">
      			<h3 class="text-center text-success">
      			Log In Page
      		</h3>
	      		<form action="process.php" method="POST">
	      			<input type="hidden" name="email" value="<?php echo $email;?>">
	      			<input type="hidden" name="password" value="<?php echo $password;?>">
	      			<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter your email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="login">Log In</button>
					</div>
	      		</form>
      		</div>
      	</div>
      </div>
    



	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>   
    <!-- <script src="assets/js/custom.js" ></script>  -->
</body>

</html>