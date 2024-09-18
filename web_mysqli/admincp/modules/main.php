<div class="clear"></div>
<div class="main">
<?php
                if(isset($_GET['action']) && $_GET['query']){
                    $tam=$_GET['action'];
                    $query=$_GET['query'];
                }else{
                    $tam='';
                    $query='';
                }
                if($tam=='quanlydanhmucsanpham' && $query == 'them'){
                    include("modules/quanlydanhmucsanpham/them.php");
                    include("modules/quanlydanhmucsanpham/lietke.php");
                }elseif($tam=='quanlydanhmucsanpham' && $query == 'sua'){
                    include("modules/quanlydanhmucsanpham/sua.php");
                }elseif($tam=='quanlysp' && $query == 'them'){
                    include("modules/quanlysp/them.php");
                    include("modules/quanlysp/lietke.php");
                }elseif($tam=='quanlysp' && $query == 'sua'){
                    include("modules/quanlysp/sua.php");
                }elseif($tam=='quanlydonhang'&& $query=='lietke'){
                    include("modules/quanlydonhang/lietke.php");
                }elseif($tam=='xemdonhang'&& $query=='xem'){
                    include("modules/quanlydonhang/xemdonhang.php");
                }else{
                    include("modules/dashboard.php");
                }
                ?>
</div>