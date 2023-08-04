<?php
include_once '../lib/session.php';
Session::checkSession('admin');
$role_id = Session::get('role_id');
if ($role_id == 1) {
    # code...
} else {
    header("Location:../index.php");
}
include '../classes/orderDetails.php';
include '../classes/order.php';
include '../classes/user.php';



$orderDetails = new OrderDetails();
$orderDetailsResult = $orderDetails->getOrderDetails($_GET['orderId']);

$order = new Order();
$orderResult = $order->getById($orderDetailsResult[0]['orderId']);

 $user = new user();
 $userInfo = $user->getLastUserId(); 





// $orderDetails = new orderDetails();
// $result = $orderDetails->getOrderDetails($_GET['orderId']);
// $order = new order();
// $order_result = $order->getById($result[0]['orderId']);
// $user = new user();
// $info = $user->get('userId');   




?>

<!DOCTYPE html>
<html lang="en">
<STyle>
div {

  margin: 30px 100px;
 
  width: auto;

}
.huy{
    margin-top: 100px;

}


div b {
    padding-top: 100px;
  font-family: Arial, sans-serif;
  color: #333;
  font-size: 25px;
}

.footer1 {
  background-color: #333;
  color: #fff;
  font-weight: bold;
  
  text-align: center;
  margin-left: 700px;
  margin-bottom: 100px;
}

</STyle>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Chi tiết đơn đặt hàng</title>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">ADMIN</label>
        <ul>
            <li><a href="productlist.php">Quản lý Sản phẩm</a></li>
            <li><a href="categoriesList.php">Quản lý Danh mục</a></li>
            <li><a href="orderlist.php" class="active">Quản lý Đơn hàng</a></li>
        </ul>
    </nav>
    <div class="title1">
        <!-- <h1>Chi tiết đơn đặt hàng <?= $userInfo['id'] ?></h1> -->
    </div>
    <div class="huy">

            <div>Địa chỉ nhận hàng: <b><?= $userInfo['address'] ?></b></div> 
            <div>Tên : <b><?= $userInfo['fullname'] ?></b></div>   
            <div>Số điện thoại: <b><?= $userInfo['email'] ?></b></div>  
        
        
    </div>
       
    
    <div class=" footer1">
        QUANG HUY SHOP
    </div>
</body>

</html>