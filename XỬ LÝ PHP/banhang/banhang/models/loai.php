<?php 
require_once "database.php";
class loai extends database{
    // function detail( $id_loai = 0){
    //     $sql = "SELECT * FROM loai WHERE id_loai=$id_loai";
    //     return $this -> queryOne($sql);
    // }
    function detail( $id_loai = 0){ 
        $sql = "SELECT * FROM loai WHERE id_loai=$id_loai"; 
        return $this -> queryOne($sql);
    }
    function luuloaisanpham($ten_loai, $thutu, $anhien){
        $sql = "INSERT INTO loai SET ten_loai=:ten_loai, thutu=:thutu, anhien=:anhien";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> bindParam(":ten_loai",$ten_loai, PDO::PARAM_STR);
        $stmt -> bindParam(":thutu",$thutu, PDO::PARAM_INT);
        $stmt -> bindParam(":anhien",$anhien, PDO::PARAM_INT);
        $stmt -> execute();
        $id_loai = $this ->conn->lastInsertID();
        return $id_loai;
    }
    function isTenLoaiExists($ten_loai) {
        $sql = "SELECT COUNT(*) FROM loai WHERE ten_loai = :ten_loai";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ten_loai' => $ten_loai]);
        return $stmt->fetchColumn() > 0;
    }
    function capnhatloai($id_loai,$ten_loai, $thutu, $anhien){
        $sql = "UPDATE loai SET ten_loai =:ten_loai, thutu =:thutu, anhien =:anhien WHERE id_loai =:id_loai";
        $stmt = $this ->conn->prepare($sql);
        $stmt -> bindParam(":ten_loai", $ten_loai, PDO::PARAM_STR);
        $stmt -> bindParam(":thutu", $thutu, PDO::PARAM_INT);
        $stmt -> bindParam(":anhien", $anhien, PDO::PARAM_INT);
        $stmt -> bindParam(":id_loai", $id_loai, PDO::PARAM_INT);
        $stmt ->  execute();
        return true;
    }
    function isThuTuExistsExcept($thutu, $id_loai) {
        $sql = "SELECT COUNT(*) FROM loai WHERE thutu = :thutu AND id_loai != :id_loai";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['thutu' => $thutu, 'id_loai' => $id_loai]);
        return $stmt->fetchColumn() > 0;
    }
    function danhSachLoaiSP($pageNum=1, $pageSize=9){
        $startRow = ($pageNum-1)*$pageSize;
        $sql = "SELECT * FROM loai ORDER BY id_loai DESC LIMIT $startRow, $pageSize";
        return $this->query($sql);
    }
    function demLoaiSP(){
        $sql = "SELECT count(id_loai) as dem FROM loai";
        $row = $this->queryOne($sql);
        return $row['dem'];
    }
    function deleteLoaiSP($id_loai){
        $sql = "DELETE FROM loai WHERE id_loai=:id_loai";
        $stmt = $this->conn->prepare($sql);
        $stmt -> bindParam(":id_loai", $id_loai, PDO::PARAM_INT);
        $stmt ->execute();
    }
}
?>