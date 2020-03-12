<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Account</title>
    <meta name="author" content="Đăng Quang">
    <meta name="description" content="Đăng nhập cho web" />
    <meta name="keywords" content="Login" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="design.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script   script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
</head>
<body>
<?php

	//Gọi file connection.php ở trong file "lib"
    require_once("lib/connection.php");
    
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submit"])) {
        
        // lấy thông tin người dùng
		$username = $_POST["username"];
		$password = $_POST["password"];
        
        //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
            echo '<script language ="javascript">';
            echo 'alert("Username hoặc Password bạn không được để trống!")';
            echo '</script>';
		
		}else{
            //$sql dùng để truy vấn thông tin
            //$conn là biến dùng để truy cập với database và sau đó $sql sẽ so sánh username & password để kiểm tra đúng hay sai
            //Hàm mysqli_query() sẽ thực hiện truy vấn đối với cơ sở dữ liệu (truy cập databse => lấy thông tin => trả kết quả )
            // mysqli_num_rows( $query); trong đó $query là tập hợp kết quả trả về từ các hàm mysqli_query()
			$sql = "select * from users where username = '$username' and password = '$password' ";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
            echo '<script language ="javascript">';
            echo 'alert("Tên đăng nhập hoặc Mật khẩu không đúng!")';
            echo '</script>';
			
			}else{

			//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
                $_SESSION['username'] = $username;
                
                // Thực thi hành động sau khi lưu thông tin vào session
                 // tiến hành chuyển hướng trang web tới một trang gọi là timewait2.php
                header('Location: timewait2.php');
                
			}
		}
	}
?>
                <form method="POST" action="login.php"class="form-horizontal" role="form">
        
	    	    <table border="0">
                    <div class="panel-heading"> <span class="glyphicon glyphicon-lock"></span> ĐĂNG NHẬP</div></hr>

	    		    <tr>
	    			    <td><strong>Username: </strong></td>
	    			    <td><input type="text" name="username" size="30"></td>
	    		    </tr>
	    		    <tr>
	    			    <td><strong>Password: </strong></td>
	    			    <td><input type="password" name="password" size="30"></td>
                    </tr>

                    
                </table>
                <div class="form-group last">
                    <div class="col-sm-offset-3 col-sm-9">
                
                         <button type="submit" class="btn btn-success btn-sm" name="btn_submit"> Đăng Nhập</button></td>
                         <button type="reset" class="btn btn-default btn-sm"> Quên mật khẩu?</button>
                    </div>
                    </div>
                    
                        <p>Bạn Chưa có tài khoản? <strong><a href="register.php">Đăng Ký</a></strong></p>
                </form>

                
</html>