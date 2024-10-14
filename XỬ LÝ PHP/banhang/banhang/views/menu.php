<ul id="thanhmenu">
    <li><a href="<?=ROOT_URL?>">Trang chủ</a></li>
    <?php if (!empty($this->listloai)) { ?>
        <?php foreach($this->listloai as $loai){ ?>
        <li>
            <a href="<?=ROOT_URL."loai?idloai=".$loai['id_loai'];?>">
                <?=$loai['ten_loai']?>
            </a>
        </li>
        <?php } ?>
    <?php } ?>

    <li style="float:right;">
        <a href="<?=ROOT_URL?>showcart">Giỏ hàng</a>
    </li>
    <li style="float:left;">
        <a href="<?=ROOT_URL?>login">Đăng nhập</a>
    </li>
    <li style="float:left;">
        <a href="<?=ROOT_URL?>register">Đăng ký</a>
    </li>
    <form action="<?= ROOT_URL ?>tk" method="post">
        <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." required>
        <button type="submit">Tìm kiếm</button>
    </form>
</ul>
