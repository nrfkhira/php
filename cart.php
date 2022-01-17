<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<!-- main -->
<ul class="nav justify-content-center">
	<main>
		<h1><img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"> Cart </h1>
	</main>
</ul>
<section class="vh-100" style="background-color: #d3f7f6;">
<div class="container">

<?php
$user_id = $_SESSION['id'];

$sql = "SELECT carts.cart_id,carts.quantity,menu.title,menu.price FROM menu INNER JOIN carts WHERE menu.menu_id = carts.menu_id AND carts.user_id = $user_id";
$result = mysqli_query($conn, $sql);
$row_count_value = mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0) {
	
?>

<section class="pt-5 pb-5">
  <div class="container">
    <div class="row w-100">
        <div class="col-lg-12 col-md-12 col-12">
            <table id="shoppingCart" class="table table-condensed table-responsive">
                <thead>
                    <tr>
                        <th style="width:60%">Product</th>
                        <th style="width:12%">Price</th>
                        <th style="width:10%">Total</th>
                        <th style="width:20%">Quantity</th>
                        <th style="width:16%"></th>
                    </tr>
                </thead>

                <?php

	                while ($row = mysqli_fetch_assoc ($result)) { 

	                $menu_id = $row['menu_id'];
					$title = $row['title'];
					$price = $row['price']; 
					$cart_id = $row['cart_id']; 
					$quantity = $row['quantity'];

					$totalprice = $price * $quantity;
					$total = $total +$totalprice;
				?>

                <tbody>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-md-9 text-left mt-sm-2">
                                    <h5 class="card-title"><?php echo $title; ?></h5>

                                </div>
                            </div>
                        </td>
                        <td data-th="Price">Price: RM <?php echo $price; ?></td>
                        <td data-th="Price">RM <?php echo $totalprice; ?></td>
                        <td data-th="Quantity">

	                    <div class="d-flex">
	                    	<a href="/admin/delcart.php?action=minus&id=<?php echo $cart_id; ?>" class="btn btn-link px-2 me-2">
	                        	<i class="fas fa-minus"></i>
	                        </a>
	                       	<input id="form1" type="number" class="form-control form-control-sm text-center" min="1" value="<?php echo $quantity; ?>" style="width: 60px;">
	                    	<a href="/admin/delcart.php?action=add&id=<?php echo $cart_id; ?>" class="btn btn-link px-2 me-2">
	                        	<i class="fas fa-plus"></i>
	                      	</a>
	                    </div>
	               		</td>
                        <td class="actions" data-th="">
                            <div class="text-right">
                                <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                    <a href="/admin/delcart.php?action=delete&id=<?php echo $cart_id; ?>" class="fas fa-trash"></a>
                                </button>
                            </div>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                </tbody>
            </table>
            <div class="float-right text-right">
                <h4>Total Price: RM <?php echo $total;?></h4>
            </div>
        </div>
    <tr>
    <div class="row mt-4 d-flex align-items-center">
        <div class="col-sm-6 order-md-2 text-right">
            <td><a href="/admin/pay.php?id=<?php echo $user_id;?>" class="btn btn-warning mb-4 btn-lg pl-5 pr-5">Checkout</a></td>
	       <a href=" /index.php?" class="btn btn-info mb-4 btn-lg pl-5 pr-5"></i> Continue Shopping</a>
	    </tr>
        </div>
    </div>
</section>

<?php } else { ?>

   
                    <div class="col-sm-12 empty-cart-cls text-center"> 
                        <h3><strong>Your Cart is Empty</strong></h3>
                        <h4>Add something to make me happy :)</h4> <a href="/index.php?" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }


?> 
</section>

<?php include 'includes/footer.php'; ?>
</body>
</html>

