<?php include '../includes/config.php'; ?>
<?php include '../includes/header.php'; ?>

<?php

//delete menu
if (isset($_GET['id'])) {
	if (!empty($_GET['id'])) {
		$cart_id = $_GET['id'];
		if (isset($_GET['action'])) { 
    		if (!empty($_GET['action'])) { 
 				
 				$action = $_GET['action']; 
                $sql2 = "SELECT * FROM carts WHERE cart_id=$cart_id";  
                $result2 = mysqli_query($conn, $sql2); 
                $row = mysqli_fetch_assoc($result2); 
                $quan = $row['quantity']; 
 
                if($action == "add"){ 
 
                    $quan = $quan + 1; 
 
                } else if($action == "minus"){ 
 
                    $quan = $quan - 1; 
 
                } else if($action == "delete"){ 
                    $sql = "DELETE FROM carts WHERE cart_id=$cart_id";  
                    $result = mysqli_query($conn, $sql);  
                     
                    if ($result) {  
                        alert("Successfully delete the item.");  
                        header("Location: ../cart.php");  
                        exit();  
                    } else {  
                        alert("Error deleting the item.");  
                        header("Location: ../cart.php");  
                        exit();  
                    }  
                } else { 
                    alert("Invalid Action");  
                    header("Location: ../cart.php");  
                    exit();  
                } 
 
                if($quan == 0){ 
                    $chquan = "DELETE FROM carts WHERE cart_id=$cart_id";  
                    $chquanres = mysqli_query($conn, $chquan); 
                    alert("Item Removed"); 
                    header('Location: ../cart.php'); 
                    exit(); 
                }else{ 
                    $chquan = "UPDATE carts SET quantity = $quan WHERE cart_id = $cart_id";  
                    $chquanres = mysqli_query($conn, $chquan);  
                } 
 
                if($chquanres){ 
                    alert("Quantitiy changed"); 
                    header('Location: ../cart.php'); 
                    exit(); 
                } else { 
                    alert("ERROR! there is an error during adding quantity"); 
                    header('Location: ../cart.php'); 
                    exit(); 
                } 
            } else { 
                alert("ERROR! Action is empty"); 
                header('Location: ../cart.php'); 
                exit(); 
            } 
        } else { 
            alert("ERROR! Parameter GET Action is required."); 
            header('Location: ../cart.php'); 
            exit(); 
        } 
    } else {  
        alert("ERROR! Cart ID is empty and is required.");  
        header("Location: ../cart.php");  
        exit();  
    }  
} else {  
    alert("ERROR! Parameter GET ID is required.");  
    header("Location: ../cart.php");  
    exit();  
}  
  
?>


</body>
</html>