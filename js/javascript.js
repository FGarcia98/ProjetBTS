
var repet = setInterval(affiche_heure,1000)

function affiche_heure()
{
    var ladate=new Date()
    
    var h=ladate.getHours();
    if (h<10) 
    {
        h = "0" + h
    }

    var m=ladate.getMinutes();

    if (m<10) 
    {
        m = "0" + m
    }
    
    var s=ladate.getSeconds();
    
    if (s<10) 
    {
        s = "0" + s
    }


document.getElementById("zone_api").innerHTML = "Heure : " +h+ ":" +m+ ":" +s;
}