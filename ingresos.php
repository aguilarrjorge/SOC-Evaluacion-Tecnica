<?php
    include "database.php";
    $dbConn =  connect();
?>


<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="imagen/favicon.png">
    <title>SOC Asesores Hipotecarios</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">
    
    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>


<body style="background-color: #F0EBF8; margin: 50px">

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">   
            <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="imagen/favicon.png" alt=""> SOC Asesores Hipotecarios</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                <a class="nav-link" href="solicitantes.php">Solicitantes</a>
                <a class="nav-link" href="ingresos.php">Ingresos</a>
                <a class="nav-link" href="pedidos.php">pedidos</a>
                </div>
            </div>
            </div>
        </nav>
    </div>


    <!--Cuerpo lista-->
    <div class="container" id="list_solicitante">
        <table class="table caption-top">            
            <thead>
            <tr>
                <th scope="col">SOLICITANTE</th>
                <th scope="col">EMPRESA</th>
                <th scope="col">COMPROBANTE DE INGRESOS</th>
                <th scope="col">SALARIO BRUTO MENSUAL</th>
                <th scope="col">SALARIO NETO MENSUAL</th>
                <th scope="col">TIPO DE EMPLEO</th>
                <th scope="col">FECHA DE INICIO</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT *FROM ingresos";
                    
                    if($result = mysqli_query($dbConn,$sql))
                    {
                      while($row= mysqli_fetch_assoc($result))
                      {
                        $nombre_completo="";
                        $sql_nombre_solicitante = "SELECT *fROM solicitantes where id=".$row['id_solicitante']."";
                        if($result_nombre_solicitante = mysqli_query($dbConn,$sql_nombre_solicitante))
                        {
                            while($row_nombre_solicitante= mysqli_fetch_assoc($result_nombre_solicitante))
                            {
                                $nombre_completo = $row_nombre_solicitante['nombre']." ".$row_nombre_solicitante['apellidos'];
                            }
                        }

                        echo "<tr>";
                        echo "<td>".$nombre_completo."</td>";                        
                        echo "<td>".$row['empresa']."</td>";
                        echo "<td>".$row['tipo_comprobante_ingresos']."</td>";
                        echo" <td>".$row['salario_bruto_mensual']."</td>";
                        echo "<td>".$row['salario_neto_mensual']."</td>";
                        echo "<td>".$row['tipo_empleo']."</td>";
                        echo "<td>".$row['fecha_inicio']."</td>";
                        echo "</tr>";

                      }
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <!--Cuerpo Formulario-->
    <div class="container" style="display: none;" id="agrega_solicitante">
        <br><strong>FORMULARIO QUE AGREGA SOLICITANTE</strong><br><br>
        <form class="row g-3" action="agrega_solicitante.php" method="post">
            <div class="col-md-6">
                <strong>NOMBRE*:</strong>
                <input type="text" class="form-control" name="nombre" required>
            </div>

            <div class="col-md-6">
                <strong>APELLIDOS*:</strong>
                <input type="text" class="form-control" name="apellidos" required>
            </div>

            <div class="col-md-4">
                <strong>EDAD*:</strong>
                <input type="number" class="form-control" name="edad" required>
            </div>

            <div class="col-md-4">
                <strong>FECHA DE NACIMIENTO*:</strong>
                <input type="date" class="form-control" name="fecha_nacimiento" required>
            </div>

            <div class="col-md-4">
                <strong>SEXO*:</strong>
                <select name="sexo" class="form-select">
                    <option selected value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                </select>
            </div>

            <div class="col-6">
            <a href="https://www.gob.mx/curp/" target="_blank">¿Consulta tu CURP?</a> <br>
            <strong>CURP*:</strong>            
            <input type="text" class="form-control" name="curp" required>
            </div>
            <div class="col-6"><br> 
            <strong>CORREO*:</strong>
            <input type="email" class="form-control" name="correo" required>
            </div>
            
            <div class="col-12">
                <button class="btn btn-danger" id="button_cancelar">Cancelar</button>
                <button class="btn btn-primary" id="button_guardar">Guardar</button>
            </div>
        </form>
    </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>

</body>
</html>