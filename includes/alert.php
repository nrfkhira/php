<?php
function alert($value) { 
$_SESSION['message'] = $value;
}
	if (isset($_SESSION['message'])) { ?>
	<div class="container mt-3">
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<?php echo $_SESSION['message']; ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	</div>
	<?php } 
	unset($_SESSION['message']);
	?>