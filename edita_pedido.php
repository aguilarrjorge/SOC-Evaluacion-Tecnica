
<?php
include "database.php";
$dbConn =  connect();

$id_pedido = $_GET['id_pedido'];

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


<!--Cuerpo Formulario-->
<div class="container" id="agrega_solicitante">
    <br><strong>FORMULARIO QUE EDITA PEDIDO</strong><br><br>
    
    <form class="row g-3" action="update_pedido.php" method="post">
    <input name="pedido_id" type="hidden" value="<?php echo "".$id_pedido; ?>">    
        <?php
            $sql = "SELECT *FROM pedidos where id=$id_pedido";
            if($result= mysqli_query($dbConn,$sql))
            {
                while($row  = mysqli_fetch_assoc($result))
                {
                    echo "<div class='col-md-4'>";
                        echo "<strong>SOLICITANTE*:</strong>";
                        echo "<select name='solicitante' class='form-select' required>";
                        echo "<option selected value='".$row['id_solicitante']."'>Elije un solicitante</option>";
                            
                                $sql_solicitante = 'SELECT *FROM solicitantes';
                                
                                if($result_solicitante = mysqli_query($dbConn,$sql_solicitante))
                                {
                                    while($row_solicitante= mysqli_fetch_assoc($result_solicitante))
                                    {
                                        echo "<option value='".$row_solicitante['id']."'>".$row_solicitante['nombre']." ".$row_solicitante['apellidos']."</option>";
                                    }
                                }
                        echo "</select>";
                    echo "</div>";

                            echo "<div class='col-md-4'>";
                                echo "<strong>FECHA DE REGISTRO*:</strong>";
                                echo "<input type='date' class='form-control' name='fecha_registro' value=".$row['fecha_registro'].">";
                            echo "</div>";

                            echo "<div class='col-md-4'>";
                                echo "<strong>DESTINO*:</strong>";
                                echo "<select name='destino' class='form-select'>";
                                    echo "<option selected value='".$row['destino']."'>".$row['destino']."</option>";
                                    if($row['destino'] == "CASA" )
                                    {
                                        echo "<option value='AUTO'>AUTO</option>";
                                        echo "<option value='PRESTAMO'>PRESTAMO</option>";
                                        echo "<option value='TARJETA DE CREDITO'>TARJETA DE CREDITO</option>";    
                                    }
                                    if($row['destino'] == "AUTO" )
                                    {
                                        echo "<option value='CASA'>CASA</option>";
                                        echo "<option value='PRESTAMO'>PRESTAMO</option>";
                                        echo "<option value='TARJETA DE CREDITO'>TARJETA DE CREDITO</option>";    
                                    }
                                    if($row['destino'] == "PRESTAMO" )
                                    {
                                        echo "<option value='AUTO'>AUTO</option>";
                                        echo "<option value='CASA'>CASA</option>";
                                        echo "<option value='TARJETA DE CREDITO'>TARJETA DE CREDITO</option>";    
                                    }
                                    if($row['destino'] == "TARJETA DE CREDITO" )
                                    {
                                        echo "<option value='AUTO'>AUTO</option>";
                                        echo "<option value='PRESTAMO'>PRESTAMO</option>";
                                        echo "<option value='CASA'>CASA</option>";    
                                    }
                                   /* echo "<option value='AUTO'>Auto</option>";
                                    echo "<option value='PRESTAMO'>Prestamo</option>";
                                    echo "<option value='TARJETA DE CREDITO'>Tarjeta de Credito</option>";*/
                                echo "</select>";
                            echo "</div>";

                            echo "<div class='col-md-6'>";
                                echo "<strong>MONTO SOLICITADO*:</strong>";
                                echo "<input type='number' class='form-control' name='monto_solicitado' value=".$row['monto_solicitado'].">";
                            echo "</div>";

                            echo "<div class='col-md-6'>";
                                echo "<strong>PLAZO*:</strong>";
                                echo "<select name='plazo' class='form-select'>";
                                    echo "<option selected value='".$row['plazo']." Años'>".$row['plazo']."</option>";
                                    if ($row['plazo']== 1) {
                                        echo "<option value='2'>2 Años</option>";
                                        echo "<option value='3'>3 Años</option>";
                                        echo "<option value='4'>4 Años</option>";
                                        echo "<option value='5'>5 Años</option>";
                                        echo "<option value='6'>6 Años</option>";
                                        echo "<option value='7'>7 Años</option>";
                                        echo "<option value='8'>8 Años</option>";
                                        echo "<option value='9'>9 Años</option>";
                                        echo "<option value='10'>10 Años</option>";
                                    }
                                    if ($row['plazo']== 2) {
                                        echo "<option value='1'>1 Años</option>";
                                        echo "<option value='3'>3 Años</option>";
                                        echo "<option value='4'>4 Años</option>";
                                        echo "<option value='5'>5 Años</option>";
                                        echo "<option value='6'>6 Años</option>";
                                        echo "<option value='7'>7 Años</option>";
                                        echo "<option value='8'>8 Años</option>";
                                        echo "<option value='9'>9 Años</option>";
                                        echo "<option value='10'>10 Años</option>";
                                    }
                                    if ($row['plazo']== 3) {
                                        echo "<option value='1'>1 Años</option>";
                                        echo "<option value='2'>2 Años</option>";
                                        echo "<option value='4'>4 Años</option>";
                                        echo "<option value='5'>5 Años</option>";
                                        echo "<option value='6'>6 Años</option>";
                                        echo "<option value='7'>7 Años</option>";
                                        echo "<option value='8'>8 Años</option>";
                                        echo "<option value='9'>9 Años</option>";
                                        echo "<option value='10'>10 Años</option>";
                                    }
                                    if ($row['plazo']== 4) {
                                        echo "<option value='1'>1 Años</option>";
                                        echo "<option value='2'>2 Años</option>";
                                        echo "<option value='3'>3 Años</option>";
                                        echo "<option value='5'>5 Años</option>";
                                        echo "<option value='6'>6 Años</option>";
                                        echo "<option value='7'>7 Años</option>";
                                        echo "<option value='8'>8 Años</option>";
                                        echo "<option value='9'>9 Años</option>";
                                        echo "<option value='10'>10 Años</option>";
                                    }
                                    if ($row['plazo']== 5) {
                                        echo "<option value='1'>1 Años</option>";
                                        echo "<option value='2'>2 Años</option>";
                                        echo "<option value='3'>3 Años</option>";
                                        echo "<option value='4'>4 Años</option>";
                                        echo "<option value='6'>6 Años</option>";
                                        echo "<option value='7'>7 Años</option>";
                                        echo "<option value='8'>8 Años</option>";
                                        echo "<option value='9'>9 Años</option>";
                                        echo "<option value='10'>10 Años</option>";
                                    }
                                    if ($row['plazo']== 6) {
                                        echo "<option value='1'>1 Años</option>";
                                        echo "<option value='2'>2 Años</option>";
                                        echo "<option value='3'>3 Años</option>";
                                        echo "<option value='4'>4 Años</option>";
                                        echo "<option value='5'>5 Años</option>";
                                        echo "<option value='7'>7 Años</option>";
                                        echo "<option value='8'>8 Años</option>";
                                        echo "<option value='9'>9 Años</option>";
                                        echo "<option value='10'>10 Años</option>";
                                    }
                                    if ($row['plazo']== 7) {
                                        echo "<option value='1'>1 Años</option>";
                                        echo "<option value='2'>2 Años</option>";
                                        echo "<option value='3'>3 Años</option>";
                                        echo "<option value='4'>4 Años</option>";
                                        echo "<option value='5'>5 Años</option>";
                                        echo "<option value='6'>6 Años</option>";                                        
                                        echo "<option value='8'>8 Años</option>";
                                        echo "<option value='9'>9 Años</option>";
                                        echo "<option value='10'>10 Años</option>";
                                    }
                                    if ($row['plazo']== 8) {
                                        echo "<option value='1'>1 Años</option>";
                                        echo "<option value='2'>2 Años</option>";
                                        echo "<option value='3'>3 Años</option>";
                                        echo "<option value='4'>4 Años</option>";
                                        echo "<option value='5'>5 Años</option>";
                                        echo "<option value='6'>6 Años</option>";                                        
                                        echo "<option value='7'>7 Años</option>";
                                        echo "<option value='9'>9 Años</option>";
                                        echo "<option value='10'>10 Años</option>";
                                    }
                                    if ($row['plazo']== 9) {
                                        echo "<option value='1'>1 Años</option>";
                                        echo "<option value='2'>2 Años</option>";
                                        echo "<option value='3'>3 Años</option>";
                                        echo "<option value='4'>4 Años</option>";
                                        echo "<option value='5'>5 Años</option>";
                                        echo "<option value='6'>6 Años</option>";                                        
                                        echo "<option value='7'>7 Años</option>";
                                        echo "<option value='8'>8 Años</option>";
                                        echo "<option value='10'>10 Años</option>";
                                    }
                                    if ($row['plazo']== 10) {
                                        echo "<option value='1'>1 Años</option>";
                                        echo "<option value='2'>2 Años</option>";
                                        echo "<option value='3'>3 Años</option>";
                                        echo "<option value='4'>4 Años</option>";
                                        echo "<option value='5'>5 Años</option>";
                                        echo "<option value='6'>6 Años</option>";                                        
                                        echo "<option value='7'>7 Años</option>";
                                        echo "<option value='8'>8 Años</option>";
                                        echo "<option value='9'>9 Años</option>";
                                    }
                                echo "</select>";
                            echo "</div>";
                }
            }
        ?>
        <div class="col-12">
            <a href="index.php" class="btn btn-danger" id="button_cancelar">Cancelar</a>
            <button class="btn btn-primary" id="button_guardar">Guardar</button>
        </div>
    </form>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>

</body>
</html>
