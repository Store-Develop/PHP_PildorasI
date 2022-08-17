<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="./css/Style.css" type="text/css" />-->
    <title>Document</title>
</head>
<body>
<?php

    
    require("datos_C.php");

    $busqueda = $_GET["buscar"];


    $conexion=mysqli_connect($db_host,$db_usuario,$db_contraseña);

    //Si no podemos realizar la conexion con la base de datos por algun motivo capturamos el error y le decimos que haga algo.
    /*if (mysqli_connect_errno()) {
       echo "Conexión con BBDD fallida por favor verificar.";

       exit();
    }*/

    // podemos especificar la DB aparte de la linea de conexión si no conecta enviamos un mensaje de error.
    mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la BBDD");
    //cotejamiento para que acepte caracteres especiales.
    mysqli_set_charset($conexion, "utf8");

    //consulta a base de datos.
    $consulta="SELECT * FROM PERSONAL WHERE Departamento LIKE '%$busqueda%'";

    $rst=mysqli_query($conexion, $consulta);
    // recorremos y almacenamos en un array la info obtenida.

    while ($datos=mysqli_fetch_array($rst, MYSQLI_ASSOC)) {
    echo "<table class='tabla'><tr><td>";
        echo "ID: " . $datos["Matrícula"] . "</td><td>";
        echo "Nombre: " . $datos["Nombre"] . "</td><td>";
        echo "Apellido: " . $datos["Apellido"] . "</td><td>";
        echo "Categoría: " . $datos["Categoría"] . "</td><td>";
        echo "Departamento: " . $datos["Departamento"] . "</td><td>";
        echo "Salario: " . $datos["Salario"] . "</td><td>";
        echo "Fecha ingreso: " . $datos["Fecha ingreso"] . "</td><td></tr></table>";
        echo "<br>";
      

}

mysqli_close($conexion);


?>
</body>
</html>