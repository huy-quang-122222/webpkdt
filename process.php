<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "instrumentstore";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("Kết nối thất bại: " . mysqli_connect_error());
}

// Lấy dữ liệu từ form
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];


// Lưu vào cơ sở dữ liệu
$sql = "INSERT INTO customer_info (name, email, phone, address)
		VALUES ('$name', '$email', '$phone', '$address')";

if (mysqli_query($conn, $sql)) {
    header("Location:./checkout.php");
   

} else {
	echo "Lỗi: " . mysqli_error($conn);
}

mysqli_close($conn);

?>