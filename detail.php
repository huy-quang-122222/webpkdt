<?php
include 'classes/product.php';
include_once 'classes/cart.php';

$cart = new cart();
$totalQty = $cart->getTotalQtyByUserId();

$product = new product();
$result = $product->getProductbyId($_GET['id']);
if (!$result) {
    echo 'Không tìm thấy sản phẩm!';
    die();
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
    $('.image-product img').click(function() {
        var imgSrc = $(this).attr('data-src');
        window.open(imgSrc);
    });
    });
    </script>
    <title><?= $result['name'] ?></title>
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
            <li><a href="login.php" id="signin">Đăng nhập</a></li>
            <li><a href="order.php" id="order">Đơn hàng</a></li>
            <li>
                <a href="checkout.php">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="sumItem">
                        <?= ($totalQty['total']) ? $totalQty['total'] : "0" ?>
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
        <h1>Sản phẩm</h1>
        <hr color="black">    
    </div>
    <div class="container-single9">
        <div class="image-product">
            
            <?php
                $image_names = $result['image'] ;
                $image_urls = explode(',', $image_names);

                            foreach ($image_urls as $image_url) {
                                $image_url = trim($image_url);
                                $image_path = "admin/uploads/" . $image_url;
                                // Hiển thị ảnh bằng thẻ HTML <img>
                                // echo "<img src='$image_path' width='700' height='300' style='margin-right: 10px'>";
                                echo "<img src='$image_path' width='700' height='500' style='margin-right: 10px' data-src='admin/uploads/$image_url'>";

                            }
            ?>
        </div>
        <div class="info">
            <div class="name">
                <h2><?= $result['name'] ?></h2>
            </div>
            <div class="price-single">
                Giá bán: <b><?= number_format($result['promotionPrice'], 0, '', ',') ?>VND</b>
            </div>
            <?php
            if ($result['promotionPrice'] < $result['originalPrice']) { ?>
                <div>
                    Gía gốc: <del><?= number_format($result['originalPrice'], 0, '', ',') ?>VND</del>
                </div>
            <?php }
            ?>
            <div class="des">
                <p>Đã bán: <?= $result['soldCount'] ?></p>
                <p>Mô tả:</p>
                <?= $result['des'] ?>
            </div>
            <div class="add-cart-singlee">
                <a href="add_cart.php?id=<?= $result['id'] ?>">Thêm vào giỏ</a>
            </div>
        </div>
    </div>
    
    <footer class="foot">
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