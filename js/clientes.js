$(document).on("ready", inicio);
function inicio(){
	listaFactura();
	$('#clickFacturas').on('click', listaFactura);
    $('#clickNotas').on('click', listaNotas);
    $('#clickRetenciones').on('click', listaRetenciones);
	//alert("sd");
}

//Facturas
function listaFactura(){
    console.log("listaFactura");
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("datosFactura").innerHTML=xmlhttp.responseText;
        }
    }
    if (document.getElementById("desde").value==''&&document.getElementById("hasta").value=='') {
        xmlhttp.open("POST","../js/procesos/listaFacturas.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("ced="+document.getElementById("cedu").value+"&tipo=1");
    }
    if (document.getElementById("desde").value!=''&&document.getElementById("hasta").value!='') {
        xmlhttp.open("POST","../js/procesos/listaFacturasFecha.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("ced="+document.getElementById("cedu").value
            +"&tipo=1"
            +"&desde="+document.getElementById("desde").value
            +"&hasta="+document.getElementById("hasta").value);
    }
    else{
        document.getElementById("datosFactura").innerHTML="<div class='uk-alert uk-alert-danger'>Por favor llene los campos Correctamente</div>";
    }
}

//Notas
function listaNotas(){
    console.log("listaNotas");
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("datosFactura").innerHTML=xmlhttp.responseText;
        }
    }
    if (document.getElementById("desde").value==''&&document.getElementById("hasta").value=='') {
        xmlhttp.open("POST","../js/procesos/listaFacturas.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("ced="+document.getElementById("cedu").value
            +"&tipo=2");
    }
    if (document.getElementById("desde").value!=''&&document.getElementById("hasta").value!='') {
        xmlhttp.open("POST","../js/procesos/listaFacturasFecha.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("ced="+document.getElementById("cedu").value
            +"&tipo=2"
            +"&desde="+document.getElementById("desde").value
            +"&hasta="+document.getElementById("hasta").value);
    }
    else{
        document.getElementById("datosFactura").innerHTML="<div class='uk-alert uk-alert-danger'>Por favor llene los campos Correctamente</div>";
    }
}

//Facturas
function listaRetenciones(){
    console.log("listaRetenciones");
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("datosFactura").innerHTML=xmlhttp.responseText;
        }
    }
    if (document.getElementById("desde").value==''&&document.getElementById("hasta").value=='') {
        xmlhttp.open("POST","../js/procesos/listaFacturas.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("ced="+document.getElementById("cedu").value
            +"&tipo=3");
    }
    if (document.getElementById("desde").value!=''&&document.getElementById("hasta").value!='') {
        xmlhttp.open("POST","../js/procesos/listaFacturasFecha.php",true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("ced="+document.getElementById("cedu").value
            +"&tipo=3"
            +"&desde="+document.getElementById("desde").value
            +"&hasta="+document.getElementById("hasta").value);
    }
    else{
        document.getElementById("datosFactura").innerHTML="<div class='uk-alert uk-alert-danger'>Por favor llene los campos Correctamente</div>";
    }
}

//Generar XML
function generarXml(idXml){
    window.location.href = "../js/procesos/generarXml.php?claveFac="+idXml;
}

//GenerarPdf
function generarPdf(idFac){
    window.location.href = "../js/procesos/generarPdf.php?claveFac="+idFac;
    //windows.open("190.152.90.95/var/lib/tomcat7/webapps/anexos/docs_electronicos/pdfs/2708201504109172885700120000000000000000053034429.pdf", 'resizable,scrollbars');
    /*window.open("../../js/procesos/pdfFactura.php?idFac="+idFac
        +"&id="+document.getElementById("id").value);
    console.log(idFac);*/
}