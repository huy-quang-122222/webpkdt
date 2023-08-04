<?php
include_once 'lib/session.php';
Session::checkSession('client');
include_once 'classes/user.php';
// Kết nối với cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'root', '', 'instrumentstore');

// Lấy thông tin từ biểu mẫu
$user_id = $_POST['user_id'];
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$address =  $_POST['address'];


// Cập nhật thông tin người dùng trong cơ sở dữ liệu
$sql = "UPDATE users SET fullname ='$fullName', email ='$email',address ='$address'  WHERE id=$user_id";
mysqli_query($conn, $sql);

// Điều hướng người dùng đến trang hiển thị thông tin người dùng đã được cập nhật
header("Location: checkout.php?id=$user_id");
exit;
?>