var ok = true; 
function kiemTra(){
    let ten = document.getElementById("tenNV").value;
    let luongNV = document.getElementById("luongNV").value;
    let err = document.getElementById("err");
    if(ten === "" || luongNV === ""){
        err.innerHTML = "các trường không được để trống";
        ok = false;
    }else{
        err.innerHTML = "";
        ok = true;
    }
    return ok;
}

function NhanVien(ten, luongNV, heSo){
    this.ten = ten;
    this.luongNV = luongNV;
    this.heSo = heSo;
    this.thongTin = function(){
        return "Tên" + this.ten + "Lương: " +  this.luongNV + "Hệ số:" + this.heSo;
    }
}
let arrNV = [];
function luu(){
     let kt = kiemTra();
     if(kt){
        let ten = document.getElementById("tenNV").value;
        let luongNV = document.getElementById("luongNV").value;
        let heSo = document.getElementById("heSo").value;
        let nv = new NhanVien(ten, luongNV, heSo);
        arrNV.push(nv)
     }
}


function hienThi(){
    let s = "";
    let tong =0;
    for(let i = 0; i < arrNV.length; i++){
            s = s + arrNV[i].thongTin() +"<br>"
            tong = tong + (arrNV[i].luongNV * arrNV[i].heSo)
    }
    document.getElementById("ht").innerHTML = s;
    document.getElementById("tong").innerHTML = "Tong luong" + tong;
}

function nhapLai(){
    let ten = document.getElementById("tenNV").value = "";
    let luongNV = document.getElementById("luongNV").value = "";
}