<?php 

require_once "models/user.php"; 

class userController { 
    private $model = null; 
    public $listloai;

    function __construct() { 
        $this->model = new user();
        $this->listloai = $this->model->layDanhSachLoai(); 
    }

    function register() {  
        $titlePage = "Đăng ký thành viên"; 
        $view = "register.php"; 
        include "views/layout.php"; 
    }

    function register_() { 
        $hoten = trim(strip_tags($_POST['hoten'])); 
        $email = trim(strip_tags($_POST['email'])); 
        $matkhau = trim(strip_tags($_POST['matkhau'])); 
        $mk_mahoa = password_hash($matkhau, PASSWORD_BCRYPT); 
        $id_user = $this->model->luuuser($hoten, $email, $mk_mahoa);  
        
  
        header('Location: login');
        exit();  
    }
    
    function login() {  

        $titlePage="Đăng nhập"; 
        
         $view="login.php"; 
        
         include "views/layout.php"; 
        
        } 
        function login_() {
            $email = trim(strip_tags($_POST['email']));
            $matkhau = trim(strip_tags($_POST['matkhau']));
            $kq = $this->model->checkuser($email, $matkhau);
            
            if (is_array($kq) == true) {
                $_SESSION['id_user'] = $kq['id_user'];
                $_SESSION['hoten'] = $kq['hoten'];
                $_SESSION['email'] = $kq['email'];
                
                header('Location: '.ROOT_URL);
                exit(); 
            } else {
                echo $kq;
            }
        }
        
}

 