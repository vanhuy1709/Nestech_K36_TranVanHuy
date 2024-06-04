function nhietdo(){
    let c = prompt("Nhập độ °C hiện tại: ")
    let f = prompt("Nhập độ °F hiện tại: ")

    c = (f-32)*5/9
    f = c*9/5+32

    
    document.write("Nhiệt độ: "+ c+ "°C" )
    document.write("</br>")
    document.write("Nhiệt độ: "+f + "°F"  )
}