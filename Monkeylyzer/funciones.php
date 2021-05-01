<?php
function TiempoMono($intentos, $password){
$Longitud=strlen($password);
$Resultado=pow(93, $Longitud);
$Resultado=$Resultado/$intentos;//da el resultado en segundos
$Resultado=$Resultado/60;//de segundos a minutos
$Resultado=$Resultado/60;//de minutos a horas
$Resultado=$Resultado/24;//de horas a días
$Resultado=$Resultado/360;//de días a años

if ($Resultado>2000000){
    echo "más de lo que el universo lleva existiendo";
}
elseif (round($Resultado, 0)!=0){//si la cantidad de años redondeada es diferente de 0...
    if (round($Resultado, 0)==1){
        echo round($Resultado, 0) . " año";
    }else{
    echo round($Resultado, 0) . " años";//la enseñamos
    }
}else{
    $Resultado=$Resultado*12;//en caso de que sea igual de 0 la pasamos a meses
    if (round($Resultado, 0)!=0){//si la cantidad de meses es diferente de 0, la enseñamos
        if (round($Resultado, 0)==1){
            echo round($Resultado, 0) . " mes";
        }else{
        echo round($Resultado, 0) . " meses";
        }
    }else{
        $Resultado=$Resultado*30;//sino lo pasamos a días
        if (round($Resultado, 0)!=0){//si los días son diferentes de 0 los enseñamos
            if (round($Resultado, 0)==1){
                echo round($Resultado, 0) . " día";
            }else{
            echo round($Resultado, 0) . " días";
            }
        }else{
            $Resultado=$Resultado*24;//lo pasamos a horas
            if (round($Resultado, 0)!=0){//si es diferente de 0, lo enseñamos
                if (round($Resultado, 0)==1){
                    echo round($Resultado, 0) . " hora";
                }else{
                echo round($Resultado, 0) . " horas";
                }
            }else{
                $Resultado=$Resultado*60;//si no, enseñamos los minutos
                if (round($Resultado, 0)==1){
                    echo round($Resultado, 0) . " minuto";
                }else{
                echo round($Resultado, 0) . " minutos";
                }
            }
        }
    }
}

}

function GenerarContraSegura(){//genera una contraseña segura
    $opciones = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890//**--__!!??';
    $pass = array(); //$pass tiene que ser un array
    $alphaLength = strlen($opciones) - 1;
    $longitud=random_int(9, 15);
    for ($i = 0; $i < $longitud; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $opciones[$n];
    }
    $pass=implode($pass);//ahora lo convertimos a string
    return $pass; 
}

function CaracteresRepetidos($password){//comprueba que no hay ningún caracter repetido más de 2 veces
    $Longitud=strlen($password);
    $Contador=0;
    for ($i=0;$i<$Longitud;$i++){
        for ($k=0;$k<$Longitud;$k++){
            if($password[$i]==$password[$k]){
                $Contador++;
                if ($Contador>=3){
                    echo "Sí";
                    return;
                }
            }
        }
        $Contador=0;
    }
   if ($Contador<3){
       echo "No";
   }
}

function Diccionario($password){ //comprueba si está en mi lista de contraseñas más usadas
$string=file_get_contents("resources/common-passwords.txt");
$string = explode("\n", $string); // \n es el caracter de salto de línea
if(in_array($password, $string)){
    return true;
    } else {
    return false;
    }
}

function PosiblesCombinaciones($password){//mira todas las combinaciones de letras, números y símbolos que hay con ese número de caracteres
    $Total=0;
    if (TieneMayus($password)){
        $Total=$Total+27;
    }

    if(TieneMinus($password)){
        $Total=$Total+27;
    }

    if(TieneNum($password)){
        $Total=$Total+9;
    }

    if(TieneSimbolo($password)){
        $Total=$Total+30;
    }

    $Longitud=strlen($password);
    $Resultado=pow($Total, $Longitud);

    echo $Resultado;
}

function Longitud ($password){//longitud de la contraseña
    if(strlen($password)>8){
        echo "Sí. Son " . strlen($password) . " caracteres";
    }
    else{
        echo "No. Son " . strlen($password) . " caracteres";

    }
}

function TieneMayus ($password){//¿tiene mayúsculas?
    if(preg_match('/[A-Z]/', $password)){
        return true;
        }else{
        return false;
        }
}

function TieneMinus($password){//¿tiene minúsculas?
    if(preg_match('/[a-z]/', $password)){
        return true;
        }else{
        return false;
        }

}

function TieneNum($password){//¿tiene números?
    if (preg_match('~[0-9]+~', $password)) {
        return true;
    }else{
        return false;
    }
}

function TieneSimbolo($password){//¿tiene símbolos?
    if (preg_match('/[\'^�$%&*()}{@#~?><>,|=_+�-]/', $password)) {
        return true;
        }else{
        return false;
        }
}

?>