<?php include '../includes/config.php'; ?>
<?php include '../includes/header.php'; ?>

<!-- main -->
<h1><center><i class="fas fa-pizza-slice" style="color: purple; font-size: 1.5em;"></i> All Menu </h1></center>

<section class="vh-100" style="background-color: #d3f7f6;">
<main class="flex-shrink-0">
  <div class="container">
	<div class="row">

<?php

$sql = "SELECT * FROM menu";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {


	$menu_id = $row['menu_id'];
	$title = $row['title'];
	$description = $row['description'];
	$price = $row['price']; ?>

<!-- col column mt margin top -->
  	<div class="col-4 mt-5">
  		<div class="card">
  			<div class="card-body">
  				<h5 class="card-title"><?php echo $title; ?></h5>
  				<h6 class="card-subtitle mb-2 text-muted">Price:RM<?php echo $price; ?></h6>
  				<p class="card-text"><?php echo $description; ?></p>
  				<a href="/admin/editmenu.php?id=<?php echo $menu_id; ?>" class="btn btn-info">Edit</a>
  				<a href="/admin/deletemenu.php?id=<?php echo $menu_id; ?>" class="btn btn-danger">Delete</a>
  			</div>
  		</div>
  	</div>	
<?php

	}
} else {
	echo "No menu";
}

?> 	
</div>
</main>
</section>
<?php include '../includes/footer.php'; ?>

	
</body>
</html>

