<?php include '../includes/config.php'; ?>
<?php include '../includes/header.php'; ?>

<?php

// check if post request contains our post data
if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['price'])) {
  if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['price'])) {


  //assigning variable
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

  //check if price is numberical 
  if (!ctype_digit($price)) {
    alert("price must be a number");
    header('Location: /admin/addmenu.php');
    exit();
  }


//sql query - add menu dlm table
//single '' utk string/varchar
  $sql = "INSERT INTO menu (title, description, price) VALUES ('$title', '$description', $price)";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    alert ("Menu has been added");
    header('Location: /admin/viewmenu.php');
    exit();
  } else {
    alert ("There was an error during add new menu");
    header('Location: /admin/viewmenu.php');
    exit();
  }

  } else {
    alert("All field are required");
    header('Location: /admin/addmenu.php');
    exit();
  }
}
?>

<!-- main -->
<h1><center><i class="fas fa-pizza-slice" style="color: purple; font-size: 1.5em;"></i> Add Menu </h1></center>

<section class="vh-100" style="background-color: #d3f7f6;">
<main class="flex-shrink-0">
  <div class="container">
	<div class="d-flex justify-content-center">
	<form class="col-6" method="POST">
		<div class="mb-3">
	    	<label for="inputTitle" class="form-label">Menu Name</label>
	    	<input type="text" name="title" class="form-control" id="inputTitle">
  		</div>
	  	<div class="mb-3">
	    	<label for="inputDescription" class="form-label">Menu Description</label>
	    	 <textarea class="form-control" name="description" id="inputAddress" rows="3"></textarea>
	  	</div>
	  	<div class="mb-3">
	    	<label for="inputPrice" class="form-label">Price</label>
	    	<input type="number" name="price" class="form-control" id="inputTitle">
	  	</div>
	  <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Add Menu</button>
      </div>
	</form>
	</div>
	</div>
</main>
</section>
<?php include '../includes/footer.php'; ?>

</body>
</html>