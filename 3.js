function cetak_gambar(len) {
  if (len % 2 > 0) {
    console.log("Bilangan ganjil");
  } else {
    var gambar = "";
    var bin = 0
    var kel = 3
    for (let i = 1; i <= len; i++) {
      var baris = "";
      for (let j = 1; j <= len; j++) {
        if (i == 1 || i == len){
          baris = baris + " + ";
        }else if(j === bin+kel){
          baris = baris + " + "
          bin = bin + kel
        }else{
          baris = baris + " = ";
        }      
      }
      baris = baris + "\n";
      bin = 0
      gambar = gambar + baris;
    }
    console.log(gambar);
  }
}

cetak_gambar(8);
