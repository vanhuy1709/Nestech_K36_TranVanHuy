<form id="frmthemsp" action="<?=ROOT_URL?>admin/addsp_" method="post" enctype="multipart/form-data">
    <div class="haicot">
        <div><label>Tên sản phẩm</label><input class="txt" type="text" name="ten_sp"> </div>
        <div><label>Ngày</label><input class="txt" type="date" name="ngay"> </div>
    </div>

    <div class="haicot">
        <div><label>Giá</label><input class="txt" type="number" name="gia"> </div>
        <div><label>Giá KM</label><input class="txt" type="number" name="gia_km"> </div>
    </div>

    <div class="haicot">
        <div><label>Ẩn hiện</label>
        <input type="radio" name="anhien" value="0">Ẩn
        <input type="radio" name="anhien" value="1">Hiện
         </div>
        
         <div><label>Nổi bật</label>
        <input type="radio" name="hot" value="0">Bình thường
        <input type="radio" name="hot" value="1">Nổi bật
         </div>
    </div>
    <div>
        <label>Mô tả</label> <textarea class="txt" name="mota" id="mota"></textarea>
    </div>
    <div>
        <div> <label>Hình (.jpg)</label> <input class="txt" name="hinh" type="file" accept=".jpg">
    </div>
    <div>   <button type="submit">Thêm sản phẩm</button>  </div>
</form>
