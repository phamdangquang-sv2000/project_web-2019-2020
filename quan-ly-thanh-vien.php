<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quản lý thành viên</title>

    <!-- Bootstrap cho đẹp =))  -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>
    <?php

    // yêu cầu kết nối như lúc đầu nói !
      require_once("../lib/connection.php");
    ?>

    <div class="container">
      <div class="row">
        <h3> Quản lý thành viên</h3>
        <table class="table">
          <caption>Danh sách thành viên đã đăng ký</caption>
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên đăng nhập</th>
              <th>Họ tên</th>
              <th>Địa chỉ email</th>
              <th>Cấp độ</th>
              <th>Hành động</td>
            </tr>
          </thead>
          <tbody>
          <?php

          //<th scope="row">1</th>
          //<td>teo123</td>
          //<td>Huynh Van Teo</td>
          //<td>huynhvanteo@gmail.com</td>
          //<td>Thành viên</td>
          //<td><a href="chinh-sua-thanh-vien.php?id=1">Sửa</a> <a href="xoa-thanh-vien.php?id=1">Xóa</a></td>
          //</tr>


          
            $stt = 1 ;
            $sql = "SELECT * FROM users";

            // thực thi câu $sql với biến conn lấy từ file connection.php 
            // $conn là biến dùng để liên kết với database
            // $sql là câu truy vấn thông tin
            //lấy hết thông tin từ biến $conn = ($server_host,$server_username,$server_password,$database)
            //Hàm mysqli_query() sẽ thực hiện truy vấn đối với cơ sở dữ liệu.
            $query = mysqli_query($conn,$sql);

            // do thẻ được lặp lại nhiều lần cho mỗi 1 tài khoản ở trên nên ở đây dùng vòng lặp while cho các thẻ
            //Hàm mysqli_fetch_array() sẽ tìm và trả về một dòng kết quả của một truy vấn MySQL nào đó dưới dạng một mảng kết hợp, mảng liên tục hoặc cả hai
            while ($data = mysqli_fetch_array($query)) {

              //$stt ++ số thứ tự tăng dần
              //$data dùng để truy xuất từng dữ liệu 
          ?>
            <tr>
            
              <th scope="row"><?php echo $stt++ ?></th>
              <td><?php echo $data["username"]; ?></td>
              <td><?php echo $data["name"]; ?></td>
              <td><?php echo $data["email"]; ?></td>
              <td>
                <?php
                    if ($data["level"] == 1) {
                      echo "Administrator";
                    }else{
                      echo "Member";
                    }
                ?>
              </td>
              <td><a href="chinh-sua-thanh-vien.php?id=<?php echo $data["id"]; ?>">Sửa</a> <a href="xoa-thanh-vien.php?id=<?php echo $data["id"]; ?>">Xóa</a></td>
            </tr>
          <?php
            }
          ?>
          </tbody>
        </table>
      </div>

    </div>
</body>
</html>