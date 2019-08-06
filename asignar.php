<?php 
// Obtengo el archivo con la conexion (la ruta es relativa)
require("acciones/conexion.php");

// Mantengo la sesion abierta
session_start();

// Obtengo todas las comunidades y guardo el resultado en la variable $comunidades
$query = "SELECT * FROM categorias";
$categorias = mysqli_query($conexion, $query);

if (isset($_SESSION['categoria-nombre'])) {
  // Si hay algun dato guardado en la sesion de la variable comunidad-nombre
  // lo guardo en la variable $nombreComunidad
  $nombreCategoria = $_SESSION['categoria-nombre'];
  
  // Busco todas las publicaciones que sean del id de la comunidad seleccionada
  // y guardo el resultado en la variable $publicaciones
  $query = "SELECT * FROM productos WHERE categoriaid = " . $_SESSION["categoria-id"];
  $productos = mysqli_query($conexion, $query);
} else {
  // Si no hay ningun dato guardado en la variable comunidad-nombre,
  // entonces a $nombreComunidad le asigno "General"
  $nombreComunidad = 'General';

  // Obtengo TODAS las publicaciones (porque no hay ninguna comunidad seleccionada)
  // y la guardo en publicaciones
  $query = "SELECT * FROM productos";
  $productos = mysqli_query($conexion, $query);
}
?>

<?php 

// Obtengo todas las comunidades y guardo el resultado en la variable $comunidades
$query = "SELECT * FROM supermercados";
$supermercados = mysqli_query($conexion, $query);

?>

<?php 

// Obtengo todas las comunidades y guardo el resultado en la variable $comunidades
$query = "SELECT * FROM precios";
$precios = mysqli_query($conexion, $query);

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
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:500&display=swap" rel="stylesheet">     
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;" id="topnav">
  <a class="navbar-brand" href="home.php">Comparando</a>
  <form action="search/search.php" method="POST" class="form-inline search-form" id="search-form">
    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Nombre de producto">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit-search">Buscar</button>
  </form>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


        <span class="navbar-text ml-auto">
            <?php if (isset($_SESSION["username"])) { 
            ?> 
            Hola
            <?php echo $_SESSION["username"] 
            ?>
            <?php } 
            ?>
        </span>
    
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <nav class="navbar navbar-expand-lg navbar-light topnav mt-5" id="topnav2">
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto flex-column">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">
                            <i class="fas fa-home"></i> Home 
                            <span class="sr-only">(current)
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="crear.php">
                        <i class="fas fa-shopping-cart"></i> Crear producto
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="asignar.php">
                        <i class="fas fa-dollar-sign"></i> Asignar precio
                        </a>
                    </li>

                <!--    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i class="fas fa-clipboard-list"></i> Lista de mercado</a>
                    </li>
                -->   
                </ul>
                </div>
            </nav>
        </div>
        <div class="col-6 offset-2 col-md-6 offset-md-2 mt-3">
            <div class="card">
                <div class="card-body">
                    <form action="acciones/crearprecio.php" method="post">
                        <div class="form-group">
                            <label for="precio">Precio de producto</label>
                            <input type="text" required class="form-control" name="precio" id="precio">
                        </div>
                        <div class="form-group">
                            <label for="producto">Producto</label>
                        <?php
                    mysqli_data_seek( $productos, 0);
                    while($producto = mysqli_fetch_array($productos)) {
                        ?>
                        <input type="radio" name="productoId" value="<?php echo $producto["ProductoId"]; ?>"><?php echo $producto["Titulo"]; ?>
                        
                        <?php
                        }
                    ?>
                        </div>
                        <div class="form-group">
                            <label for="supermercado">Supermercado</label>
                            <?php
                    
                    while($supermercado = mysqli_fetch_array($supermercados)) {
                        ?>
                        <input type="radio" name="supermercadoId" value="<?php echo $supermercado["SupermercadoId"]; ?>"><?php echo $supermercado["Nombre"]; ?>
                        
                        <?php
                            }
                        ?>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" id="button-asignar">Asignar precio</button>
                    </form>
                </div>
            </div>
            </div>
        </div>  

    </div>
</div>


  
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