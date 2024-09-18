<?php
    $sql_pro = "SELECT * FROM tbl_sanpham 
    WHERE tbl_sanpham.id_danhmuc = '$_GET[id]' 
    ORDER BY tbl_sanpham.id_sanpham DESC";
    $query_pro = mysqli_query($mysqli,$sql_pro);
    $sql_cate = "SELECT * FROM tbl_danhmuc 
    WHERE tbl_danhmuc.id_danhmuc = '$_GET[id]' LIMIT 1 ";
    $query_cate = mysqli_query($mysqli,$sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
    // lay ten danh muc
?>
<h3>Danh mục sản phẩm: <?php echo $row_title['tendanhmuc']?></h3>
                <ul class="product-list">
                    <?php
                    while($row_pro = mysqli_fetch_array($query_pro)){
                    ?>
                    <li>
                        <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']?>">
                            <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']?>" alt="">
                            <p class="title-product">Tên sản phẩm: <?php echo $row_pro['tensanpham']?></p>
                            <p class="title-price">Giá : <?php echo number_format($row_pro['giasp'],0,',','.').'vnđ'?></p>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>