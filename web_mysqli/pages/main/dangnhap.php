<?php
if(isset($_POST['dangnhap'])){
    $email = $_POST['email'];
    $matkhau = md5($_POST['matkhau']);
    $sql = "SELECT * FROM tbl_dangky WHERE email = '".$email."' AND matkhau = '".$matkhau."' LIMIT 1";
    $row = mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($row);
    if($count>0){
        $row_data = mysqli_fetch_array($row);
        $_SESSION['dangky'] = $row_data['tenkhachhang'];
        $_SESSION['id_khachhang'] = $row_data['id_dangky'];
        header("Location:index.php?quanly=giohang");
    }else{
        echo '<script>alert("Tài khoản hoặc mật khẩu không đúng !)</script>';
    }
}
?>
<style>
    body{
        background:#f2f2f2;
    }
    .wrapper-login{
        width: 15%;
        margin:0 auto;
    }
</style>
    <form action="" autocomplete="off" method="POST">
<table border="1" witdh="50%" class="table-login" style="text-align:center;">
    <tr>
        <td colspan="2">Đăng nhập khách hàng</td>
    </tr>
  <tr>
    <th>Tài khoản</th>
    <th><input type="text" size="50" name="email" placeholder="Email...."></th>
  </tr>
  <tr>
    <td>Mật khẩu</td>
    <td><input type="password" size="50" name="matkhau" placeholder="Mật khẩu...."></td>
  </tr>
  <tr>
        <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
    </tr>
</table>
</form>