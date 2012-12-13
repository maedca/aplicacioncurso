<?php
function Conectar()
{
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $bd = "estudiante";
    
    $con = mysql_connect($servidor, $usuario, $clave) or die("No se pudo conectar");
    mysql_select_db($bd, $con) or die("Problemas al Seleccionar la bd");

    return $con;
}
    
    
?>
