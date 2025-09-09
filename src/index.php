<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Adivina el numero</title>
    
</head>
<body>
    <h1>Adivina el número</h1>
    
    <p>Adivina el número que estoy pensando.Está entre el 1 y el 100.
    <br>Tienes 5 oportunidades.¡Ánimo!.
   </p> 
    <?php
    $muestraFormulario = true;

    if (!isset($_POST["numeroIntroducido"])){ //primera carga de la pagina
       $numeroMisterioso = rand (1,100);
       $oportunidades = 5;

     } else {//segunda y sucesiva
         $numeroIntroducido = $_POST["numeroIntroducido"];
         $numeroMisterioso = $_POST["numeroMisterioso"];
         $oportunidades = $_POST["oportunidades"];
         $oportunidades --;

        if ($numeroIntroducido == $numeroMisterioso){
            echo "<p> ¡Has aceptado🎉🎉!</p>";
        }
        if (($oportunidades == 0) && ($numeroIntroducido != $numeroMisterioso)) {
            echo "<p> ¡Has perdido, lo siento😿!</p>";
            $muestraFormulario = false;
        }
        if (($numeroMisterioso > $numeroIntroducido) && ($oportunidades > 0)){
            echo "<p>El número que estoy pensando 🤔es mayor que $numeroIntroducido</p>";
            echo "<p>Te quedan $oportunidades oportunidades.</p>";
           
        }
        if (($numeroMisterioso < $numeroIntroducido)  && ($oportunidades < 0)){
            echo "<p>El número que estoy pensando 🤔es menor que $numeroIntroducido</p>";
            echo "<p>Te quedan $oportunidades oportunidades.</p>";
        }

    }
    
    ?>
    <?php 
      if ($muestraFormulario){
    ?> 

   

    <form action="index.php" method="post">
        <label for="numeroIntroducido">Introduce un número</label>
        <input type="number" name="numeroIntroducido" id="numeroIntroducido" min="1" max="100" autofocus>
        <input type="hidden" name="numeroMisterioso" value="<?= $numeroMisterioso ?>">
        <input type="hidden" name="oportunidades" value="<?= $oportunidades ?>">
        <input type="submit" value="Aceptar">
    </form>
    
    <?php
      } else {
    ?>   
     <a href="index.php"><button>Volver a jugar</button></a>
    <?php
      }
    ?>
    
</body>
</html>