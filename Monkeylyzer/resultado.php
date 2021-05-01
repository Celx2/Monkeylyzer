<?php
include("funciones.php");
session_start();

if (isset($_POST["password"])){
    if ($_POST["password"]==" " || $_POST["password"]==""){
        header("Location: index.php?error=0");
        exit;
    } else {
        $_SESSION["password"]=$_POST["password"];
    }
}
elseif (!(isset($_SESSION["password"]))){
    header("Location: index.php?error=0");
    exit;
}

if(isset($_POST["intentos"])){
    if(is_numeric($_POST["intentos"])){
        $_SESSION["intentos"]=$_POST["intentos"];
    }else{
        header("Location: resultado.php?error=0");
    }
}else{
    $_SESSION["intentos"]=150;
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
	<div class="login-container" style="margin-left: 40%; margin: 0px auto">
            <div id="output"></div>
            <img src="images/animonkey.gif" class="avatar"/>
            <?php 
			if (isset($_GET["error"])){
            ?>
                <div th:if="${param.error}" class="alert alert-danger" role="alert">Rellena todos los campos correctamente</div>
            <?php
			}
		    ?>
            <div class="form-box">
            <form action="resultado.php" method="post">
            <h2>Con <input type='text' name='intentos' id="myInput" style="width:45px; height:15px" value="<?php echo $_SESSION["intentos"] ?>"> intentos al segundo, para averiguar tu contraseña un mono tardaría</h2>
            <button id='myBtn' onclick='<?php ?>' hidden="hidden"></button>
            <h1><?php TiempoMono($_SESSION["intentos"], $_SESSION["password"])?></h1>

            <script>
            var input = document.getElementById("myInput");
            input.addEventListener("keyup", function(event) {
                if (event.keyCode === 13) {
                    document.getElementById("myBtn").click();
                }
            });
            </script>

            </form>
            </div>
                <label class="col-lg-3 col-form-label form-control-label">¿Es vulnerable a ataques de diccionario?</label>
                </br>
                <?php
                if (Diccionario($_SESSION["password"])){
                    echo "Sí";
                }else{
                    echo "No";
                }
                ?>
                </br>
                </br>

                <label class="col-lg-3 col-form-label form-control-label">¿Tiene caracteres repetidos demasiadas veces?</label>
                </br>
                <?php
                CaracteresRepetidos($_SESSION["password"]);
                ?>
                </br>
                </br>

                <label class="col-lg-3 col-form-label form-control-label">¿Cuántas combinaciones posibles tiene?</label>
                </br>
                <?php
                PosiblesCombinaciones($_SESSION["password"]);
                ?>
                </br>
                </br>

                <label class="col-lg-3 col-form-label form-control-label">¿Tiene la longitud adecuada?</label>
                 </br>
                 <?php
                Longitud($_SESSION["password"]);
                ?>
                </br>
                </br>      
                <table class="checktable">
                <tr>
                <td><b>Mayúsculas</b></td>
                <td><b>Minúsculas</b></td>
                <td><b>Números</b></td>
                <td><b>Símbolos</b></td>
                </div>
                </tr>
                <tr>
                <td><input type=checkbox style="width:40px; height:40px;" <?php if (TieneMayus($_SESSION["password"])) echo "checked='checked'" ?> name="mayusculas" disabled="disabled"></td>
                <td><input type=checkbox style="width:40px; height:40px;" <?php if (TieneMinus($_SESSION["password"])) echo "checked='checked'" ?> name="minusculas" disabled="disabled"></td>
                <td><input type=checkbox style="width:40px; height:40px;" <?php if (TieneNum($_SESSION["password"])) echo "checked='checked'" ?> name="numeros" disabled="disabled"></td>
                <td><input type=checkbox style="width:40px; height:40px;" <?php if (TieneSimbolo($_SESSION["password"])) echo "checked='checked'" ?> name="simbolos" disabled="disabled"></td>
                </tr>
                </table>

                <form method="post" action="index.php">
                </br>
                <button type="submit" class="btn btn-info btn-block login">Volver a inicio</button>
                </form>
                <a href="acercade.php">Acerca de</a>
            </div>
        </div>
            </div>
            </div>
        </div>
</div>
</body>
</html>