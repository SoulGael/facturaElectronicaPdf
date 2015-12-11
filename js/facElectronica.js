$(document).on("ready", inicio);
function inicio(){
	$('#clickCliente').on('click', ingresoCliente);
	//alert(document.getElementById("cedula").value);
}

function ingresoCliente(){
	var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            var id=xmlhttp.responseText;
            console.log(id);
            if(id=='0'){
                window.open('pags/clientes.php', '_parent');
            }
            document.getElementById("datos").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","js/procesos/ingresoCliente.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("cedula="+document.getElementById("cedula").value
        +"&tipo=1");
}