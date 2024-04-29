<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="cajagrande">
    <h1>Lista de temas</h1>
    <?php
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=foro-et20','root','');
    } catch (PDOException $e) {
        echo 'Falló la conexión: ' . $e->getMessage();
    }

    $busca = $conexion->query("SELECT * FROM `temas`");
    ?>

    <?php
     foreach ($busca as $imagen)
         { 
            $archivo = $imagen['temas'].".php";
            echo '<li><a class="texto" href=" ' .  $archivo  .  '"> -'  .  $imagen['temas']  .  "</a></li>";
        }
    ?>
    </div>
    
</body>
</html>