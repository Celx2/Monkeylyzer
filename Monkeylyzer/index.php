<?php
session_start();

if (isset($_SESSION["password"]) || isset($_SESSION["intentos"])){
    session_destroy();
    unset($_SESSION);
}
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
	<div class="login-container">
            <div id="output"></div>
            <img src="images/staticmonkey.jpg" class="avatar"/>
            <?php 
			if (isset($_GET["error"])){
            ?>
                <div th:if="${param.error}" class="alert alert-danger" role="alert">Rellena todos los campos correctamente</div>
                </br>
            <?php
			}
		    ?>
            <div class="form-box">
                <form action="resultado.php" method="post">
                    <input name="password" type="text" placeholder="Contraseña">
                    <button class="btn btn-info btn-block login" type="submit">Comprueba si tu contraseña es segura</button>
                </form>
                </br>
                <form method="post" action="segura.php">
                <button type="submit" class="btn btn-info btn-block login" style="margin-top: -5px">Genera una contraseña segura aleatoria</button>
                </br>
                </br>
                </form>
            </div>
        </div>
</div>
</body>
</html>