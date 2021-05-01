<?php
include("funciones.php");
?>

<html>
<head>
<title>Monkeylyzer</title>
<link href="css/style.css" rel="stylesheet" id="bootstrap-css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="container">
	<div class="login-container" style="margin-left: 40%; margin: 0px auto">
            <div id="output"></div>
            <img src="images/staticmonkey.jpg" class="avatar"/>
            <div class="form-box">
            <h1>Información extra</h1>
            <b>¿Es vulnerable a ataques de diccionario?</b>
            Comprueba si se encuentra dentro de una lista de las contraseñas más utilizadas del mundo.<br clear="all"><br/>
            <b>¿Tiene caracteres repetidos demasiadas veces?</b><br/>
            Comprueba que no hay ningún caracter repetido 3 veces o más.<br clear="all"><br/>
            <b>¿Cuántas combinaciones posibles tiene?</b><br/>
            Comprueba cuantas combinacines posibles de diferentes caracteres existen dentro del número de letras, números y símbolos utilizados.
            Es decir, si tiene 4 letras y utiliza letras y números, calculará todas las posibilidades que existen en 4 espacios con todas las letras y números.
            <br clear="all"><br/>
            <b>¿Tiene la longitud adecuada?</b><br/>
            Comprueba que la contraseña tenga 8 caracteres o más de longitud.<br clear="all"><br/>

            <h2>Contacto</h2>
            Creado por Celx2
            <br clear="all"><br/>
            <form method="post" action="index.php">
                <button type="submit" class="btn btn-info btn-block login">Volver a inicio</button>
                </form>           
            </div>
        </div>
</div>
</body>
</html>
