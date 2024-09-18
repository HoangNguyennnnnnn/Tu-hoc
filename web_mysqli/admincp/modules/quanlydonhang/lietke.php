<?php
    $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky
    WHERE tbl_cart.id_khachhang = tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart DESC";
    $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<p>Liệt kê đơn hàng</p>
<table style="width:100%;border:1px solid black; border-collapse:collapse;">
  <tr>
    <th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Người mua hàng</th>
    <th>Địa chỉ</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Tình trạng</th>
    <th>Quản lý</th>
  </tr>
  <tr>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_dh)){
        $i++;
    ?>
</tr>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tenkhachhang'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td><?php 
    if($row['cart_status']==1){
        echo ' Đơn hàng mới';
    }else{
        echo 'Đã xem';
    }
    ?></td>
    <td>
        <a href="index.php?action=xemdonhang&query=xem&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a>
    </td>
  </tr>
  <tr>
    <?php
    }
    ?>
</tr>
</table>