<?php

    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (!isset($_POST['txtUsername'])){
        die('');
    }

    //Nhúng file kết nối với database
    include('ketnoi.php');

    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');

    //Lấy dữ liệu từ file dangky.php
    $username   = addslashes($_POST['txtUsername']);
    $password   = addslashes($_POST['txtPassword']);
 
    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if (!$username || !$password)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

        // Mã khóa mật khẩu  $password = md5($password);
        $password = $password;

    //Kiểm tra tên đăng nhập này đã có người dùng chưa
    if (mysql_num_rows(mysql_query("SELECT username FROM member WHERE username='$username'")) > 0){
        echo "Bạn đã nhận thưởng rồi. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    //Lưu thông tin thành viên vào bảng
    @$addmember = mysql_query("
        INSERT INTO member (
            username,
            password
        )
        VALUE (
            '{$username}',
            '{$password}'
        )
    ");

    //Thông báo quá trình lưu
    if ($addmember)
        echo "Đăng nhập thành công. <a href='/'>Về trang chủ</a>";
    else
        echo "Có lỗi xảy ra. <a href='dangky.php'>Thử lại</a>";
?>