<div class="search-results">
    <h2><?= $titlePage ?></h2>
    <?php if (empty($results)) : ?>
        <p>Không tìm thấy sản phẩm nào phù hợp.</p>
    <?php else : ?>
        <div class="product-list">
            <?php foreach ($results as $sp) : ?>
                <div class="sp">
                    <h4><a href="<?=ROOT_URL."sp?id=".$sp['id_sp'];?>"> <?=$sp['ten_sp']?> </a></h4>
                    <img src="<?=$sp['hinh']?>" alt="<?=$sp['ten_sp']?>">
                    <b>Giá <?=number_format($sp['gia'], 0, "", ".")?> VNĐ</b>
                </div>

            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
