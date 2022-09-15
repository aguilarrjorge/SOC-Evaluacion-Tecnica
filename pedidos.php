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
            <caption>Lista de Pedidos 
                <button type="button" class="btn btn-link" id="button_agregar">Agregar</button>
            </caption> 
            
            <thead>
            <tr>
                <th scope="col">SOLICITANTE</th>
                <th scope="col">FECHA DE REGISTRO</th>
                <th scope="col">DESTINO</th>
                <th scope="col">MONTO SOLICITADO</th>
                <th scope="col">PLAZO EN AÑOS</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT *FROM pedidos";
                    
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
                        echo "<td>".$row['fecha_registro']."</td>";
                        echo "<td>".$row['destino']."</td>";
                        echo" <td>".$row['monto_solicitado']."</td>";
                        echo "<td>".$row['plazo']."</td>";
                        echo "</tr>";

                      }
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <!--Cuerpo Formulario-->
    <div class="container" style="display: none;" id="agrega_solicitante">
        <br><strong>FORMULARIO QUE AGREGA PEDIDOSS</strong><br><br>
        <form class="row g-3" action="agrega_pedido.php" method="post">
            <div class="col-md-4">
                <strong>SOLICITANTE*:</strong>
                <select name="solicitante" class="form-select" required>
                <option selected value="">Elije un solicitante</option>
                    <?php
                        $sql = "SELECT *FROM solicitantes";
                         
                        if($result = mysqli_query($dbConn,$sql))
                        {
                        while($row= mysqli_fetch_assoc($result))
                        {
                            echo "<option value='".$row['id']."'>".$row['nombre']." ".$row['apellidos']."</option>";
                        }
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-4">
                <strong>FECHA DE REGISTRO*:</strong>
                <input type="date" class="form-control" name="fecha_registro" required>
            </div>

            <div class="col-md-4">
                <strong>DESTINO*:</strong>
                <select name="destino" class="form-select">
                    <option selected value="CASA">Casa</option>
                    <option value="AUTO">Auto</option>
                    <option value="PRESTAMO">Prestamo</option>
                    <option value="TARJETA DE CREDITO">Tarjeta de Credito</option>
                </select>
            </div>

            <div class="col-md-6">
                <strong>MONTO SOLICITADO*:</strong>
                <input type="number" class="form-control" name="monto_solicitado" required>
            </div>

            <div class="col-md-6">
                <strong>PLAZO*:</strong>
                <select name="plazo" class="form-select">
                    <option selected value="1 Años">1 Año</option>
                    <option value="2">2 Años</option>
                    <option value="3">3 Años</option>
                    <option value="4">4 Años</option>
                    <option value="5">5 Años</option>
                    <option value="6">6 Años</option>
                    <option value="7">7 Años</option>
                    <option value="8">8 Años</option>
                    <option value="9">9 Años</option>
                    <option value="10">10 Años</option>
                </select>
            </div>

            
            <div class="col-12">
                <button class="btn btn-danger" id="button_cancelar">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="button_guardar">Guardar</button>
            </div>
        </form>
    </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>

</body>
</html>