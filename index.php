
<!doctype html>
<html lang="es">
<head>

<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>FastBuy</title>
<link rel="stylesheet" href="css/estilos_login.css">

<!--using FontsForWeb.com-->
<link rel="stylesheet" href="css/font.css">

<!--link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"-->
<link rel="stylesheet" href="css/jquery-ui.css">
<!--link rel="stylesheet" href="/resources/demos/style.css"-->
	
<!--script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script-->
<script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery-ui.js"></script>

</head>
<body>
<h1>Formulario de Acceso</h1>

<div class="params">
	<form name="form1" id="form1" action="index.php" method="post">
		<table class="tblparams">
			<tr style="text-align:center;">
				<td>Usuario:</td>
				<td><input type="text" id="pTel" name="pTel" value="" maxlength="8" /></td>
			</tr>
			<tr style="text-align:center;">
				<td>Password:</td>
				<td><input type="text" id="pTel" name="pTel" value="" maxlength="8" /></td>
			</tr>
			<tr style="text-align:center;">
				<td rowspan='2' colspan='2'><input type="button" class="btnPrimary" value="Login"/></td>
			</tr>
		</table>

	</form>
</div>

<?php
$serverName = "localhost\SQLEXPRESS";
$connectionInfo = array( "Database"=>"FASTBUY", "UID"=>"sa", "PWD"=>"123456");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn ) {
	echo "BUENALE!!!<br />";
}else{
	echo "Conexión no se pudo establecer.<br />";
	die( print_r( sqlsrv_errors(), true));
}

?>


<script>
function enviar(){
	var vEnv = document.getElementById("pEnv");
	
	if(validar()){
		vEnv.value = "1";
		document.getElementById("form1").submit();
	}else{
		return false;
	}
	
}

function validar(){
	var vTel = document.getElementById("pTel");
	var vFecIni = document.getElementById("pFecIni");
	var vFecFin = document.getElementById("pFecFin");

	//validaciones telefono
	if (vTel.value.trim()==""){
		alert("Favor ingrese un número de teléfono!");
		return false;
	}
	if(vTel.value.trim().length != 8){
		alert("El número de teléfono debe contener 8 dígitos!");
		return false;
	}
	if(isNaN(vTel.value.trim())){
		alert("Solo puede ingresar caracteres numéricos en el campo teléfono!");
		return false;
	}
	
	//validaciones Fecha Inicio 
	if (vFecIni.value.trim()==""){
		alert("Favor ingrese la Fecha Inicio!");
		return false;
	}
	if (!isValidDate(vFecIni.value.trim())){
		alert("Fecha Inválida! \n\rPor favor ingrese nuevamente la Fecha Inicio. \n\rFormato esperado: 'dd/mm/yyyy'. ");
		return false;
	}
	
	//validaciones Fecha Final
	if (vFecFin.value.trim()==""){
		alert("Favor ingrese la Fecha Fin!");
		return false;
	}
	if (!isValidDate(vFecFin.value.trim())){
		alert("Fecha Inválida! \n\rPor favor ingrese nuevamente la Fecha Fin. \n\rFormato esperado: 'dd/mm/yyyy'. ");
		return false;
	}
	
	//todo ok!
	return true;
} 
function isValidDate(date) {
    var temp = date.split('/');
    var d = new Date(temp[1] + '/' + temp[0] + '/' + temp[2]);
	return (d && (d.getMonth() + 1) == temp[1] && d.getDate() == Number(temp[0]) && d.getFullYear() == Number(temp[2]));
}

//DatePicker
$( function() {
	$('#pFecIni').datepicker({ 	dateFormat: 'dd/mm/yy' , 
								dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], 
								dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ],
								monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
								});
	$('#pFecFin').datepicker({ 	dateFormat: 'dd/mm/yy' , 
								dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ], 
								dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ],
								monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
								});
} );

$(document).ready(function(){
	//$('#pFecIni').val('18/03/2019');
	//$('#pFecFin').val('18/03/2019');
	$('#pFecIni').datepicker("setDate",new Date());
	$('#pFecFin').datepicker("setDate",new Date());
});

</script>

</body>
</html>