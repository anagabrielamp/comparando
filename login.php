<?php 
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
    <link rel="stylesheet" href="estilos/stylec.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">    
        <h1 class="text-center mb-5">Mi red social</h1>
        <div class="row">

            <!-- 
                sm: small, pequeño, 576px
                md: medium, mediano, 768px
                lg: large, largo, 992px
                xl: extra-large, 1200px
             -->

            <div class="col-8 offset-2 col-md-4 offset-md-4">
                <div class="card p-4 mb-5" id="form-registro">
                    <?php 
                        if (isset($_SESSION["message"])) {?> 
                        <div class="alert alert-danger mt-3" role="alert">
                            <?php echo $_SESSION["message"] ?>
                        </div>
                        <?php
                        }
                    ?>
                    <div class="alert alert-danger mt-3 mensaje-error" role="alert">
                        Debes completar todos los campos!
                    </div>
                    <form action="acciones/registrarusuario.php">
                        <div class="form-group">
                            <label for="postuser">Usuario</label>
                            <input type="text" class="form-control" name="user" id="user">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="custom-control custom-checkbox mt-4 mb-2">
                            <input type="checkbox" class="custom-control-input" id="terminos">
                            <label class="custom-control-label" for="terminos">Acepto términos y condiciones</label>
                          </div>
                        <button type="submit" class="btn btn-primary mt-3" id="boton-registrar">Registrarse</button>
                    </form>
                       <a href="#" class="card-link d-block mt-4 mb-2" id="ir-a-login">Ya tienes cuenta? Ingresa!</a>
                </div>
                <div class="card p-4 mb-5" id="form-ingreso">
                    <?php 
                        if (isset($_SESSION["message"])) {?> 
                        <div class="alert alert-danger mt-3" role="alert">
                            <?php echo $_SESSION["message"] ?>
                        </div>
                        <?php
                        unset($_SESSION["message"]);
                        }
                    ?>
                    <div class="alert alert-danger mt-3 mensaje-error" role="alert">
                        Debes completar todos los campos!
                    </div>
                    <form action="acciones/validarlogin.php" method="post">
                        <div class="form-group">
                            <label for="login-user">Usuario</label>
                            <input type="text" class="form-control" name="loginuser" id="login-user">
                        </div>
                        <div class="form-group">
                            <label for="loginpassword">Contraseña</label>
                            <input type="password" class="form-control" name="loginpassword" id="login-password">
                        </div>
                        <button type="submit" class="btn btn-success mt-3" id="boton-loguear">Ingresar</button>
                    </form>
                    <a href="#" class="card-link d-block mt-4 mb-2" id="ir-a-registro">No tienes cuenta? Registrate!</a>
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
    <script src="js/login.js"></script>        
</body>

</html>