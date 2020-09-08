function charcountupdate(str) {
    var lng = str.length;
    if( lng<=255 )
    { 
        var str = lng + ' out of 255 characters';
        var result = str.fontcolor("green");
        document.getElementById("charcount").innerHTML = result ;
    }

    else if( lng>255 )
    {
        var str = lng + ' out of 255 characters';
        var result = str.fontcolor("red");
        document.getElementById("charcount").innerHTML = result ;
    }
}

