<?php include '../includes/config.php'; ?>   
<?php include '../includes/header.php'; ?>   
  
<?php  
  
 
 
//delete menu  
if (isset($_GET['id'])) {  
    if (!empty($_GET['id'])) {  
        $user_id = $_GET['id'];
 
            $user_id=$_GET['id'];

            $sql = "DELETE FROM carts WHERE user_id=$user_id";
            $result = mysqli_query($conn,$sql);

                     
                    if ($result) {  
                        alert("Thank you for purchasing");  
                        header("Location: ../cart.php");  
                        exit();  
                    } else {  
                        alert("Error purchasing the item.");  
                        header("Location: ../cart.php");  
                        exit();  
                    }  
                } else { 
                    alert("User ID is empty and is required");  
                    header("Location: ../cart.php");  
                    exit();  
                    } 
                } else { 
                    alert("Parameter GET ID is required");  
                    header("Location: ../cart.php");  
                    exit();  
                } 
  
?>