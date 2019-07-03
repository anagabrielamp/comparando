<?php
    // Obtenemos el archivo con la conexion a la base de datos
    require("conexion.php");

    // Mantengo la sesion abierta
    session_start();

    /** 
     *  Obtengo el valor del campo con name titulo-post y texto-post, que
     *  vienen guardadas en la variable global $_REQUEST, y las asigno
     *  a las variables $titulo y $texto
     */
    $tituloprod = $_REQUEST["titulo-prod"];
    $descripcionprod = $_REQUEST["descripcion-prod"];

    /**  
     * Creo una query para insertar en la tabla publicaciones un nuevo
     * registro con los valores de las variables $titulo y $texto
     * Ademas, usamos la funcion de MySQL now() para guardar en el campo fecha
     * el tiempo exacto en que se creo la publicacion
     * Tambien utilizamos los valores guardados en la session de user-id y comunidad-id
     */ 
    $query = "INSERT INTO productos(titulo, descripcion, fecha, usuarioid, categoriaid) 
    VALUES('" . $tituloprod . "', '" . $descripcionprod . "', now(), '" . $_SESSION["user-id"] . "', '" . $_SESSION["categoria-id"] . "')"; 
    
    // Ejecuto la query
    mysqli_query($conexion, $query);

    // Redirijo a home
    header('Location: /comparando/home.php');
?>