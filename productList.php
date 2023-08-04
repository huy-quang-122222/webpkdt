<?php
include_once 'lib/session.php';
include_once 'classes/product.php';
include_once 'classes/categories.php';
include_once 'classes/cart.php';

$cart = new cart();
$totalQty = $cart->getTotalQtyByUserId();

$product = new product();
$list = $product->getProductsByCateId((isset($_GET['page']) ? $_GET['page'] : 1), (isset($_GET['cateId']) ? $_GET['cateId'] : 2));
$pageCount = $product->getCountPagingClient((isset($_GET['cateId']) ? $_GET['cateId'] : 2));

$categories = new categories();
$categoriesList = $categories->getAll();
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
    <title>Danh sách sản phẩm</title>
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
            <li><a href="productList.php" class="active">Sản phẩm</a></li>
            <?php
            if (isset($_SESSION['user']) && $_SESSION['user']) { ?>
                <li><a href="logout.php" id="signin">Đăng xuất</a></li>
            <?php } else { ?>
                <li><a href="register.php" id="signup">Đăng ký</a></li>
                <li><a href="login.php" id="signin">Đăng nhập</a></li>
            <?php } ?>
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
        <h1>Danh sách sản phẩm</h1>
    </div>
   
    </form>
    <div class="category">
      <p>  Danh mục: </p> <select onchange="location = this.value;">
      <option value="#">chọn danh mục</option>
            <?php
            foreach ($categoriesList as $key => $value) {
                if ($value['id'] == $_GET['cateId']) { ?>
                    <option selected value="productList.php?cateId=<?= $value['id'] ?>"><?= $value['name'] ?></option>
                <?php } else { ?>
                    <option value="productList.php?cateId=<?= $value['id'] ?>"><?= $value['name'] ?></option>
                <?php } ?>
            <?php }
            ?>
        </select>
    </div>
    <div class="container">
        <?php if ($list) {
            foreach ($list as $key => $value) { ?>
                <div class="card">
                    <div class="imgBx">
                       <!-- // <a href="detail.php?id=<?= $value['id'] ?>"><img src="admin/uploads/<?= $value['image'] ?>" alt=""></a> -->
                        <?php
                            $image_names = $value['image']; // $image_names là chuỗi chứa các tên tệp ảnh phân tách bằng dấu phẩy

                            $image_urls = explode(',', $image_names);

                            foreach ($image_urls as $image_url) {
                                $image_url = trim($image_url);
                                $image_path = "admin/uploads/" . $image_url;
                                // Hiển thị ảnh bằng thẻ HTML <img>
                               echo "<a href='detail.php?id=" . $value['id'] . "'><img src='$image_path' width='100' height='100' style='margin-right: 3px'></a>";


                            }

                           ?>
                    
                    </div>
                    <div class="content">
                        <div class="productName">
                            <a href="detail.php?id=<?= $value['id'] ?>">
                                <h3><?= $value['name'] ?></h3>
                            </a>
                        </div>
                        <div>
                            Đã bán: <?= $value['soldCount'] ?>
                        </div>
                        <div>
                            Còn hàng: <?= $value['qty'] ?>
                        </div>
                        <div class="original-price">
                            <?php
                            if ($value['promotionPrice'] < $value['originalPrice']) { ?>
                                Giá gốc: <del><?= number_format($value['originalPrice'], 0, '', ',') ?>VND</del>
                            <?php } else { ?>
                                <p>.</p>
                            <?php } ?>
                        </div>
                        <div class="price">
                            Giá bán: <?= number_format($value['promotionPrice'], 0, '', ',') ?>VND
                        </div>
                        <!-- <div class="rating">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div> -->
                        <div class="action">
                            <a class="add-cart" href="add_cart.php?id=<?= $value['id'] ?>">Thêm vào giỏ</a>
                            <a class="detail" href="detail.php?id=<?= $value['id'] ?>">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php }
        } else { ?>
            <h3>Không có sản phẩm nào...</h3>
        <?php  }
        ?>
    </div>
    <div class="pagination">
        <a href="productList.php?page=<?= (isset($_GET['page'])) ? (($_GET['page'] <= 1) ? 1 : $_GET['page'] - 1) : 1 ?>&cateId=<?= (isset($_GET['cateId'])) ? $_GET['cateId'] : 2 ?>">&laquo;</a>
        <?php
        for ($i = 1; $i <= $pageCount; $i++) {
            if (isset($_GET['page'])) {
                if ($i == $_GET['page']) { ?>
                    <a class="active" href="productList.php?page=<?= $i ?>&cateId=<?= (isset($_GET['cateId'])) ? $_GET['cateId'] : 2 ?>"><?= $i ?></a>
                <?php } else { ?>
                    <a href="productList.php?page=<?= $i ?>&cateId=<?= (isset($_GET['cateId'])) ? $_GET['cateId'] : 2 ?>"><?= $i ?></a>
                <?php  }
            } else { ?>
                <a href="productList.php?page=<?= $i ?>&cateId=<?= (isset($_GET['cateId'])) ? $_GET['cateId'] : 2 ?>"><?= $i ?></a>
            <?php  } ?>
        <?php }
        ?>
        <a href="productList.php?page=<?= (isset($_GET['page'])) ? $_GET['page'] + 1 : 2 ?>&cateId=<?= (isset($_GET['cateId'])) ? $_GET['cateId'] : 2 ?>">&raquo;</a>
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