<!DOCTYPE html>
<html>
<?php
header('Content-Type: text/html;charset=UTF-8');  
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "lvq";      // Khai báo database
// Kết nối database tintuc
$connect = mysqli_connect($server, $username, $password, $dbname);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
}
mysqli_set_charset($connect, 'UTF8');
$sql     = "SELECT * FROM web WHERE ID = 2";
$ket_qua = $connect->query($sql);
while ($row = $ket_qua->fetch_array(MYSQLI_ASSOC)) {
   $name =   $row['name'];
   $email = md5($row['email']);
  
 
}
?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Demo lvq</title>
		<link rel="stylesheet" type="text/css"  href="style.css">
    </head>
    <body>
    
    <div id="top"> Tên bạn là: <?php echo "$name" ?> | Email của bạn là: <?php echo "$email"?></div>
    </body>
</html>
