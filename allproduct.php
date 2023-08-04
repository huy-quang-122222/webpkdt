
<?php
include_once 'lib/session.php';
include_once 'classes/product.php';
include_once 'classes/cart.php';

$cart = new cart();
$totalQty = $cart->getTotalQtyByUserId();

$product = new product();
$list = mysqli_fetch_all($product->getAll(), MYSQLI_ASSOC);// Lấy danh sách sản phẩm

if (isset($_GET['cateId'])) {
  $list = $product->getProductsByCateId($_GET['cateId']);
} else {
  $list = $product->getAll();
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

    <title>Trang chủ</title>
</head>


</script>
<body>
    <a href="https://zalo.me/0912350096" class="lienhe-button" target="_blank" rel="noopener"> <img src="images/zalo.png" alt="img"></a> 
    <a href="tel:0912350096" target="_blank" rel="nofollow" class="lienhe-call">
    <img src="images/call.jpg" alt="img">

    </a>
             <form action="search.php" method="POST">
                <input type="text" name="tukhoa">
                <button>Tìm</button>
            </form>
    
    <div class="featuredProducts">
        <p class="nhapnhay"> Sản phẩm nổi bật </p>
    </div>  
 
    <div class="container">
        <?php
        foreach ($list as $key => $value) { ?>
            <div class="card">
                <div class="imgBx">
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
                </div>
                <div class="content">
                    <div class="productName">
                        <a href="detail.php?id=<?= $value['id'] ?>">
                            <h3 class="td"><?= $value['name'] ?></h3>
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
                            Giá gốc: <del><?= number_format($value['originalPrice'], 0, '', ',') ?> Vnđ</del>
                        <?php } else { ?>
                            <p>.</p>
                        <?php } ?>
                    </div>
                    <div class="price">
                        Giá bán: <?= number_format($value['promotionPrice'], 0, '', ',') ?> Vnđ
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
        ?>
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
        <p class="copyright">STORENOW @ 2021</p>
    </footer>
 <script>
$(document).ready(function() {
  // Bắt sự kiện click vào nút Menu
  $('#menuBtn').click(function() {
    // Toggle class 'active' của phần tử chứa menu
    $('.menuItems').toggleClass('active');
  });
});
$('#menuBtn').on('click', function() {
  $('.menuItems').slideToggle();
});

</script>

</body>

</html>
<script>
        const slides = document.querySelector('.slides');
        const slideImages = document.querySelectorAll('.slides img');
        const dots = document.querySelector('.dots');
        const prevBtn = document.querySelector('.prev');
        const nextBtn = document.querySelector('.next');
        let slideIndex = 0;

        // Create dots
        for (let i = 0; i < slideImages.length; i++) {
        const dot = document.createElement('span');
        dot.classList.add('dot');
        dots.appendChild(dot);
        }

        const dotElements = document.querySelectorAll('.dot');

        // Show first slide
        showSlide(slideIndex);

        // Previous slide
        prevBtn.addEventListener('click', () => {
        slideIndex--;
        if (slideIndex < 0) {
            slideIndex = slideImages.length - 1;
        }
        showSlide(slideIndex);
        });

        // Next slide
        nextBtn.addEventListener('click', () => {
        slideIndex++;
        if (slideIndex >= slideImages.length) {
            slideIndex = 0;
        }
        showSlide(slideIndex);
        });

        // Show slide by index
        function showSlide(index) {
        slides.style.transform = `translateX(-${index * (100 / slideImages.length)}%)`;
        dotElements.forEach(dot => dot.classList.remove('active'));
        dotElements[index].classList.add('active');
        }

        // Show slide automatically
        setInterval(() => {
        slideIndex++;
        if (slideIndex >= slideImages.length) {
            slideIndex = 0;
        }
        showSlide(slideIndex);
        }, 3000);

</script>