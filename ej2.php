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
            <h2>EJERCICIO 2</h2>
            <?php
                if(isset($_REQUEST["mandar"])){
                    //Función que evalúa si un número es primo devolviendo true o false//
                    function esprimo($x)
                    {
                        if ($x<2) { return false; }
                        else if ($x==2) {return true;}
                        else
                        {
                            for ($i=2;$i<=$x/2;$i++)
                            {
                                if ($x%$i==0)
                                {
                                    return false;
                                }
                            }
                                return true;
                        }
                    }
                    /////////////////////////////////////////////////////////////////////


                    //Función que recibe un array de NxM elementos y muestra una tabla con los elementos del array//
                    function tablaNxM($n, $m, $array)
                    {
                        echo "<h2>Tabla de $n filas y $m columnas con los primeros ".$n*$m." números primos</h2><br>";
                        echo "<table>";
                        $contador=0;
                        for ($i=1;$i<=$n;$i++) {
                            echo '<tr>' ;
                            for ($j=1;$j<=$m;$j++) {
                                echo '<td>';
                                echo $array[$contador];
                                $contador++;
                                echo '</td>';
                            }
                            echo '</tr>';
                        }
                        echo "</table>";
                    }
                    ///////////////////////////////////////////////////////////////////////////////////////////////


                    $n=$_REQUEST["n"];
                    $m=$_REQUEST["m"];
                    $arrayprimos = [];

                    //Creamos el array de n*m números primos
                    $primo = 1;
                    for($i = 0; $i < $n * $m; $i++) {
                        while (!esprimo($primo)) {
                            $primo++;
                        }
                        $arrayprimos[$i] = $primo;
                        $primo++;
                    }

                    //Y ahora creamos la tabla con la función:
                    tablaNxM($n, $m, $arrayprimos);

                }
            ?>
            <div class="contenido">
            <h2>Tabla de <i>n</i> filas y <i>m</i> columnas</h2>
            <form action="ej2.php" method="POST">
                <fieldset>
                    <label for="n">Introduce el número de filas de la tabla:</label>
                    <input type="number" id="n" name="n" min="1" title="Debe ser un número mayor que 0" required>
                    <br><br>
                    <label for="m">Introduce el número de columnas de la tabla:</label>
                    <input type="number" id="m" name="m" min="1" title="Debe ser un número mayor que 0" required>
                    <br><br>
                    <button type="submit" name="mandar">Enviar</button>
                </fieldset>
            </form>
            </div>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>