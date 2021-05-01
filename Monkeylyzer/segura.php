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
	<div class="login-container">
            <div id="output"></div>
            <img src="images/animonkey.gif" class="avatar"/>
            <div class="form-box">
            <?php
            $Password=GenerarContraSegura();
            echo $Password;
            ?>
             <div style="position:relative; display:inline-block; margin-left: 7px; top: 3px";> 
              <img src="images/copy-to-clipboard.png" width="15" height="18" onclick="Copiar('');" />
            </div>
            <br/>
            <br/>

            <script>
              function Copiar(text) {
              var text = "<?php echo $Password ?>";
              var dummy = document.createElement("textarea");   
              document.body.appendChild(dummy);
              dummy.value = text;
              dummy.select();
              document.execCommand("copy");
              document.body.removeChild(dummy);
              }
            </script>

             <form method="post" action="segura.php">
                <button type="submit" class="btn btn-info btn-block login">Genera otra contraseña</button>
              </form>
              <form method="post" action="index.php">
                <button type="submit" class="btn btn-info btn-block login">Volver a inicio</button>
              </form>
            </div>
        </div>
</div>
</body>
</html>