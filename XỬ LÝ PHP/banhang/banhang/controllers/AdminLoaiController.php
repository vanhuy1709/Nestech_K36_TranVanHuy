<?php 
    require_once "models/loai.php";
    class AdminLoaiController {
        private $model = null;
        function __construct() {
            $this ->model = new loai();

        }
        function index() {
            global $params;
            $pageNum = isset($params['page'])==true? $params['page']:1;
            $pageSize = 10;
            $demLoaiSP = $this ->model -> demLoaiSP();
            $tongSoTrang = ceil($demLoaiSP/$pageSize);
            $listLoaiSP = $this -> model ->danhsachLoaiSP($pageNum, $pageSize);
            $this->checkLoginAdmin();
            $tittlePage = "Danh sách loại sản phẩm";
            $viewnoidung = "views/admin/loaisp.php";
            include "views/admin/layout.php"; 

        }
        function add() { 
            // $this->checkLoginAdmin();
            $tittlePage = "Thêm loại sản phẩm";
            $viewnoidung = "views/admin/loaispthem.php";
            include "views/admin/layout.php"; 
        }
        
        function add_() {
            $ten_loai = trim(strip_tags($_POST['ten_loai']));
            if (empty($ten_loai)) {
                die("Tên loại sản phẩm không được để trống.");
            }
        
            $thutu = (int)$_POST['thutu'];
            if ($thutu < 0) {
                die("Thứ tự phải là số dương.");
            }
        
            $anhien = (int)$_POST['anhien'];
        
            if ($this->model->isTenLoaiExists($ten_loai)) {
                die("Tên loại sản phẩm đã tồn tại.");
            }
        
            $id_loai = $this->model->luuloaisanpham($ten_loai, $thutu, $anhien);
            echo "Loại sản phẩm đã được lưu với ID: $id_loai";
        }
        
        function edit() {
            global $params;
            $id = $params['id'];
            $loai = $this->model->detail($id);
            $tittlePage = "Chỉnh sửa sản phẩm";
            $viewnoidung = "views/admin/loaispsua.php";
            include "views/admin/layout.php"; 
        }
        
        function edit_() {
            $id_loai = (int) $_POST['id_loai'];
            $ten_loai = trim(strip_tags($_POST['ten_loai']));
            if (empty($ten_loai)) {
                die("Tên loại sản phẩm không được để trống.");
            }
        
            $thutu = (int)$_POST['thutu'];
            if ($thutu < 0) {
                die("Thứ tự phải là số dương.");
            }

            $anhien = (int)$_POST['anhien'];
        

        
            $this ->model ->capnhatloai($id_loai, $ten_loai, $thutu, $anhien);
            echo "Đã cập nhật $id_loai";
        }
        
        function delete()  {
            global $params;
            $id = $params['id']; 
            $loai = $this->model->deleteLoaiSP($id);
            header("Location:".ROOT_URL."admin/loai");
        }
        function detail()  {echo "<h1>Chi tiet</h1>";}
        function checkLoginAdmin(){        
            if (isset($_SESSION['vaitro'])==false || $_SESSION['vaitro']!=1){
                $_SESSION['back'] =  $_SERVER['REQUEST_URI'];
                header("location:". ROOT_URL."admin/login");
                exit();
            }
        }
        

}
    
