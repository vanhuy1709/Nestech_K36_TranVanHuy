<div id="danhsachsanpham">
    <h2>DANH SÁCH SẢN PHẨM</h2>
    <!-- Bảng danh sách sản phẩm -->
    <div id="listsp">
    <div class="sp">
    <b><a href="<?= ROOT_URL . "admin/sanphamds?keyword=$keyword&sort=ten_sp&order=" . ($order == 'ASC' ? 'DESC' : 'ASC') ?>">Tên SP</a></b>
    <b>Loại</b>
    <b><a href="<?= ROOT_URL . "admin/sanphamds?keyword=$keyword&sort=gia&order=" . ($order == 'ASC' ? 'DESC' : 'ASC') ?>">Giá</a></b>
    <b>Giá KM</b>
    <b><a href="<?= ROOT_URL . "admin/sanphamds?keyword=$keyword&sort=ngay&order=" . ($order == 'ASC' ? 'DESC' : 'ASC') ?>">Ngày</a></b>
    <b>Ẩn hiện</b>
    <b>Nổi bật</b>
    <b>Action</b>   
</div>
        <?php if (!empty($listsp)) { ?>
            <?php foreach ($listsp as $sp) { ?>
                <div class="sp">
                    <span><?= $sp['ten_sp'] ?></span>
                    <span><?= $this->model->layTenLoai($sp['id_loai']) ?></span>
                    <span><?= number_format($sp['gia']) ?> đ</span>
                    <span><?= number_format($sp['gia_km']) ?> đ</span>
                    <span><?= date('d/m/Y', strtotime($sp['ngay'])) ?></span>
                    <span><?= $sp['anhien'] == 0 ? "Ẩn" : "Hiện" ?></span>
                    <span><?= $sp['hot'] == 0 ? "Bình thường" : "Nổi bật" ?></span>
                    <span>
                        <a href="<?= ROOT_URL . "admin/editsp?id=" . $sp['id_sp'] ?>">Sửa</a>
                        <a href="<?= ROOT_URL . "admin/deletesp?id=" . $sp['id_sp'] ?>"
                           onclick="return confirm('Có chắc chắn xóa không?')">Xóa</a>
                    </span>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>Không có sản phẩm nào được tìm thấy.</p>
        <?php } ?>
    </div>

            <!-- Phân trang -->
            <div class="pagination">
            <?php
            // Hiển thị trang đầu và trang trước
                if ($pageNum > 1) {
                    echo '<a href="?page=1">First</a>';
                    echo '<a href="?page=' . ($pageNum - 1) . '">Previous</a>';
                }

            // Hiển thị một vài trang xung quanh trang hiện tại
            $start = max(1, $pageNum - 2);  // Trang bắt đầu
            $end = min($tongSoTrang, $pageNum + 2);  // Trang kết thúc

                for ($i = $start; $i <= $end; $i++) {
                    if ($i == $pageNum) {
                        echo '<a class="active">' . $i . '</a>';  // Trang hiện tại
                    } else {
                        echo '<a href="?page=' . $i . '">' . $i . '</a>';
                    }
                }

            // Hiển thị trang tiếp theo và trang cuối
                if ($pageNum < $tongSoTrang) {
                    echo '<a href="?page=' . ($pageNum + 1) . '">Next</a>';
                    echo '<a href="?page=' . $tongSoTrang . '">Last</a>';
                }
            ?>
        </div>
</div>
