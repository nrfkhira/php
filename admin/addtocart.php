<?php include '../includes/config.php'; ?>
<?php include '../includes/header.php'; ?>

  
<?php


if (isset($_GET['id'])) {
	if (!empty($_GET['id'])) {
		$menu_id = $_GET['id'];
        $user_id = $_SESSION['id'];


//cheking utk check menuid dh ada belum dlm cart and user i
        //klu ade = update table
        //klu xde = insert into


		//check if the menu already added to cart by the user
		$sql2 = "SELECT * FROM carts WHERE menu_id = $menu_id AND user_id = $user_id"; 
		$result2 = mysqli_query($conn, $sql2);

		if (mysqli_num_rows($result2) > 0) {
			$row = mysqli_fetch_assoc ($result2); 
			$quantity = $row['quantity'];
			$cart_id = $row['cart_id']; 

			$quantity = $quantity + 1;
							

			//update quantity
			$sql3 = "UPDATE carts SET quantity = $quantity WHERE cart_id = $cart_id"; 
			$result3 = mysqli_query($conn, $sql3); 
			
			if ($result3) { 
				alert("Cart update."); 
				header("Location: /cart.php"); 
				exit(); 
			} else { 
				alert($quantity); 
				header("Location: ../login.php"); 
				exit(); 
				}
							
			} else {

				$sql = "INSERT INTO carts ( menu_id, quantity, user_id ) VALUES ( '$menu_id', 1, '$user_id' )"; 
				$result = mysqli_query($conn, $sql); 
								        
				if ($result) { 
					alert("Success add to cart."); 
					header("Location: /cart.php"); 
					exit(); 
				} else { 
					alert("Error!. Login first"); 
					header("Location: /login.php"); 
					exit(); 
				}
			}
			}else { 
				alert("Error! something wrong with database query."); 
				header("Location: /cart.php"); 
				exit(); 
			} 

		} else { 
			alert("Error! Parameter GET ID is required."); 
			header("Location: ../index.php"); 
			exit(); 
					
		}
?>
