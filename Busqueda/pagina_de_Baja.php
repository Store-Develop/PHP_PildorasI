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

    


    $conexion=mysqli_connect($db_host,$db_usuario,$db_contraseña);

    $user = mysqli_real_escape_string($conexion, $_GET["usuario"]);
    $password = mysqli_real_escape_string($conexion, $_GET["contra"]);

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
    //$consulta="SELECT * FROM PERSONAL WHERE Departamento LIKE '%$busqueda%'";
    $consulta="DELETE FROM usuarios WHERE  Usuario= '$user' AND Contraseña= '$password'";

    echo "$consulta <br><br>";

    /*if(mysqli_query($conexion, $consulta));{

        echo "Baja Procesada";
    }*/
    //Ejecutamos la consulta   
    mysqli_query($conexion, $consulta);

    //Vemos si hay filas afectadas y actuamos dependiendo dé.
    if (mysqli_affected_rows($conexion)>0) {
        
        echo "Baja Procesada"; 
        
    }else {
        
        echo "Información ERRONEA validar. ";

    }


    // recorremos y almacenamos en un array la info obtenida.

    /* ($datos=mysqli_fetch_array($rst, MYSQLI_ASSOC)) {

        echo "Bienvenido $user <br>";
        echo "Estos son tus datos: <br>";
        echo "<table class='tabla'><tr><td>";
        echo "USUARIO: " . $datos["Usuario"] . "</td><td>";
        echo "CONTRASEÑA: " . $datos["Contraseña"] . "</td><td>";
        echo "TELEFONO: " . $datos["telefono"] . "</td><td>";
        echo "DIRECCIÓN: " . $datos["Direccion"] . "</td><td></tr></table>";
        echo "<br>";
      

}*/

mysqli_close($conexion);


?>
</body>
</html>