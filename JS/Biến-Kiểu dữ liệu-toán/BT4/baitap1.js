function ketqua(){
    let vatly = parseInt(prompt("nhập điểm Vật Lý của bạn: "))
    let hoahoc = parseInt(prompt("nhập điểm Hóa Học của bạn: "))
    let sinhhoc = parseInt(prompt("nhập điểm Sinh Học của bạn: "))

    let trungbinh = (vatly+hoahoc+sinhhoc)/3
    let tong = trungbinh * 3
    document.write("Điểm trung bình của bạn: "+ trungbinh)
    document.write("</br>")
    document.write("Điểm tổng của bạn: "+tong)
}