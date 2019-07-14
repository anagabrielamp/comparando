<?php 
// Obtengo el archivo con la conexion (la ruta es relativa)
require("acciones/conexion.php");

// Mantengo la sesion abierta
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .box {
            height: 200px;
        }
    </style>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>


<?php

$productoId = $_REQUEST['productoId']; // esto tenes que obtenerlo de algun lado

$query = 'SELECT Supermercados.*, Precios.PrecioId, Precios.Precio, Precios.Fecha, Precios.UsuarioId

FROM Supermercados

INNER JOIN Precios

ON Supermercados.SupermercadoId = Precios.SupermercadoId

WHERE Precios.ProductoId = ' . $productoId . '

GROUP BY(Precios.PrecioId)';

$precios = mysqli_query($conexion, $query);

while($fila = mysqli_fetch_array($precios)) {
    
    // Lo que pongas aca adentro se va a ejecutar por cada precio del producto
    
    echo $fila["Nombre"]; // Nombre supermercado
    
  
    echo $fila["Precio"]; // Preci
}

?>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="js/main.js"></script>        
</body>

</html>
