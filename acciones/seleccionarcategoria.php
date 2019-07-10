<?php
    // Mantengo la sesion abierta
    session_start();
    
    /** 
     *  Obtengo el valor del campo con name id y nombre, que
     *  vienen guardadas en la variable global $_REQUEST, y las asigno
     *  a las variables $comunidadId y $comunidadNombre
     */
    $categoriaId = $_REQUEST['id'];
    $categoriaNombre = $_REQUEST['nombre'];

    if ($categoriaId == "general") {
        /**
         * Si comunidadId es igual a general, entonces no tenemos ninguna comunidad seleccionada
         * y por lo tanto borramos de sesion los datos sobre la comunidad
         */
        unset($_SESSION["categoria-id"]);
        unset($_SESSION["categoria-nombre"]);
    } else {
        /**
         * Si no es igual, significa que escogimos una, por lo tanto guardamos esa info en sesion
         */
        $_SESSION["categoria-id"] = $categoriaId;
        $_SESSION["categoria-nombre"] = $categoriaNombre;
    }
    // Redirijo a home
    header('Location: /comparando/home.php');
?>