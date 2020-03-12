<html>
	<head>
		<title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	</head>
	<body>
	<center><H1>Chúc Mừng Bạn Đã Đăng Ký Thành Công</H1></center>
    <script type="text/javascript">
	var count = 5;
	var redirect = "http://localhost/my_website/login.php";
	function countDown(){
		var timer = document.getElementById("timer");
		if(count > 0){
			count--;
			timer.innerHTML = "Quay lại trang chủ trong <b>"+count+"</b> giây.";
			setTimeout("countDown()", 1000);
		}else{
			window.location.href = redirect;
		}
	}
	</script>
    <style>
	.wrap {
		width: 600px;
		margin: 250px auto;
		padding: 20px;
		border-radius: 10px;
		border: 1px solid #ddd;
		font-size: 20px;
		line-height: 1.3em;
		text-align: center;
	}
	</style>
    <div class="wrap">
        <p id="timer"><script type="text/javascript">countDown();</script></p>
	</div>
