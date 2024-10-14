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