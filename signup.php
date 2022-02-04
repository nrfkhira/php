

<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<?php

// check if post request contains our post data
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {

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
  } 

//assigning variable
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];




//check if email exist
  $select = mysqli_query($conn, "SELECT * FROM user WHERE email = '".$_POST['email']."'");
    if (mysqli_num_rows($select)) {
      alert ("This email is already being used");
      header('Location: /signup.php');
      exit();
    } 



//sql query - insert dlm table
  $sql = "INSERT INTO user (username, email, password, role) VALUES ('$username', '$email','$password', 0)";

  $result = mysqli_query($conn, $sql) or trigger_error("Query failed! SQL: $sql - Error: ". mysqli_error($conn),E_USER_ERROR);
  if ($result) {
    alert ("Signup successfull. please login");
    header('Location: /login.php');
  } else {
    alert ("There was an error during sign up");
    header('Location: /signup.php');
  }

} 

?>

<!-- main -->

  


      
  <section class="vh-100" style="background-color: #470ab1;">
    <div class="grandParentContaniner">
      <div class="parentContainer">
        <form method="POST">
            <div class="form-group">
            <div class="mb-3" >
              <h1><center><i class="fas fa-user-plus" style="color: white; font-size: 1.5em;"></i><i style="color: white"> SignUp </h1></center>

          <div class="mb-3">
              <label for="inputUsername" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="inputUsername">
            </div>

          <div class="mb-3">
            <label for="InputEmail4">Email address</label>
            <input type="email" name="email" class="form-control" id="InputEmail4">
            </div>

          <div class="mb-3">
            <label for="InputPassword4">Password</label>
            <input type="password"  name="password" class="form-control" id="InputPassword4">
          </div>
          <button type="submit" class="btn btn-primary">Sign Up</button>

        </form>
      </div>
    </div>
  </section>


<?php include 'includes/footer.php'; ?>
</body>
</html>
