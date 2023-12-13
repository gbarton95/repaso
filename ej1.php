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
        <a href="index.php" class="derecha">Inicio</a>
            <h2>EJERCICIO 1</h2>
            <div class="contenido">
                <form action="ej1result.php" method="POST">
                    <label for="numeroDNI">Introduzca un número de DNI:</label>
                    <input type="text" id="numeroDNI" name="numeroDNI" pattern="[0-9]{8}" title="Debe tener 8 cifras numéricas" required>
                    <br><br>
                    <label for="letraNIF">Introduzca la letra del NIF correspondiente:</label>
                    <input type="text" id="letraNIF" name="letraNIF" size="7" pattern="[A-HJ-NP-TV-Z]{1}" title="Debe ser una letra en mayúscula y no puede ser Ñ, I, O, U" required>
                    <br><br>
                    <button type="submit">Enviar</button>
                    <button type="reset">Borrar</button>
                </form>
            </div>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>