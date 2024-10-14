<form id="frmthemloaisp" action="<?=ROOT_URL?>admin/addloai_" method="post">
    <div><label>Tên loại sản phẩm</label>
        <input class="txt" type="text" name="ten_loai">
    </div>
    <div><label>Thứ tự</label>
        <input class="txt" type="number" name="thutu">
    </div>
    <div><label>Tên loại sản phẩm</label>
    <input type="radio" name="anhien" value="0" > Ẩn 
    <input type="radio" name="anhien" value="1" checked> Hiện 
    </div>
    <div>
        <button type="submit">Thêm loại sản phẩm</button>
    </div>
</form>