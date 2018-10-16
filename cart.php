<?php
session_start();
require "app/products.php";
$product = new products();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="public/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/login.css">
    <link rel="stylesheet" href="public/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Giỏ hàng</title>
</head>
<body>
    <!-- Header -->
    <header>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Navbar -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Trang chủ</a>
            </div>
            
            <!-- Dropdown Brands -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm</a>
                        <ul class="dropdown-menu">
                            <li><a href="products.php?brand=Ogival">Ogival</a></li>
                            <li><a href="products.php?brand=Mido">Mido</a></li>
                            <li><a href="products.php?brand=Bovet">Bovet</a></li>
                            <li><a href="products.php?brand=Cartier">Cartier</a></li>
                            <li><a href="products.php?brand=Montblanc">Montblanc</a></li>

                        </ul>
                    </li>
                    <li><a href="contact.php">Liên hệ</a></li>

                </ul>
            <!-- Form tim kiem -->
            <form action="check.php" class="navbar-form navbar-left" role="search" method="GET">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Nhập từ khoá..." name="key">
                </div>
                <button type="submit" class="btn btn-default">Tìm</button>
            </form>

                <ul class="nav navbar-nav navbar-right">
                    <?php
                     if (isset($_SESSION['user']))
                     {
                         if ($_SESSION['user'] == 'admin')
                             echo '<li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin</a>
                             <ul class="dropdown-menu">
                                <li><a href="admin.php">Quản lý</a></li>
                                <li><a href="addnewproduct.php">Thêm sản phẩm</a></li>
                             </ul>
                         </li>';
                     
                         else
                             echo '<li><a href="cart.php">Giỏ hàng</a></li>';
                     }
                     else
                             echo '<li><a href="cart.php">Giỏ hàng</a></li>';
                             
                     if(isset($_SESSION['user'])){
                         $logout = '<li><a href="logout.php">Đăng xuất</a></li>';
                         echo $logout;
                     }
                     else{
                         $login = '<li><a href="login.php">Đăng nhập</a></li>';
                         echo $login;
                     }
                     ?>
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
        
    </header>
    <!-- Content -->
    <div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Sản phẩm</th>
							<th style="width:10%">Giá</th>
							<th style="width:8%">Số Lượng</th>
							<th style="width:22%" class="text-center">Tổng giá</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
                        <?php
                        $total = 0;
                        if (!isset($_SESSION['cart']))
                        {
                            echo '<h1 class="title">Giỏ hàng rỗng</h1>';
                        }
                        else
                        {
                           echo '<h1 class="title">Giỏ hàng</h1>';
                        

                        foreach ($_SESSION['cart'] as $key=>$value) {
                            $data = $product->getProduct($key);
                        ?>
						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><a href="details.php?id=<?php echo $key?>"><img src="public/img/<?php echo $data[0]['brand'] .'/'. $data[0]['img'] ?>" height="50px" class="img-responsive"/></a></div>
									<div class="col-sm-10">
                                    <a href="details.php?id=<?php echo $key?>"><h4 class="nomargin"><?php echo $data[0]['name'] ?></h4></a>
									</div>
								</div>
							</td>
							<td data-th="Price"><?php echo $data[0]['price']?></td>
							<td data-th="Quantity">
								<?php echo $value ?>
							</td>
							<td data-th="Subtotal" class="text-center"><?php echo $data[0]['price']*$value ?></td>
							<td class="actions" data-th="">
								<a href="delcart.php?id=<?php echo $data[0]['id'] ?>"><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a>				
							</td>
						</tr>
                        <?php 
                            $total +=  $data[0]['price']*$value;
                        }
                    ?>
					</tbody>
					<tfoot>
						<tr>
							<td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Tổng: <?php echo $total?></strong></td>
							<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
                    <?php } ?>
	</table>
</div>
    </div>

    <!-- Footer -->
    <script src="public/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>