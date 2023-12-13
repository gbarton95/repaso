<?php
    function letracorrecta($dni) {
        $letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
        return $letras[$dni % 23];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<header>
        <h1>REPASO 1ª EVALUACIÓN</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <h2>EJERCICIO 1</h2>
            <div class="contenido">
            <?php
            $numDNI=$_POST['numeroDNI'];
            $letraNIF=$_POST['letraNIF'];

            if(letracorrecta($numDNI)==$letraNIF){
                echo 'EL NIF '.$numDNI.$letraNIF.' es correcto.';
            } else {
                echo 'EL NIF '.$numDNI.$letraNIF.' es incorrecto.';
            }

            ?>
            <br><br>
            <a href="ej1.php">Volver al formulario</a>
            </div>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>