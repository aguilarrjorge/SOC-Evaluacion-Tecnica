<?php
date_default_timezone_set('America/Mexico_City'); 
include "database.php";
$dbConn =  connect();

$id_pedido = $_POST['pedido_id'];
$solicitante = $_POST['solicitante'];
$fecha_registro = $_POST['fecha_registro'];
$destino = $_POST['destino'];
$monto_solicitado = $_POST['monto_solicitado'];
$plazo = $_POST['plazo'];
    $DateAndTime = date("Y-m-d H:i:s");
$created_at = $DateAndTime;

//echo "<br>id_PEDIDO: ".$id_pedido;

/*echo "solicitante: ".$solicitante;
echo "<br>fecha_registro: ".$fecha_registro;
echo "<br>destino: ".$destino;
echo "<br>monto_solicitado: ".$monto_solicitado;
echo "<br>plazo: ".$plazo;*/

    /*$sql_pedidos_solicitante = "SELECT *FROM pedidos where id_solicitante=$solicitante";

    if($result_pedidos_solicitante = mysqli_query($dbConn,$sql_pedidos_solicitante))
    {
    while($row_pedidos_solicitante= mysqli_fetch_assoc($result_pedidos_solicitante))
    {
        if ($destino == $row_pedidos_solicitante['destino']) 
        {
            $folio = $row_pedidos_solicitante['id'];
            echo "<script> alert('ERROR: ya existe un pedido con este destino: Folio ".$folio."'); window.location.href='pedidos.php'; </script>";
        }
        else
        {*/
            //VERIFICANDO LOS INGRESOS NETOS MENSUALES
                $sqlIngresos = "SELECT salario_neto_mensual from ingresos where id_solicitante=$solicitante";
                $resultIngresos = mysqli_query($dbConn,$sqlIngresos);

                $ingreso_neto_solicitante = 0;

                if($resultIngresos = mysqli_query($dbConn,$sqlIngresos))
                {
                while($rowIngresos= mysqli_fetch_assoc($resultIngresos))
                {
                    $ingreso_neto_solicitante = $ingreso_neto_solicitante + $rowIngresos['salario_neto_mensual'];
                }
                }

            $sqlEdad = "SELECT edad from solicitantes where id=$solicitante;";
            //$resultEdad = mysqli_query($dbConn,$sqlEdad);


            if($resultEdad = mysqli_query($dbConn,$sqlEdad))
            {
            while($rowEdad= mysqli_fetch_assoc($resultEdad))
            {
            $edad = $rowEdad['edad'];
            }
            }
            if ($edad >=18) 
            {
                if ($destino == "CASA") 
                {
                    if ($ingreso_neto_solicitante >= 50000) 
                    {
                        if ($monto_solicitado <= 200000) 
                        {
                           /* $sql = "INSERT INTO pedidos(id_solicitante,fecha_registro,destino,monto_solicitado,plazo,created_at)
                                VALUES('$solicitante','$fecha_registro','$destino','$monto_solicitado','$plazo','$created_at')";
                            $result = mysqli_query($dbConn,$sql);  */
                            $sqlUpdate = "UPDATE pedidos 
                            SET id_solicitante = '$solicitante', fecha_registro = '$fecha_registro', destino = '$destino',
                            monto_solicitado = '$monto_solicitado', plazo = '$plazo', created_at = '$created_at'
                                WHERE id = $id_pedido";

                            $result = mysqli_query($dbConn,$sqlUpdate);

                            if($result)
                            {

                                                               
                                echo "<script> alert('REGISTRO ACTUALIZADO!: SE HA ACTUALIZADO EL FOLIO".$id_pedido."'); window.location.href='index.php'; </script>";
                                die();
                            }
                            else{
                                echo "<br>error";
                            }
                        }
                        else{
                            echo'<script type="text/javascript">
                                    alert("ERROR: El Monto Solicitado rebasa el destino CASA: \n Monto maximo para este destino 200,000");
                                    window.location.href="pedidos.php";
                                    </script>';
                        }
                    }
                    else{
                        echo'<script type="text/javascript">
                        alert("ERROR: no cumples con el mínimo de ingresos netos para el destino CASA");
                        window.location.href="pedidos.php";
                        </script>';
                    }
                }

                if ($destino == "AUTO") 
                {
                    if ($ingreso_neto_solicitante >= 30000) 
                    {
                        if ($monto_solicitado <= 100000) 
                        {
                            /*$sql = "INSERT INTO pedidos(id_solicitante,fecha_registro,destino,monto_solicitado,plazo,created_at)
                                VALUES('$solicitante','$fecha_registro','$destino','$monto_solicitado','$plazo','$created_at')";
                            $result = mysqli_query($dbConn,$sql);  */

                            $sqlUpdate = "UPDATE pedidos 
                            SET id_solicitante = '$solicitante', fecha_registro = '$fecha_registro', destino = '$destino',
                            monto_solicitado = '$monto_solicitado', plazo = '$plazo', created_at = '$created_at'
                                WHERE id = $id_pedido";

                            $result = mysqli_query($dbConn,$sqlUpdate);


                            if($result)
                            {
                                                            
                                echo "<script> alert('REGISTRO ACTUALIZADO!: SE HA ACTUALIZADO EL FOLIO".$id_pedido."'); window.location.href='index.php'; </script>";
                                die();
                            }
                            else{
                                echo "<br>error";
                            }
                        }
                        else{
                            echo'<script type="text/javascript">
                            alert("ERROR: El Monto Solicitado rebasa el destino AUTO \n Monto maximo para este destino 100,000");
                            window.location.href="pedidos.php";
                            </script>';
                        }
                    }
                    else{
                        echo'<script type="text/javascript">
                        alert("ERROR: no cumples con el mínimo de ingresos netos para el destino AUTO");
                        window.location.href="pedidos.php";
                        </script>';
                    }
                }

                if ($destino == "PRESTAMO") 
                {
                    if ($ingreso_neto_solicitante >= 20000) 
                    {
                        if ($monto_solicitado <= 50000) 
                        {
                            /*$sql = "INSERT INTO pedidos(id_solicitante,fecha_registro,destino,monto_solicitado,plazo,created_at)
                                VALUES('$solicitante','$fecha_registro','$destino','$monto_solicitado','$plazo','$created_at')";
                            $result = mysqli_query($dbConn,$sql);  */

                            $sqlUpdate = "UPDATE pedidos 
                            SET id_solicitante = '$solicitante', fecha_registro = '$fecha_registro', destino = '$destino',
                            monto_solicitado = '$monto_solicitado', plazo = '$plazo', created_at = '$created_at'
                                WHERE id = $id_pedido";

                            $result = mysqli_query($dbConn,$sqlUpdate);


                            if($result)
                            {
                                echo "<script> alert('REGISTRO ACTUALIZADO!: SE HA ACTUALIZADO EL FOLIO".$id_pedido."'); window.location.href='index.php'; </script>";
                                die();
                            }
                            else{
                                echo "<br>error";
                            }
                        }
                        else{
                            echo'<script type="text/javascript">
                            alert("ERROR: El Monto Solicitado rebasa el destino PRESTAMO. \n Monto maximo para este destino 50,000");
                            window.location.href="pedidos.php";
                            </script>';
                        }
                    }
                    else{
                        echo'<script type="text/javascript">
                        alert("ERROR: no cumples con el mínimo de ingresos netos para el destino PRESTAMO");
                        window.location.href="pedidos.php";
                        </script>';
                    }
                }

                if ($destino == "TARJETA DE CREDITO") 
                {
                    if ($ingreso_neto_solicitante >= 20000) 
                    {
                        if ($monto_solicitado <= 20000) 
                        {
                            /*$sql = "INSERT INTO pedidos(id_solicitante,fecha_registro,destino,monto_solicitado,plazo,created_at)
                                VALUES('$solicitante','$fecha_registro','$destino','$monto_solicitado','$plazo','$created_at')";
                            $result = mysqli_query($dbConn,$sql);*/  

                            $sqlUpdate = "UPDATE pedidos 
                            SET id_solicitante = '$solicitante', fecha_registro = '$fecha_registro', destino = '$destino',
                            monto_solicitado = '$monto_solicitado', plazo = '$plazo', created_at = '$created_at'
                                WHERE id = $id_pedido";
                                $result = mysqli_query($dbConn,$sqlUpdate);

                            if($result)
                            {
                               
                                echo "<script> alert('REGISTRO ACTUALIZADO!: SE HA ACTUALIZADO EL FOLIO ".$id_pedido."'); window.location.href='index.php'; </script>";
                                die();
                            }
                            else{
                                echo "<br>error";
                            }
                        }
                        else{
                            echo'<script type="text/javascript">
                            alert("ERROR: El Monto Solicitado rebasa el destino TARJETA DE CREDITO: \n Monto maximo para este destino 20,000");
                            window.location.href="pedidos.php";
                            </script>';
                        }
                    }
                    else{
                        echo'<script type="text/javascript">
                        alert("ERROR: no cumples con el mínimo de ingresos netos para el destino TARJETA DE CREDITO");
                        window.location.href="pedidos.php";
                        </script>';
                    }
                }
            }
            else{
            echo'<script type="text/javascript">
            alert("ERROR: no cumples con la edad suficiente para hacer un pedido");
            window.location.href="pedidos.php";
            </script>';

            }
        /*}
    }
    }*/

   

?>