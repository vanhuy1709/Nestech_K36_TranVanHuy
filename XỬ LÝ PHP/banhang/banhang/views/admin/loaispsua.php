<form id="frmsualoaisp" action="<?=ROOT_URL?>admin/editloai_" method="post">
    <div>
        <label>Tên loại sản phẩm</label> 
        <input class="txt" type="text" name="ten_loai" value="<?=$loai['ten_loai']?>" >
    </div>
    <div> 
        <label>Thứ tự</label> 
        <input class="txt" type="number" name="thutu" value="<?=$loai['thutu']?>">
    </div>
    <div>
        <label>Ẩn hiện</label> 
        <input type="radio" name="anhien" value="0" <?=$loai['anhien'] == 0 ? "checked" : "";?> >Ẩn 
        <input type="radio" name="anhien" value="1" <?=$loai['anhien'] == 1 ? "checked" : ""?> >Hiện 
    </div>
    <input type="hidden" name="id_loai" value="<?=$loai['id_loai']?>">
    
    <div> 
        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn cập nhật loại sản phẩm này không?')">Cập nhật loại sản phẩm</button> 
    </div>
</form>
