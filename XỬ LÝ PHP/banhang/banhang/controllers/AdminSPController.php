<?php
    require_once "models/sanpham.php";
    class AdminSPController {
        private $model=null;
        function __construct()
        {
            $this -> model = new sanpham();

        }
        function index() {
            global $params;
        
            $keyword = isset($params['keyword']) ? $params['keyword'] : '';
            $pageNum = isset($params['page']) ? (int)$params['page'] : 1;
        
            // Chỉ sắp xếp khi có tham số sort và order
            $sort = isset($params['sort']) ? $params['sort'] : '';  // Không mặc định
            $order = isset($params['order']) && in_array($params['order'], ['ASC', 'DESC']) ? $params['order'] : '';
        
            $pageSize = 10;
            $demsoSP = $this->model->demSP();  // Tổng số sản phẩm
            $tongSoTrang = ceil($demsoSP / $pageSize);  // Tính tổng số trang
        
            // Gọi hàm lấy danh sách sản phẩm có hoặc không sắp xếp
            $listsp = $this->model->danhsachsanpham($pageNum, $pageSize, $sort, $order);
        
            $this -> checkLoginAdmin();

            $tittlePage = "Quản trị sản phẩm";
            $viewnoidung = "views/admin/sanphamds.php";
            include "views/admin/layout.php";
        }
        
        
        
        
        function add(){
            $tittlePage = "Thêm sản phẩm";
            $viewnoidung= "views/admin/sanphamthem.php";
            include "views/admin/layout.php";
        }
        function timkiemSanPham() {
            global $params;
        
            // Lấy từ khóa tìm kiếm
            $keyword = isset($params['keyword']) ? $params['keyword'] : '';
        
            // Lấy số trang hiện tại và số sản phẩm trên mỗi trang
            $pageNum = isset($params['page']) ? (int)$params['page'] : 1;
            $pageSize = isset($params['pageSize']) ? (int)$params['pageSize'] : 10;
            
            // Lấy thông tin sắp xếp
            $sort = isset($params['sort']) ? $params['sort'] : 'ten_sp';  // Sắp xếp theo tên SP mặc định
            $order = isset($params['order']) && in_array($params['order'], ['ASC', 'DESC']) ? $params['order'] : 'ASC';
        
            // Đếm tổng số sản phẩm dựa trên từ khóa tìm kiếm
            $demsoSP = $this->model->demSP($keyword);
        
            // Tính tổng số trang
            $tongSoTrang = ceil($demsoSP / $pageSize);
        
            // Lấy danh sách sản phẩm
            $listsp = $this->model->timKiemSanPham($keyword, $pageNum, $pageSize, $sort, $order);
        
            // Tiêu đề trang và nội dung view
            $tittlePage = "Kết quả tìm kiếm sản phẩm";
            $viewnoidung = "views/admin/timkiemSanPham.php";
        
            // Include layout view
            include "views/admin/layout.php";
        }
        
        function add_() {
            $ten_sp = trim(strip_tags($_POST['ten_sp']));
            if (empty($ten_sp)) {
                die("Tên sản phẩm không được để trống.");
            }
        
            $ngay = trim(strip_tags($_POST['ngay']));
            if (empty($ngay)) {
                die("Ngày không được để trống.");
            }
        
            $gia = (int)$_POST['gia'];
            $gia_km = (int)$_POST['gia_km'];
            if ($gia <= 0 || $gia_km <= 0) {
                die("Giá và giá khuyến mãi phải là số dương.");
            }
            if ($gia - $gia_km <= 0) {
                die("Giá phải lớn hơn giá khuyến mãi.");
            }
        
            $anhien = (int)$_POST['anhien'];
            $hot = (int)$_POST['hot'];
        
            $mota = trim($_POST['mota']);
        
            if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == 0) {
                $file_tmp = $_FILES['hinh']['tmp_name'];
                $file_name = $_FILES['hinh']['name'];
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
                if ($file_ext != 'jpg') {
                    die("Chỉ cho phép upload file .jpg.");
                }
        
                $file_path = "upload/" . uniqid() . "." . $file_ext;
        
                if (!move_uploaded_file($file_tmp, $file_path)) {
                    die("Không thể upload file.");
                }
            } else {
                die("Vui lòng chọn file ảnh.");
            }
            $id_sp = $this->model->luusanpham($ten_sp, $ngay, $gia, $gia_km, $anhien, $hot, $mota, $file_path);
            echo "Sản phẩm đã được lưu với ID: $id_sp";

            //Thêm vào header dẫn tới quản lí sản phẩm
        }
        function edit() {
            global $params;
            $id = $params['id'];
            $sp = $this -> model -> detail($id);
            $tittlePage = "Chỉnh sửa sản phẩm";
            $viewnoidung = "views/admin/sanphamsua.php";
            include "views/admin/layout.php";
        }
        
        function edit_() {
            $id_sp = (int)$_POST['id_sp'];
            
            // Kiểm tra và lấy dữ liệu từ form
            $ten_sp = trim(strip_tags($_POST['ten_sp']));
            if (empty($ten_sp)) {
                die("Tên sản phẩm không được để trống.");
            }
        
            $ngay = trim(strip_tags($_POST['ngay']));
            if (empty($ngay)) {
                die("Ngày không được để trống.");
            }
        
            $gia = (int)$_POST['gia'];
            $gia_km = (int)$_POST['gia_km'];
            if ($gia <= 0 || $gia_km <= 0) {
                die("Giá và giá khuyến mãi phải là số dương.");
            }
            if ($gia - $gia_km <= 0) {
                die("Giá phải lớn hơn giá khuyến mãi.");
            }
        
            $anhien = (int)$_POST['anhien'];
            $hot = (int)$_POST['hot'];
        
            $mota = trim($_POST['mota']);
        
            // Kiểm tra nếu có hình mới được upload
            if (isset($_FILES['hinh']) && $_FILES['hinh']['error'] == 0) {
                $file_tmp = $_FILES['hinh']['tmp_name'];
                $file_name = $_FILES['hinh']['name'];
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
                if ($file_ext != 'jpg') {
                    die("Chỉ cho phép upload file .jpg.");
                }
        
                $file_path = "upload/" . uniqid() . "." . $file_ext;
        
                // Di chuyển file tải lên vào thư mục đích
                if (!move_uploaded_file($file_tmp, $file_path)) {
                    die("Không thể upload file.");
                }
            } else {
                // Nếu không có hình mới, giữ nguyên hình cũ
                $file_path = $_POST['hinh_cu'];  // Lấy từ input hidden hinh_cu
            }
        
            // Cập nhật sản phẩm vào database
            $this->model->capnhatsanpham($id_sp, $ten_sp, $ngay, $gia, $gia_km, $anhien, $hot, $mota, $file_path);
        
            echo "Sản phẩm đã được cập nhật với ID: $id_sp";
        }
        
        function delete()  {echo "<h1>Xoa</h1>";}
        function detail()  {echo "<h1>Chi tiet</h1>";}
        function checkLoginAdmin(){        
            if (isset($_SESSION['vaitro'])==false || $_SESSION['vaitro']!=1){
                $_SESSION['back'] =  $_SERVER['REQUEST_URI'];
                header("location:". ROOT_URL."admin/login");
                exit();
            }
        }
        

        }


