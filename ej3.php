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
            <h2>EJERCICIO 3</h2>
            <?php $fecha=date("d-m-Y"); echo "<h2 class='fecha'>Fecha: $fecha</h2>"; ?>
            <?php
            ?>
            <div class="contenido">
                <h2>Consulta de productos por proveedor</h2>
                <fieldset>
                    <label for="prov">Selecciona proveedor: </label>
                    <input type="select" id="prov" name="prov">
                    <button type="submit" name="mandar">Enviar consulta</button>

                </fieldset>
            </div>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>