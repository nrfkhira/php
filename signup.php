<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<?php

// check if post request contains our post data
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['contact_number']) && isset($_POST['address'])) {

  // check if post data is not empty
  if (empty($_POST['username'])) {
    alert("username is required");
    header('Location: /signup.php');
    exit();
  } else if (empty($_POST['email'])) {
    alert("email is required");
    header('Location: /signup.php');
    exit();
  } else if (empty($_POST['password'])) {
    alert("password is required");
    header('Location: /signup.php'); 
    exit();
  } else if (empty($_POST['contact_number'])) {
    alert("contact number is required");
    header('Location: /signup.php');
    exit();
  } else if (empty($_POST['address'])) {
    alert("address is required");
    header('Location: /signup.php');
    exit();
  }

//assigning variable
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $contact_number = $_POST['contact_number'];
  $address = $_POST['address'];


//check if contact number input is a numberical
  if (!ctype_digit($contact_number)) {
    alert("contact number must be a number");
    header('Location: /signup.php');
    exit();
  }

//sql query - insert dlm table
  $sql = "INSERT INTO users (username, email, password, contact_number, address, role) VALUES ('$username', '$email','$password', $contact_number, '$address', 0)";

  $result = mysqli_query($conn, $sql) or trigger_error("Query failed! SQL: $sql - Error: ". mysqli_error($conn),E_USER_ERROR);
  if ($result) {
    alert ("Signup successfull. please login");
  } else {
    alert ("There was an error during sign up");
  }

} 

?>

<!-- main -->
<h1><center><i class="fas fa-pizza-slice" style="color: purple; font-size: 1.5em;"></i> SignUp </h1></center>

<section class="vh-100" style="background-color: #d3f7f6;">
<main class="flex-shrink-0">
  <div class="container">
  <div class="d-flex justify-content-center">
    <form class="col-5" method="POST">
      <div class="mb-3">
        <label for="inputUsername" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="inputUsername">
      </div>
      <div class="mb-3">
        <label for="inputEmail" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="inputPassword" class="form-label">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" aria-describedby="passwordHelpBlock">
        <div id="passwordHelpBlock" class="form-text">
          Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
        </div>
      </div>
      <div class="mb-3">
        <label for="inputContactNumber" class="form-label">Contact Number</label>
        <input type="tel" name="contact_number" class="form-control" id="inputContactNumber">
      </div>
      <div class="mb-3">
        <label for="inputAddress" class="form-label">Address</label>
        <textarea class="form-control" name="address" id="inputAddress" rows="3"></textarea>
      </div>
      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-outline-primary">Sign up</button>
      </div>
    </form>
  </div>
  </div>
</main>
</section>

<?php include 'includes/footer.php'; ?>
</body>
</html>
