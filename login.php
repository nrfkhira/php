<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>



<?php
//check if email and password field post data exits
if (isset($_POST['email']) && isset($_POST['password'])) {
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
} else {
	alert("Email and Password is required");
	header("Location: /login.php");
    exit();
}

//perform sql login

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
	$row = mysqli_fetch_assoc($result);
	if ($row['role'] == 1) {
		$_SESSION['is_admin'] = True;
	} else {
		$_SESSION['is_admin'] = False;
}

	$_SESSION['id'] = $row['user_id'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['email'] = $row['email'];
	alert ("Welcome " . $_SESSION['username']);
	header("Location: /index.php");
	exit();
}	else {
	alert("email or password is incorrect");
	header("Location: /login.php");
	exit();
}

}
?>

<!-- main -->

<h1><center><i class="fas fa-pizza-slice" style="color: purple; font-size: 1.5em;"></i> Login </h1></center>

<section class="vh-100" style="background-color: #d3f7f6;">
<main class="flex-shrink-">
  	<div class="container"></div>
  	<div class="d-flex justify-content-center">
	<form class="col-4" method="POST">
		<div class="mb-2">
    		<label for="inputEmail4" class="form-label">Email</label>
    		<input type="email" name="email" class="form-control" id="inputEmail4">
  		</div>
  		<div class="mb-2">
    		<label for="inputPassword4" class="form-label">Password</label>
    		<input type="password" name="password" class="form-control" id="inputPassword4">
  		</div>
  		<div class="d-grid gap-2">
    		<button type="submit" class="btn btn-primary">Sign in</button>
  		</div>
		</div>
	</form>
</form>
	</div>
</main>
</section>


<?php include 'includes/footer.php'; ?>

	
</body>
</html>


