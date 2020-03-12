<html>
	<head>
		<title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script   script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="design(register).css">
	</head>
	<body>
		<?php

		require_once("lib/connection.php");
		if (isset($_POST["btn_submit"])) {
			  //lấy thông tin từ các form bằng phương thức POST (username , password , name , email)
			  //Trong PHP, từ khóa $_POST chỉ lấy được giá trị của thẻ input thông qua thuộc tính name, không phải thẻ id 
  			$username = $_POST["username"];
  			$password = $_POST["pass"]; // nhập từ bàn phím
 			 $name = $_POST["name"];
  			$email = $_POST["email"];
			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($username == "" || $password == "" || $name == "" || $email == "") {
                    echo '<script language ="javascript">';
                    echo 'alert("Bạn vui lòng nhập đầy đủ thông tin!")';
                    echo '</script>';
				   
  			}else{
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="select * from users where username='$username'";
					$kt=mysqli_query($conn, $sql);

					if(mysqli_num_rows($kt)  > 0){
                        echo '<script language ="javascript">';
                        echo 'alert("Tài khoản đã tồn tại!")';
                        echo '</script>';
						
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO users(
	    					username,
	    					password,
	    					name,
						    email
	    					) VALUES (
	    					'$username',
	    					'$password',
						    '$name',
	    					'$email'
	    					)";
					      // thực thi câu $sql với biến conn lấy từ file connection.php
                           mysqli_query($conn,$sql);
                            echo '<script language ="javascript">';
                            echo 'alert("Chúc mừng bạn đã đăng ký thành công")';
							echo '</script>';
							
							 // tiến hành chuyển hướng trang web tới một trang gọi là timewait.php
                           header('Location: timewait.php');
                                
					}
									    
					
			  }
    }
	?>
	<form action="register.php" method="post"class="form-horizontal" role="form">
   
       
		    <table border="0">	
            <div class="panel-heading"> <span class="glyphicon glyphicon-pencil"></span> ĐĂNG KÝ</div></hr>
			    <tr>
				    <td><strong>Username :</strong></td>
				    <td><input type="text" id="username" name="username" size="30"></td>
			    </tr>
			    <tr>
				    <td><strong>Password :</strong></td>
				    <td><input type="password" id="pass" name="pass" size="30"></td>
			    </tr>
			    <tr>
				    <td><strong>Họ Tên :</strong></td>
				    <td><input type="text" id="name" name="name" size="30"> </td>
			    </tr>
			    <tr>
				    <td><strong>Email :</strong></td>
				    <td><input type="text" id="email" name="email" size="30"></td>
			    </tr>
			    <tr>
                <div class="form-group last">
                    <div class="col-sm-offset-3 col-sm-9">
				        <td colspan="2" align="center"><button type="submit" class="btn btn-success btn-sm" name="btn_submit">Đăng Ký</button></td>
			    </tr>
		</table><br>
 
	</form>
	</body>
	</html>