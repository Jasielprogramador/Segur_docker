function nan(dni) {
    var zenbaki
    var letr
    var letra
    var expresio_erregularra
    var ema=false;
   
    expresio_erregularra = /^\d{8}[a-zA-Z]$/;
   
    if(expresio_erregularra.test (dni) == true){
        zenbaki = dni.substr(0,dni.length-1);
       letr = dni.substr(dni.length-1,1);
       zenbaki = zenbaki % 23;
       letra='TRWAGMYFPDXBNJZSQVHLCKET';
       letra=letra.substring(zenbaki,zenbaki+1);
      if (letra!=letr.toUpperCase()) {
         window.alert ('NAN-a gaizki dago');
       }else{
           ema=true;
       }
    }else{
       window.alert ('NAN-a gaizki dago, formatuak ez du balio');
    }
    return ema;
}

function email(mail) { 
    var ema=false;
    if (/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(mail)){
        ema=true;
    } else {
        alert ("emaila txarto jarrita dago");
    }
    return ema;
}
function nan(nan) { //LDAP-ak 6 zenbaki dituela konprobatzen duen metodoa 
    var ema=false;
    if(nan.length==6){
        ema=true;
    }else{
        alert ("LDAP-ak 6 zenbaki izan behar ditu.");
    }
    return ema;
}
function telefono(tel) { //telefonoak 9 zenbaki dituela konprobatzen duen metodoa 
    var ema=false;
    if(tel.length==9){
        ema=true;
    }else{
        alert ("Telefonoak 9 zenbaki izan behar ditu.");
    }
    return ema;
}
function konprobaketa() { //erregistro orrian sartutako datuen konprobaketa guztiak egiten dituen funtzioa, dena formatu egokian egotekotan submit egiten duen metodoa

    var dni = document.getElementById("NAN").value;
    var mail = document.getElementById("mail").value;
    var ldap = document.getElementById("LDAP").value;
    var tel = document.getElementById("tel").value;
    if(nan(dni) && email(mail) && LDAP(ldap) && telefono(tel)){
        document.erregistroForm.submit();
    }
}
function konprobaketa2() {  //profileko orrian sartutako datuen konprobaketa guztiak egiten dituen funtzioa, dena formatu egokian egotekotan submit egiten duen metodoa

    var dni = document.getElementById("NAN2").value;
    var mail = document.getElementById("mail2").value;
    var tel = document.getElementById("tel2").value;
    if(nan(dni) && email(mail) && telefono(tel)){    
        document.profilaForm.submit();
    }
}