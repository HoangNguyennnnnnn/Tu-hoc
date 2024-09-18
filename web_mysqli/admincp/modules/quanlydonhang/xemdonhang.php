<?php
    $code=$_GET['code'];
    $sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham
    WHERE tbl_cart_details.id_sanpham = tbl_sanpham.id_sanpham
    AND tbl_cart_details.code_cart='".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";
    $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
    $sql = mysqli_query($mysqli,"UPDATE tbl_cart SET cart_status = 0  WHERE code_cart='".$code."'");
?>
<p>Xem chi tiết đơn hàng</p>
<table style="width:100%;border:1px solid black; border-collapse:collapse;text-align:center;">
  <tr>
    <th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>
  </tr>
  <tr>
    <?php
    $tongtien=0;
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_dh)){
        $i++;
        $tongtien+=$row['giasp']*$row['soluongmua'];
    ?>
</tr>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo number_format($row['giasp'],0,',','.' ).'vnđ'?></td>
    <td><?php echo number_format($row['giasp']*$row['soluongmua'],0,',','.' ).'vnđ'  ?></td>
  </tr>
    <?php
    }
    ?>
    <tr>
<td colspan="6">
        <p>Tổng tiền :<?php echo number_format($tongtien,0,',','.' ).'vnđ'?></p>
    </td>
    </tr>
</table>