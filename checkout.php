<?php
include_once 'lib/session.php';
Session::checkSession('client');
include_once 'classes/cart.php';
include_once 'classes/user.php';

$cart = new cart();
$list = $cart->get();
$totalPrice = $cart->getTotalPriceByUserId();
$totalQty = $cart->getTotalQtyByUserId();

$user = new user();
$userInfo = $user->get();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style12.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <script src="https://kit.fontawesome.com/your_api_key.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-AbBlX7KklJW+Jvst+wBGYa4cE/UBSi1Sc+pogTXZf6aSjYwkX9lD5U6a5UwMhZnJjZHT3n/kaf1xM/E1Sy39g==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Checkout</title>
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
            <?php
            if (isset($_SESSION['user']) && $_SESSION['user']) { ?>
                <li><a href="logout.php" id="signin">Đăng xuất</a></li>
            <?php } else { ?>
                <li><a href="register.php" id="signup">Đăng ký</a></li>
                <li><a href="login.php" id="signin">Đăng nhập</a></li>
            <?php } ?>
            <li><a href="order.php" id="order">Đơn hàng</a></li>
            <li>
                <a href="checkout.php" class="active">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="sumItem" id="totalQtyHeader">
                        <?= $totalQty['total'] ?>
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
    <div class="featuredProducts1">
        <h1>Giỏ hàng</h1>
    </div>
    <div class="container-single1">
        <?php
        if ($list) { ?>
            <table class="order1">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                $count = 1;
                foreach ($list as $key => $value) { ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $value['productName'] ?></td>
                        <td>
                            <!-- <img class="image-cart" src="admin/uploads/<?= $value['productImage'] ?>"> -->
                    
                        <?php
                            $image_names = $value['productImage']; // $image_names là chuỗi chứa các tên tệp ảnh phân tách bằng dấu phẩy

                            $image_urls = explode(',', $image_names);

                            foreach ($image_urls as $image_url) {
                                $image_url = trim($image_url);
                                $image_path = "admin/uploads/" . $image_url;
                                // Hiển thị ảnh bằng thẻ HTML <img>
                               echo "<a href='#.php?id=" . $value['id'] . "'><img src='$image_path' width='200' height='200' style='margin-right: 3px'></a>";


                            }

                           ?>
                        </td>
                        <td><?= number_format($value['productPrice'], 0, '', ',') ?> VND </td>
                        <td>
                                <button onclick="increaseQuantity(this)">+</button>
                                <br>
                                <input id="<?= $value['productId'] ?>" type="number" name="qty" class="qty" value="<?= $value['qty'] ?>" oninput="update(this)" min="1">
                                <button onclick="decreaseQuantity(this)">-</button>
                        </td>
                        <td>
                            <a href="delete_cart.php?id=<?= $value['id'] ?>">Xóa</a>
                        </td>
                    </tr>
                <?php }
                ?>
            </table>
            <div class="orderinfo">
                <div class="buy">
                        <div class="location">
                            <span>
                                <i class="material-icons">location_on</i>
                                <b>Địa chỉ nhận hàng</b>
                            </span>
                            <a href="ttdh.php?id=<?= $userInfo['id'] ?>" class="edit-icon">
                                <i class="fas fa-pencil-alt"></i>
                                Chỉnh sửa 
                            </a>
                        </div >
                       

                     <div class ="loco"> 
                            <b><?= $userInfo['address'] ?></b>
                            <div>
                                Người đặt hàng: <b><?= $userInfo['fullname'] ?></b>
                            </div>
                            <div>
                                Số điện thoại: <b><?= $userInfo['email'] ?></b>
                            </div>
                        
                     </div>
                    <hr>
                    <h3>TỔNG TIỀN</h3>
                    
                    <div class="han" >
                        Số lượng: <b id="qtycart"><?= $totalQty['total'] ?></b>
                    </div>
                    <div class="han">
                        Tổng tiền: <b id="totalcart"><?= number_format($totalPrice['total'], 0, '', ',') ?> VND</b>
                    </div>
                    <br>
                   <div>
                     <<< Đà Nẵng nhận hàng trong vòng 24h, ngoại tỉnh 3-5 ngày >>>>
                     <P id= "muhang">Mua trực tiếp tại website or liên hệ qua zalo: 0912350096 </P>
                   </div>
                    
                    <div class="buy-btn">
                        <a href="add_order.php">XÁC NHẬN VÀ ĐẶT HÀNG</a>
                    </div>

                </div>
               
            </div> 
        <?php } else { ?>
            <h3>Giỏ hàng hiện đang rỗng</h3>
        <?php }
        ?>
    </div>
    </div>
    <div class="foo">
    <footer >
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
    </div>
</body>
<script type="text/javascript">


function increaseQuantity(element) {
  var inputElement = element.parentNode.querySelector(".qty");
  inputElement.value = parseInt(inputElement.value) + 1;
  update(inputElement);
}

function decreaseQuantity(element) {
  var inputElement = element.parentNode.querySelector(".qty");
  if (inputElement.value > 1) {
    inputElement.value = parseInt(inputElement.value) - 1;
    update(inputElement);
  }
}




function update(e) {
        var http = new XMLHttpRequest();
        var url = 'update_cart.php';
        var params = "productId=" + e.id + "&qty=" + e.value;
        http.open('POST', url, true);

        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() {
            if (http.readyState === XMLHttpRequest.DONE) {
                var status = http.status;
                if (status === 200) {
                    var arr = http.responseText;
                    var b = false;
                    var result = "";
                    for (let index = 0; index < arr.length; index++) {
                        if (arr[index] == "[") {
                            b = true;
                        }
                        if (b) {
                            result += arr[index];
                        }
                    }
                    var arrResult = JSON.parse(result.replace("undefined", ""));
                    console.log(arrResult);
                    document.getElementById("totalQtyHeader").innerHTML = arrResult[1]['total'];
                    document.getElementById("qtycart").innerHTML = arrResult[1]['total'];
                    document.getElementById("totalcart").innerHTML = arrResult[0]['total'].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + "VND";

                    //alert('Đã cập nhật giỏ hàng!');
                } else if (status === 501) {
                    alert('Số lượng sản phẩm không đủ để thêm vào giỏ hàng!');
                    e.value = parseInt(e.value) - 1;
                } else {
                    alert('Cập nhật giỏ hàng thất bại!');
                    window.location.reload();
                }
            }

        }
        http.send(params);
    }

    var list = document.getElementsByClassName("qty");
    for (let item of list) {
        item.addEventListener("keypress", function(evt) {
            evt.preventDefault();
        });
    }

</script>

</html>