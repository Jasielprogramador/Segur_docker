function email(mail) { 
    var emaitza=false;
    if (/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(mail)){
        emaitza=true;
    } else {
        alert ("emaila txarto idatzita dago");
    }
    return emaitza;
}

function nan(dni) {

    var emaitza=false;
    expresio = /^\d{8}[a-zA-Z]$/;
   
    if(expresio.test (dni) == true){
        var zenbakia = dni.substr(0,dni.length-1);
        var letra = dni.substr(dni.length-1,1);
        var letras='TRWAGMYFPDXBNJZSQVHLCKET';
        zenbakia = zenbakia % 23;
        letras=letras.substring(zenbakia,zenbakia+1);

        if (letras==letra.toUpperCase()) {
            emaitza=true;
        }else{
            window.alert ('nan-a gaizki dago');
        }

    }else{
        window.alert ('nan-a gaizki dago');
    }

    return emaitza;
}

function telefono(tel) {
    var emaitza=false;
    if(tel.length==9){
        emaitza=true;
    }else{
        alert ("Telefonoa 9 zenbakiz osatuta egon behar da");
    }
    return emaitza;
}
function konprobatu() { 

    var dni = document.getElementById("nan").value;
    var emaila = document.getElementById("email").value;
    var tel = document.getElementById("telefonoa").value;
    
    if(nan(dni) && email(emaila) && telefono(tel)){
        document.erregistroa.submit();
    }

}