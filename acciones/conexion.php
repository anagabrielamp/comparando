<?php
    /** 
     * Archivo para crear la conexion a la base de datos
     * En vez de repetir el codigo cada vez que tengamos que hacerlo,
     * importamos este archivo desde los otros donde lo necesitamos
     * y utilizamos la variable $conexion
    */ 
    $hostname = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $db = "comparando";

    $conexion = mysqli_connect($hostname, $dbusername, $dbpassword, $db);

    if (!$conexion) {
      die("Database connection failed: ");
    }
?>