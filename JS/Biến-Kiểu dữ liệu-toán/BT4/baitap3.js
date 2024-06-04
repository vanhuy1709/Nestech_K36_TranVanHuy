function hinhtron(){
    let bankinh = prompt("Hãy nhập bán kình hình tròn: ")
    let duongkinh = prompt("Hãy nhập đường kính hình tròn: " + bankinh*2)
    let dientich = Math.PI* Math.pow(bankinh,2)
    let chuvi = Math.PI* duongkinh
    

    document.write("Diện tích hình tròn là: "+ dientich)
    document.write("</br>")
    document.write("Chu vi hình tròn là: "+ chuvi)
}