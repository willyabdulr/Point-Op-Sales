<nav class='navbar navbar-inverse'>
  <div class='container-fluid'>
    
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>
        <img alt='Brand' src='WebsiteImage/jl.jfif'>
      </a>
    </div>

    <ul class='nav navbar-nav'>
      <li><a href='index.php'><span class='glyphicon glyphicon-credit-card' aria-hidden='true'></span> POS</a></li>
      <li><a href='product.php'><span class='glyphicon glyphicon-briefcase' aria-hidden='true'></span> Product</a></li>
      <li class='dropdown'>
        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> People<span class='caret'></span></a>
        <ul class='dropdown-menu'>
          <li><a href='customer.php'>Customer</a></li>
          <li><a href='supplier.php'>Supplier</a></li>
        </ul>
      </li>
      <li><a href='sales.php'><span class='glyphicon glyphicon-usd' aria-hidden='true'></span> Sales</a></li>
      <li><a href='category.php'><span class='glyphicon glyphicon-bookmark' aria-hidden='true'></span> Category</a></li>
      <?php 

        if($_SESSION['role'] == 'admin'){
          echo "<li><a href='report.php'><span class='glyphicon glyphicon-stats' aria-hidden='true'></span> Report</a></li>
                <li><a href='addUser.php'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> Add User</a></li>";
        }

      ?>
      
    </ul>

    <ul class='nav navbar-nav navbar-right'>
      <li><a href='javascript:void(0)'>Welcome <?php echo $_SESSION['name']; ?></a></li>
      <li><a href='logoutScript.php'>Logout</a></li>
    </ul>
    
  </div><!-- /.container-fluid -->
</nav>