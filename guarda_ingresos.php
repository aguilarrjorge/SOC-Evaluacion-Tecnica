<?php
date_default_timezone_set('America/Mexico_City'); 
include "database.php";
$dbConn =  connect();

$id_solicitante = $_POST['id_solicitante'];
$empresa = $_POST['empresa'];
$comprobante_ingresos = $_POST['comprobante_ingresos'];
$salario_bruto_mensual = $_POST['salario_bruto_mensual'];
$salario_neto_mensual = $_POST['salario_neto_mensual'];
$tipo_empleo = $_POST['tipo_empleo'];
$fecha_inicio = $_POST['fecha_inicio'];
    $DateAndTime = date("Y-m-d H:i:s");
$created_at = $DateAndTime;

echo "id_solicitante: ".$id_solicitante;
echo "<br>empresa: ".$empresa;
echo "<br>comprobante_ingresos: ".$comprobante_ingresos;
echo "<br>salario_bruto_mensual: ".$salario_bruto_mensual;
echo "<br>salario_neto_mensual: ".$salario_neto_mensual;
echo "<br>tipo_empleo: ".$tipo_empleo;
echo "<br>fecha_inicio: ".$fecha_inicio;
echo "<br>created_at: ".$created_at;

$sql = "INSERT INTO ingresos(id_solicitante,empresa,tipo_comprobante_ingresos,salario_bruto_mensual,salario_neto_mensual,tipo_empleo,fecha_inicio,created_at)
	          VALUES('$id_solicitante','$empresa','$comprobante_ingresos','$salario_bruto_mensual','$salario_neto_mensual','$tipo_empleo','$fecha_inicio','$created_at')";
$result = mysqli_query($dbConn,$sql);  

if($result)
{
    header("Location: solicitantes.php");
    die();
}
else{
    echo "<br>error";
}

?>