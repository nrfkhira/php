<?php include '../includes/config.php'; ?>
<?php include '../includes/header.php'; ?>
  

<?php
if (isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
  if (!empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {

     $new_password = $_POST['new_password'];
     $confirm_password = $_POST['confirm_password'];
     $user_id = $_SESSION['id'];

     if (strcmp($new_password, $confirm_password)) {
      alert("password not match");
      header("Location: /account/changepassword.php");
      exit();
     }

     //update information
     $sql = "UPDATE users SET password = '$confirm_password' WHERE user_id = $user_id";
     $result = mysqli_query($conn, $sql);

      if (mysqli_affected_rows($conn) == 1) {
        alert("Password update successfull");
        header("Location: /account/changepassword.php");
        exit();
      } else {
        alert("Error on updating password");
        header("Location: /account/changepassword.php");
        exit();
      } 
    }else {
     alert("All fields are required");
     header("Location: /account/changepassword.php");
     exit();
  }
}
?>
<!-- main -->
<h2><center><i class="fas fa-pizza-slice" style="color: purple; font-size: 1.5em;"></i> Change Password </h2></center>

<section class="vh-100" style="background-color: #d3f7f6;">
<main class="flex-shrink-0">
<div class="container">
  <div class="d-flex justify-content-center">
  <form class="col-6" method="POST">
      <div class="mb-3">
    		<label for="inputPassword4" class="form-label">New Password</label>
        <input type="password" name="new_password"  class="form-control" id="inputPassword4">
  		</div>
  		<div class="mb-3">
    		<label for="inputPassword4" class="form-label">Confirm Password</label>
    		<input type="password" name="confirm_password"  class="form-control" id="inputPassword4">
  		</div>
  		<div class="d-grid gap-2">
    		<button type="submit" class="btn btn-primary">Change Password</button>
  		</div>
	</form>
  </div>
</div>
</main>
</section>
<?php include '../includes/footer.php'; ?>

</body>
</html>


