<aside id="sidebar">
    <div id="spxemnhieu" class="widget">
        <h2 class="widget-title">Sản phẩm xem nhiều</h2>
        <div id="listsp" class="product-list">
            <?php if (!empty($spxn)) { ?>
                <?php foreach($spxn as $sp) { ?>
                <div class="sp-item">
                    <h4>
                        <a href="<?=ROOT_URL."sp?id=".$sp['id_sp'];?>"> 
                            <?=$sp['ten_sp']?> 
                        </a>
                    </h4>
                    <div class="sp-image">
                        <img src="<?=$sp['hinh']?>" alt="<?=$sp['ten_sp']?>" width="100px" height="100px">
                    </div>
                    <div class="sp-price">
                        <b>Giá: <?=number_format($sp['gia'], 0, "", ".")?> VNĐ</b>
                    </div>
                </div>
                <?php } ?>
            <?php } else { ?>
                <p>Không có sản phẩm xem nhiều.</p>
            <?php } ?>
        </div>
    </div>
</aside>
