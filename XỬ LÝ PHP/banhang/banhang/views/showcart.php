<div id="cart" class="col-md-11 m-auto shadow-none">
    <h1> Giỏ hàng của bạn </h1>
     <?php $tongtien = $tongsoluong = 0; ?>
     <?php foreach ($_SESSION['cart'] as $id_sp => $soluong ) { ?>
         <?php 
             $sp = $this -> model -> detail($id_sp); 
             $tien = $sp['gia']*$soluong;
             $tongtien += $tien;
             $tongsoluong += $soluong;
         ?>
         <div> 
             <span> <?= $sp['ten_sp']?> </span>
             <input type="number" name="soluong[]" value= "<?= $soluong?>"> 
             <span class="text-end"> <?= $sp['gia']?> </span>
             <span class="text-end"> 
                 <?= number_format( $tien, 0 , "" , "." ); ?> 
             </span>
         </div>
    <?php }
     ?>
     <div id="last" class="d-flex justify-content-between mt-2">
    <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="btn btn-success">Trở lại trang trước</a>
     <a href="checkout" class="btn btn-success">Thanh toán đơn hàng</a>
</div>
</div> 