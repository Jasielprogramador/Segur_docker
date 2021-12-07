
function email(mail) { 
    var emaitza=false;
    const res = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (res.test(mail)){
        emaitza=true;
    } else {
        alert ("emaila txarto idatzita dago");
    }
    return emaitza;
}

function izena(izen){
    var emaitza = false;
    if (/[a-zA-Z]/.test(izen)){
        emaitza=true;
    }
    else{
        window.alert("izena gaizki dago");
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

function pasahitza(pas){
    var expresio=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,}$/;
    var emaitza = false;
    if(expresio.test (pas) == true){
        emaitza = true;
    }
    else{
        window.alert("pasahitza txarto dago");
    }
    return emaitza;
}
function konprobatu() { 

    alert("ass");

    var denbora = "<?php echo time();?>";
    alert(denbora);
	document.cookie = "loggedin_time"+denbora

    var dni = document.getElementById("nan").value;
    var emaila = document.getElementById("email").value;
    var tel = document.getElementById("telefonoa").value;
    var iz = document.getElementById("izena").value;
    var pas = document.getElementById("pasahitza").value;
    
    if(izena(iz) && nan(dni) && email(emaila) && telefono(tel) && pasahitza(pas)){
        document.erregistroa.submit();
    }
    else{
        location.href = "logins.php?izena="+iz;
    }
    


}