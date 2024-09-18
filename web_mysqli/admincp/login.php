<?php
session_start();
include("config/config.php");
if(isset($_POST['dangnhap'])){
    $taikhoan = $_POST['username'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_admin WHERE username = '".$taikhoan."' AND password = '".$matkhau."' LIMIT 1";
    $row = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($row);
    if($count>0){
        $_SESSION['dangnhap'] = $taikhoan;
        header("Location:index.php");
    }else{
        header("Location:login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
<style>
    body{
        background:#f2f2f2;
    }
    .wrapper-login{
        width: 15%;
        margin:0 auto;
    }
</style>
</head>
<body>
<div class="wrapper-login">
    <form action="" autocomplete="off" method="POST">
<table border="1" class="table-login" style="text-align:center;">
    <tr>
        <td colspan="2">Đăng nhập</td>
    </tr>
  <tr>
    <th>Tài khoản</th>
    <th><input type="text" name="username"></th>
  </tr>
  <tr>
    <td>Mật khẩu</td>
    <td><input type="password" name="password"></td>
  </tr>
  <tr>
        <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
    </tr>
</table>
</form>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>