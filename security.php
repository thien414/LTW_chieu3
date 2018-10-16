<?php 
    require "app/users.php";
    session_start();
    $users = new users();
    $error = "";
    if(isset($_POST['password'])){
        $password = $_POST['password'];
        $passwordtow = $_POST['passwordtow'];
            if($password == $passwordtow){
                $users->edituser($_SESSION['name'], $password);
                unset($_SESSION['name']);
                header('location:login.php');
            }
            else{
                $error = "Mật khẩu không trùng khớp";
            }
        
    }

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
    <title>Mật khẩu mới</title>
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
                                 <li><a href="products.php?brand=Apple">Apple</a></li>
                                 <li><a href="products.php?brand=Samsung">Samsung</a></li>
                                 <li><a href="products.php?brand=Xiaomi">Xiaomi</a></li>
                                 <li><a href="products.php?brand=Oppo">Oppo</a></li>
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
        <div>
            <h1 class="title">Mật khẩu mới</h1>
        </div>
     
        <div class = "login">
             <form action="security.php" method="POST">
                <input type="password" name="password" class="form-control login-form" placeholder="Mật khẩu mới" required>
                <input type="password" name="passwordtow" class="form-control login-form" placeholder="Nhập lại mật khẩu" required>
                <span class="error login-form"><?php echo $error ?></span>
        <button class="btn btn-lg btn-primary btn-block login-form" type="submit">Duyệt</button>
        <a href="login.php" style=" direction: none;">Hủy</a>
      </form>
        </div>
    </div> <!-- /container -->

    <script src="public/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
