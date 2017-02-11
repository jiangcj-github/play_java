//
function uncompile(code)
{
    var s="";
    for(var i=0;i<code.length;i+=4){
        var c=0;
        c+=(code.charCodeAt(i)-97) << 12;
        c+=(code.charCodeAt(i+1)-97) << 8;
        c+=(code.charCodeAt(i+2)-97) << 4;
        c+=(code.charCodeAt(i+3)-97);
        s+=String.fromCharCode(c);
    }
    return s;
}
function compile(code)
{
    var c="";
    for(var i=0;i<code.length;i++){
        var b5=((code.charCodeAt(i) & (15 << 12)) >>> 12) + 97;
        var b6=((code.charCodeAt(i) & (15 << 8)) >>> 8) + 97;
        var b7=((code.charCodeAt(i) & (15 << 4)) >>> 4) + 97;
        var b8=(code.charCodeAt(i) & 15) + 97;
        c+=String.fromCharCode(b5)+String.fromCharCode(b6)+String.fromCharCode(b7)+String.fromCharCode(b8);
    }
    return c;
}