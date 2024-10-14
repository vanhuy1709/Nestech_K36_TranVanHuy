<?php 
class database {
protected $conn = null;
function __construct(){
try { 
    $str = "mysql:host=".DB_HOST."; dbname=".DB_NAME.";charset=utf8; port=3306";
    $this-> conn = new PDO($str, DB_USER, DB_PASS);
    } 
    catch(PDOException $e){ die("Lỗi kết nối db: ". $e->getMessage()); }
}
function query($sql) { // lấy list record
try { 
    $result = $this-> conn->query($sql); 
    return $result; 
}
    catch (Exception $e){die("Lỗi truy vấn data:".$e->getMessage()."<br>".$sql) ; }
}
function queryOne($sql) { // lấy 1 record
try { 
    $kq = $this->conn->query($sql); 
    return $kq->fetch(); 
}
catch (Exception $e){ die("Lỗi lấy record: ".$e->getMessage()."<br>".$sql) ;}
}
}//class database