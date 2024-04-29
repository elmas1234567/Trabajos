<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="csstemas.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@10..48,500&display=swap" rel="stylesheet">

    
    <title>Document</title>
</head>
<body>

    <header class="cabecera">
        <div class="logo">
            <a href="trabajofinal.php"><img src="pato.png" alt="logo" class="logologo"></a>
        </div>
        <nav class="links">
                <a href="">NOSOTROS</a>
                <a href="">CONTACTO</a>
        </nav>
    </header>

    <div class="grande">
        <h1 class="nose">Comentarios de "por que boca es el mas grande"</h1>
        <div class="comentar">
            <form name="formularioDatos" method="post" action="tema1.php">
            <label>Nickname:</label>
            <input type="text" name='nickname' value="" required><br>
            <label>Comentario:</label><br>
            <input type="text" name="comentario" value="" required class="cajacomentario"><br>
            <input type="submit" value="Enviar comentario" class="enviarcomentario" >
            </form>
         </div>
        <div class="comentarios">
            <h2>Comentarios</h2>
         <?php
        


            try {
                $conexion = new PDO('mysql:host=localhost;dbname=foro-et20pelaez','root','');

                if(!empty($_POST)){

                $nickname = $_POST['nickname'];
                $comentario = $_POST['comentario'];
                $fecha=date("d/m/y");
    
                $conexion->query("INSERT INTO `comentarios_boca`(`id`, `nickname`, `comentario`, `fecha`) VALUES (NULL, '$nickname', '$comentario', '$fecha');");
                }
            $busca = $conexion->query("SELECT * FROM `comentarios_boca`");
            echo "<br>";

            foreach ($busca as $imagen)
            {  
                echo '<div class="comentario">';
                echo '<div class="nickname"><p>'.$imagen['nickname'].'</p></div>';
                echo '<div class="fecha"><p>'.$imagen['fecha'].'</p></div>';
                echo '<div class="texto"><p>'.$imagen['comentario'].'</p></div>';
                echo "</div>";
                echo "<br>";
            }
    
            } catch (PDOException $e) {      
                echo 'Falló la conexión: ' . $e->getMessage();
            }
            ?>
        </div>
    </div>
</body>
</html>