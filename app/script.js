function email(mail) { 
    var ema=false;
    if (/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(mail)){
        ema=true;
    } else {
        alert ("emaila txarto idatzita dago");
    }
    return ema;
}

function jaiotzeData(jaioData) { 
    const jd = /[0-9]{4}[/]{1}[0-9]{2}[/]{1}[0-9]{2}/;
    if (!jd.test(jaioData)){
        jdKon = 0;
    }
}

function nan(dni) {
    var zenbakia
    var letra_una
    var letra_muchas
    var expresio_erregularra
    var ema=false;
   
    expresio_erregularra = /^\d{8}[a-zA-Z]$/;
   
    if(expresio_erregularra.test (dni) == true){
        zenbakia = dni.substr(0,dni.length-1);
       letra_una = dni.substr(dni.length-1,1);
       zenbakia = zenbakia % 23;
       letra_muchas='TRWAGMYFPDXBNJZSQVHLCKET';
       letra_muchas=letra_muchas.substring(zenbaki,zenbaki+1);
      if (letra!=letra_una.toUpperCase()) {
         window.alert ('NAN-a gaizki dago');
       }else{
           ema=true;
       }
    }else{
       window.alert ('nan-a gaizki dago');
    }
    return ema;
}

function telefono(tel) {
    var ema=false;
    if(tel.length==9){
        ema=true;
    }else{
        alert ("Telefonoa 9 zenbakiz osatuta egon behar da");
    }
    return ema;
}
function konprobatu() { 

    var dni = document.getElementById("nan").value;
    var email = document.getElementById("email").value;
    var jD = document.getElementById("jaiotzeData").value;
    var tel = document.getElementById("telefonoa").value;
    
    if(nan(dni) && email(email) && jaiotzeData(jD) && telefono(tel)){
        document.erregistroa.submit();
    }

}