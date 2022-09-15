<?php

$id = $_GET['id'];

echo "ID agente: ".$id;

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
                <a class="nav-link" aria-current="page" href="index.html">Home</a>
                <a class="nav-link" href="solicitantes.php">Solicitantes</a>
                <a class="nav-link" href="#">Pricing</a>
                <a class="nav-link disabled">Disabled</a>
                </div>
            </div>
            </div>
        </nav>
    </div>



    
    <!--Cuerpo Formulario-->
    <div class="container" id="agrega_solicitante">
        <br><strong>FORMULARIO QUE AGREGA INGRESOS A SOLICITANTE</strong><br><br>
        <form class="row g-3" action="guarda_ingresos.php" method="post">
            <div class="col-md-6">
            <input name="id_solicitante" type="hidden" value="<?php echo "".$id; ?>">
                <strong>EMPRESA*:</strong>
                <input type="text" class="form-control" name="empresa" style="text-transform:uppercase;" required>
            </div>

            <div class="col-md-6">
                <strong>COMPROBANTE DE INGRESOS*:</strong>
                <input type="text" class="form-control" name="comprobante_ingresos" style="text-transform:uppercase;" required>
            </div>

            <div class="col-md-4">
                <strong>SALARIO BRUTO MENSUAL*:</strong>
                <input type="number" class="form-control" name="salario_bruto_mensual" required>
            </div>

            <div class="col-md-4">
                <strong>SALARIO NETO MENSUAL*:</strong>
                <input type="number" class="form-control" name="salario_neto_mensual" required>
            </div>

            <div class="col-md-4">
                <strong>TIPO DE EMPLEO*:</strong>
                <input type="text" class="form-control" name="tipo_empleo" style="text-transform:uppercase;" required>
            </div>

            <div class="col-md-4">
                <strong>FECHA DE INICIO*:</strong>
                <input type="date" class="form-control" name="fecha_inicio" required>
            </div>
          
            <div class="col-12">
                <a href="solicitantes.php" class="btn btn-danger" id="button_cancelar">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>

</body>
</html>