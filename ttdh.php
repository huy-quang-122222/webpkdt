<?php $id=$_GET['id']; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Thông tin mua hàng</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style12.css">
	<style>
			body {
				font-family: Arial, sans-serif;
				background-color: #f2f2f2;
			}

			h1 {
				padding-top: 50px;
				padding-bottom: 50px;
				text-align: center;
				color: #333;
			}

			form {
				width: 40%;
				margin: 0 auto;
				background-color: #3b455d81;
				
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
				border-radius: 10px;
				padding: 20px;
				
				
				
				
				
			}

			label {
				display: block;
				font-weight: bold;
				margin-bottom: 10px;
			}

			input[type="text"], input[type="tel"] {
				width: 100%;
				padding: 10px;
				border: 1px solid #ccc;
				border-radius: 3px;
				margin-bottom: 20px;
				box-sizing: border-box;
			}

			button[type="submit"] {
				background-color: #4CAF50;
				color: #fff;
				padding: 10px 20px;
				border: none;
				border-radius: 3px;
				cursor: pointer;
				
			}
			button{
				display: block;
				margin: auto;
				border-radius: 20px;
				
			}
			button[type="submit"]:hover {
				background-color: #3e8e41;
			}

	</style>
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
	<script>
		// Javascript để hiển thị bản đồ và lấy vị trí địa lý của người dùng
	</script>
</head>
<body>
	<a href="https://zalo.me/0912350096" class="lienhe-button" target="_blank" rel="noopener"> <img src="images/zalo.png" alt="img"></a> 
    <a href="tel:0912350096" target="_blank" rel="nofollow" class="lienhe-call">
    <img src="images/call.jpg" alt="img">
    </a>
	<h1>Địa chỉ nhận hàng </h1>
	
	<form class="info_user" method="POST" action="update_user.php">
		<input type="hidden" name="user_id" id="user_id" value="<?php echo $id;?>">
	<div>
		<div >
			<label for="fullName">Họ và tên:</label>
			<input type="text" id="fullName" name="fullName" required>
		</div>
		<div>
			<label for="email">Số điện thoại:</label>
			<input type="tel" name="email" id="email">
		</div>
		<div>
			<label for="address">Địa chỉ:</label>
			
			<textarea name="address" id="address" cols="30" rows="5" required></textarea>
		</div>
        
        <button type="submit">Cập nhật</button>
	
    </form>
	
	
</body>
</html>

