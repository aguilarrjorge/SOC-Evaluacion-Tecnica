<?php
date_default_timezone_set('America/Mexico_City'); 
include "database.php";
$dbConn =  connect();

$id_solicitante = $_POST['id_solicitante'];
$calle = $_POST['calle'];
$numero_exterior = $_POST['numero_exterior'];
$numero_interior = $_POST['numero_interior'];
$colonia = $_POST['colonia'];
$codigo_postal = $_POST['codigo_postal'];
$municipio = $_POST['municipio'];
$estado = $_POST['estado'];
    $DateAndTime = date("Y-m-d H:i:s");
$created_at = $DateAndTime;

echo "id_solicitante: ".$id_solicitante;
echo "<br>calle: ".$calle;
echo "<br>numero_exterior: ".$numero_exterior;
echo "<br>numero_interior: ".$numero_interior;
echo "<br>colonia: ".$colonia;
echo "<br>codigo_postal: ".$codigo_postal;
echo "<br>municipio: ".$municipio;
echo "<br>estado: ".$estado;
echo "<br>created_at: ".$created_at;

$sql = "INSERT INTO domicilios(id_solicitante,calle,numero_ext,numero_int,colonia,codigo_postal,municipio,estado,created_at)
	          VALUES('$id_solicitante','$calle','$numero_exterior','$numero_interior','$colonia','$codigo_postal','$municipio','$estado','$created_at')";
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