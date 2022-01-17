<?php include '../includes/config.php'; ?>
<?php include '../includes/header.php'; ?>

<?php

//delete menu
if (isset($_GET['id'])) {
	if (!empty($_GET['id'])) {
		$menu_id = $_GET['id'];

	$sql = "DELETE FROM carts WHERE cart_id=$cart_id";
	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) == 1) {
		alert("Successful delete");
		header("Location: /admin/viewmenu.php");
		exit();
	}else {
		alert("Error on deleting menu");
		header("Location: /admin/viewmenu.php");
		exit();
		}
	}else {
		alert("menu id is empty and is required");
		header("Location: /admin/viewmenu.php");
		exit();
		}
	} else {
	alert("parameter GET id is required");
	header("Location: /admin/viewmenu.php");
	exit();
}
?>