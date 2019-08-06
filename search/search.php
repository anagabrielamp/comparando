<?php 
    include 'header.php';
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
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;" id="topnav">
  <a class="navbar-brand" href="../home.php">Comparando</a>
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
                        <a class="nav-link" href="../home.php">
                            <i class="fas fa-home"></i> Home 
                            <span class="sr-only">(current)
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../crear.php">
                        <i class="fas fa-shopping-cart"></i> Crear producto
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../asignar.php">
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
        <div class="col-sm-10 lg-3">
        <?php
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM productos WHERE Titulo LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            if ($queryResult > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="card mt-3" style="width: 200px;">
                    <div class="card-body">
                    <a href="../producto.php?productoId=<?php echo $row["ProductoId"]; ?>&titulo=<?php echo $row["Titulo"]; ?>" class="card-link"><?php echo $row["Titulo"]; ?></a><br/> 
                    </div>
                </div>    
            <?php
                }
            }
                else {
                    echo "No se encontró ningún producto";
                }
        }
            ?>
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




