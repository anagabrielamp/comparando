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
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light" id="topnav">
  <a class="navbar-brand" href="#">
    <?php if (isset($_SESSION["username"])) { ?> 
                Hola
            <?php echo $_SESSION["username"] ?>
    <?php } ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
    <form class="form-inline my-2 my-lg-0" id="search">
      <input class="form-control mr-sm-2" type="text" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>

<div class="container mt-3">    
        <h1 class="display-3 text-center mb-3 d-md-none">Comparando</h1>
        <div class="row">
          <div class="col-sm-12 col-md-3">
                <?php if (isset($_SESSION["categoria-nombre"])) { ?>
                <div class="card p-2 mb-5">
                    <form action="acciones/crearproducto.php" method="post">
                        <div class="form-group">
                            <label for="prod-title">Nombre</label>
                            <input type="text" required class="form-control" name="titulo-prod" id="titulo-prod">
                        </div>
                        <div class="form-group">
                            <label for="prod-descripcion">Descripción</label>
                            <input type="text" required class="form-control" name="descripcion-prod" id="descripcion-prod">
                        </div>
                        <button type="submit" class="btn btn-primary w-100" id="post-button">Crear producto</button>
                    </form>
            </div>
                <?php } ?>
        <div class="row">
            <div  class="col-12">
                <div class="card p-2 mb-5">
                    <form action="acciones/crearcategoria.php" method="post">
                        <div class="form-group">
                            <label for="nombre-categoria">Nombre</label>
                            <input type="text" required class="form-control" name="nombre-categoria" id="nombre-categoria">
                        </div>
                        <button type="submit" class="btn btn-primary w-100" id="">Crear categoria</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-3" id="categorias">
                <h2 class="mb-3">Categorias</h2>
                <a href="acciones/seleccionarcategoria.php?id=general" class="card-link">General</a><br/>
                <?php
                    while($categoria = mysqli_fetch_array($categorias)) {
                        ?>
                            <a href="acciones/seleccionarcategoria.php?id=<?php echo $categoria["CategoriaId"]; ?>&nombre=<?php echo $categoria["Nombre"]; ?>" class="card-link"><?php echo $categoria["Nombre"]; ?></a><br/>
                        <?php
                    }
                ?>
            </div>
        <div class="row">              
            <div class="card p-2 mb-5">
                    <form action="acciones/crearsupermercado.php" method="post">
                        <div class="form-group">
                            <label for="nombre-supermercado">Nombre supermercado</label>
                            <input type="text" required class="form-control" name="nombre-supermercado" id="nombre-supermercado">
                        </div>
                        <div class="form-group">
                            <label for="direccion-supermercado">Dirección supermercado</label>
                            <input type="text" required class="form-control" name="direccion-supermercado" id="direccion-supermercado">
                        </div>
                        <button type="submit" class="btn btn-primary w-100" id="">Crear supermercado</button>
                    </form>
            </div>
        </div>


        <div class="row">              
            <div class="card p-2 mb-5">
                    <form action="acciones/crearprecio.php" method="post">
                        <div class="form-group">
                            <label for="precio">Precio de producto</label>
                            <input type="text" required class="form-control" name="precio" id="precio">
                        </div>
                        <div class="form-group">
                            <label for="producto">Producto</label>
                        <?php
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
                        
                        <button type="submit" class="btn btn-primary w-100" id="">Asignar precio</button>
                    </form>
                </div>
                <div class="row">
                <div class="col-sm-12 col-md-3" id="productos">
                <h2 class="mb-3">Productos</h2>
                <?php
                    mysqli_data_seek( $productos, 0 );
                    while($producto = mysqli_fetch_array($productos)) {
                        ?>
                            <a href="producto.php?productoId=<?php echo $producto["ProductoId"]; ?>&titulo=<?php echo $producto["Titulo"]; ?>" class="card-link"><?php echo $producto["Titulo"]; ?></a><br/>
                        <?php
                    }
                ?>

            


                </div>
                </div>
        

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