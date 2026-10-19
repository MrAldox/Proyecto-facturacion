<?php
/**
 * Configuración y retorno de la conexión MySQL
 */
function retornarConexion() {
    $server  = getenv('DB_HOST') ?: "localhost";
    $usuario = getenv('DB_USER') ?: "root";
    $clave   = getenv('DB_PASS') !== false ? getenv('DB_PASS') : "";
    $base    = getenv('DB_NAME') ?: "facturacion";
    $port    = getenv('DB_PORT') ? intval(getenv('DB_PORT')) : 3306;

    $con = mysqli_connect($server, $usuario, $clave, $base, $port);
    if (!$con) {
        // Fallback en caso de que la base se llame 'base1'
        $con = mysqli_connect($server, $usuario, $clave, "base1", $port);
    }

    if (!$con) {
        die("Error de conexión a la base de datos: " . mysqli_connect_error());
    }

    mysqli_set_charset($con, 'utf8'); 
    return $con;
}
?>