<?php
    // Obtenemos el archivo con la conexion a la base de datos
    require("conexion.php");

    // Mantengo la sesion abierta
    session_start();

    /** 
     *  Obtengo el valor del campo con name nombre-comunidad, que
     *  viene guardada en la variable global $_REQUEST, y las asigno
     *  a la variable $comunidad
     */
    $categoria = $_REQUEST["nombre-categoria"];

    /**  
     * Creo una query para insertar en la tabla comunidades un nuevo
     * registro con el nombre guardado en la variable $comunidad
     */  
    $query = "INSERT INTO categorias(nombre) VALUES ('" . $categoria . "')";
    
    // Ejecuto la query
    mysqli_query($conexion, $query);

    // Redirijo a home
    header('Location: /comparando/home.php'); 
?>