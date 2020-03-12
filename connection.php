<?php
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'severphp';
//$server_host :tên host chưa database, ở đây mình dùng là localhost vì chạy ở máy tính cục bộ, còn khi upload website lên các host khác thì có thể thay đổi tham số này cho phù hợp.
//$server_username  : tên đăng nhập vào database, mặc định ở local là root
//$server_password ; mật khẩu đăng nhập vào database, mặc định ở local là rỗng
/
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");

//phương thức mysqli_query($conn,”SET NAMES ‘UTF8′”) bạn có thể thêm vào hoặc không đều được
mysqli_query($conn,"SET NAMES 'UTF8'");