<?php
date_default_timezone_set('America/Mexico_City'); 
include "database.php";
$dbConn =  connect();

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$sexo = $_POST['sexo'];
$curp = $_POST['curp'];
$correo = $_POST['correo'];
    $DateAndTime = date("Y-m-d H:i:s");
$created_at = $DateAndTime;

echo "nombre: ".$nombre;
echo "<br>apellidos: ".$apellidos;
echo "<br>edad: ".$edad;
echo "<br>fecha_nacimiento: ".$fecha_nacimiento;
echo "<br>sexo: ".$sexo;
echo "<br>curp: ".$curp;
echo "<br>correo: ".$correo;
echo "<br>created_at: ".$created_at;

    $sql_solicitantes_count = "SELECT *fROM solicitantes";
    $result_solicitantes_count = mysqli_query($dbConn,$sql_solicitantes_count);
    $row_solicitantes_count  = mysqli_fetch_assoc($result_solicitantes_count);

    //$count ($row_solicitantes);

    if(count ($row_solicitantes_count)!= 0)
    {
        $sql_solicitantes= "SELECT *fROM solicitantes";
        if($result_solicitantes = mysqli_query($dbConn,$sql_solicitantes))
        {
            while($row_solicitantes  = mysqli_fetch_assoc($result_solicitantes))
            {
                if($row_solicitantes['curp']== $curp)
                {
                    echo'<script type="text/javascript">
                    alert("ERROR: ya existe un registro con el mismo CURP");
                    window.location.href="solicitantes.php";
                    </script>';
                }
                if($row_solicitantes['correo']== $correo)
                {
                    echo'<script type="text/javascript">
                    alert("ERROR: ya existe un registro con el mismo CORREO");
                    window.location.href="solicitantes.php";
                    </script>';
                }
                else{
                    $sql = "INSERT INTO solicitantes(nombre,apellidos,edad,fecha_nacimiento,sexo,curp,correo,created_at)
                        VALUES('$nombre','$apellidos','$edad','$fecha_nacimiento','$sexo','$curp','$correo','$created_at')";
                    $result = mysqli_query($dbConn,$sql);  
    
                    $sqlIdSolicitante="SELECT MAX(id) AS id FROM solicitantes"; //obtenemos el ultimo id del agente creado
                    $resultIdSolicitante = mysqli_query($dbConn,$sqlIdSolicitante);
    
                    if ($rowIdSolicitante = mysqli_fetch_row($resultIdSolicitante)) 
                    {
                        $idMax = trim($rowIdSolicitante[0]);
                    }
    
                    if($result)
                    {
                        echo "<br>success";
                        header("Location: agrega_domicilio.php?id=$idMax");
                        die();
                    }
                    else{
                        echo "<br>error";
                    }
                }
            }
        }
    }
    else{
        $sql = "INSERT INTO solicitantes(nombre,apellidos,edad,fecha_nacimiento,sexo,curp,correo,created_at)
            VALUES('$nombre','$apellidos','$edad','$fecha_nacimiento','$sexo','$curp','$correo','$created_at')";
        $result = mysqli_query($dbConn,$sql);  

        $sqlIdSolicitante="SELECT MAX(id) AS id FROM solicitantes"; //obtenemos el ultimo id del agente creado
        $resultIdSolicitante = mysqli_query($dbConn,$sqlIdSolicitante);

        if ($rowIdSolicitante = mysqli_fetch_row($resultIdSolicitante)) 
        {
            $idMax = trim($rowIdSolicitante[0]);
        }

        if($result)
        {
            echo "<br>success";
            header("Location: agrega_domicilio.php?id=$idMax");
            die();
        }
        else{
            echo "<br>error";
        }
}
    
?>