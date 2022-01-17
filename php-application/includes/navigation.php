<!-- header -->
<div>
  <nav class="navbar navbar-dark bg-dark">
    <!-- Navbar content -->
  </nav>

  <nav class="navbar navbar-dark bg-primary">
    <!-- Navbar content -->
  </nav>

  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <!-- Navbar content -->
  </nav>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <ul class="nav justify-content-center">
          <li class="nav-item">
           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-pizza-slice" style="color: purple; font-size: 1.5em;"></i> PizzaShop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
          </li>

        <?php
          if ($_SESSION['is_admin']) { ?>
          <li class="nav-item">
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/admin/viewmenu.php">View Menu</a></li>
            <li><a class="dropdown-item" href="/admin/addmenu.php">Add Menu</a></li>
          </ul>
        </li>
        <?php } ?>

        <?php
          if (isset($_SESSION['username'])) { ?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            My account
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/account/profile.php">Edit Profile</a></li>
            <li><a class="dropdown-item" href="/account/changepassword.php">Change Password</a></li>

          </ul>
        </li>
      
          
          <li class="nav-item" style="margin-left: 750px">

           <a class="nav-link" href="/cart.php"> <i class="fa fa-shopping-cart"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout.php">Logout</a>
          </li>   
        <?php } else { ?>
          
          <li class="nav-item">
            <a class="nav-link" href="/signup.php">Signup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login.php">Login</a>
          </li>
        <?php } ?>
      </ul>
    </nav>
  
	
