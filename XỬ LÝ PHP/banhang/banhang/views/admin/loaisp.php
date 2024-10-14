<div id="danhsachLoaiSP">
    <h2>Danh sách loại sản phẩm</h2>
    <div id="listLoaiSP">
        <div class="loai">
            <b>Tên loại</b><b>Thứ tự</b><b>Ẩn hiện</b><b>Action</b>
        </div>
        <?php foreach($listLoaiSP as $loai) {?>
            <div class="loai">
                <span> <?= $loai['ten_loai']?> </span>
                <span> <?= $loai['thutu']?> </span>
                <span> <?= ($loai['anhien']==0) ? "Đang ẩn" : "Đang hiện"?> </span>
                <span>
                <a href="<?=ROOT_URL."admin/editloai?id=".$loai['id_loai']?>">Sửa</a>
                <a href="<?=ROOT_URL."admin/deleteloai?id=".$loai['id_loai']?>"
                        onclick="return confirm ('Có chắc chắn xóa không?') ">Xóa</a>
                </span>
            </div>
        <?php }?>
    </div>
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