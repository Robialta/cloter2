function urutKata(string){
    var arnumbers = string.match(/\d+/g)
    var arstr = string.split(' ')
    for (var i = 1; i < arnumbers.length; i++){
        for (var j = 0; j < i; j++){
            if (arnumbers[i] < arnumbers[j]) {
            var x = arnumbers[i];
            var s = arstr[i]
            arnumbers[i] = arnumbers[j];
            arstr[i] = arstr[j];
            arnumbers[j] = x;
            arstr[j] = s;
            }
        }
    }
    console.log(arstr.join(' '))
}


urutKata("ta3hun menjela2ng se1lamat b4aru")




       