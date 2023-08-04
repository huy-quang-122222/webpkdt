<?php
include 'classes/user.php';
$user = new user();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $login_check = $user->login($email, $password);
   
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style12.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Đăng nhập</title>
   
</head>

<body>
    <a href="https://zalo.me/0912350096" class="lienhe-button" target="_blank" rel="noopener"> <img src="images/zalo.png" alt="img"></a> 
    <a href="tel:0912350096" target="_blank" rel="nofollow" class="lienhe-call">
    <img src="images/call.jpg" alt="img">
    </a>
    
    <nav>
            <label class="logo1"> 
                <img src="images/huy_SHOP.png" alt="Checkbox icon" height="80px" >
        
            </label>
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="productList.php">Sản phẩm</a></li>
            <li><a href="register.php" id="signup">Đăng ký</a></li>
            <li><a href="login.php" id="signin" class="active">Đăng nhập</a></li>
            <li><a href="order.php" id="order">Đơn hàng</a></li>
            <li>
                <a href="checkout.php">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="sumItem">
                        0
                    </span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- <div class="slider">
                <div class="slides">
                    <img src="images/banner1.jpg">
                    <img src="images/bn2.jpg">
                    <img src="images/ban3.jpg">
                </div>
                <div class="dots"></div>
                <button class="prev">&#10094;</button>
                <button class="next">&#10095;</button>
         </div> -->
    <div class="featuredProducts3">
        <h1>Đăng nhập</h1>
    </div>
    <div class="container-single">
        <div class="login">
            <form action="login.php" method="post" class="form-login">
                <label for="email">Số điện thoại</label>
                <input type="text" id="email" name="email" placeholder="Số điện thoại..." required>

                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Mật khẩu..." required>
                <p style="color: red;"><?= !empty($login_check) ? $login_check : '' ?></p>

                <input type="submit" value="Đăng nhập">
            </form>
        </div>
    </div>
    </div>
    <footer>
        <div class="social">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
        <ul class="list">
            <li>
                <a href="./">Trang Chủ</a>
            </li>
            <li>
                <a href="productList.php">Sản Phẩm</a>
            </li>
        </ul>
        <p class="copyright">Zang_Ha_Ra @ 2023</p>
    </footer>
</body>

</html>