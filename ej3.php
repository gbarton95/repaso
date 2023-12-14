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
            <?php 
            //fecha
            $fecha=date("d-m-Y"); 
            echo "<h2 class='fecha'>Fecha: $fecha</h2>";

            //Conexión servidor y base de datos
            $conexion = mysqli_connect ("localhost", "root", "", "jardineria") or die ("No se puede seleccionar la base de datos");

            //////////////////////Lo que aparece cuando YA has hecho la consulta/////////////////////////////
            if(isset($_REQUEST['mandar'])){
                $proveedor = $_REQUEST['prov'];
                $instruccion = "SELECT CodigoProducto, Gama, Nombre, Dimensiones, CantidadEnStock, PrecioProveedor FROM productos WHERE proveedor='$proveedor' ORDER BY CodigoProducto";
                $consulta = mysqli_query($conexion, $instruccion) or die ("Fallo en la consulta");

                //Para mostrar los resultados en tabla:
                echo "<h2>Resultado de la consulta de productos del proveedor $proveedor</h2>";

                //Primero la cabecera:
                print 
                    ("<table>
                        <tr>
                            <th>Código producto</th>
                            <th>Gama</th>
                            <th>Nombre</th>
                            <th>Dimensiones</th>
                            <th>Cantidad Stock</th>
                            <th>Precio Proveedor</th>
                        </tr>            
                    ");
                
                //variables para sumar la cantidad de stock y hacer la media del precio
                $totalstock = 0;
                $sumaprecio = 0;

                //para hacer el siguiente bucle, miro el número de filas de la consulta
                $totalfilas=mysqli_num_rows($consulta);
                $totalcolumnas=mysqli_num_fields($consulta);

                for($cont=1; $cont<=$totalfilas; $cont++){
                    $datosfila = mysqli_fetch_row($consulta);
                
                    echo "<tr>";
                        for ($i=0; $i<$totalcolumnas; $i++){
                            echo "<td>" . $datosfila[$i] . "</td>";
                        }
                        //Aprovechamos para sumar el stock que aparece en la columna 5:
                        $totalstock=$totalstock+$datosfila[4];
                        //y aprovechamos para sumar el precio del producto para la media de luego:
                        $sumaprecio=$sumaprecio+$datosfila[5];
                    echo "</tr>";
                }

                //Calculo la media:
                $preciomedio=$sumaprecio/$totalfilas;

                print
                    ("<tr>
                        <td colspan='5'>Total productos diferentes:</td>
                        <td>" . $totalfilas . "</td>
                    </tr>
                    <tr>
                        <td colspan='5'>Precio medio por producto:</td>
                        <td>" . round($preciomedio, 2). "</td>
                    </tr>
                    <tr>
                        <td colspan='5'>Cantidad total de productos en stock:</td>
                        <td>" . $totalstock . "</td>
                    </tr>
                    </table>");
            } ///////////////////////////////////////////////////////////////////////////////////////////////

            //instruccion para seleccionar los proveedores
            $instruction = "SELECT DISTINCT proveedor FROM productos ORDER BY proveedor";
            $consultaprov = mysqli_query($conexion, $instruction) or die ("fallo en la consulta");

            //imprimo formulario con seleccionador de proveedores
            print 
                ("<div class='contenido'>
                    <h2>Consulta de productos por proveedor</h2>
                    <fieldset>
                        <form action='ej3.php' method='get'>
                            <label for='prov'>Selecciona proveedor: </label>
                            <select id='prov' name='prov'>");

            //para saber cuántas opciones tendré que poner en el select, lo obtengo así
            $nfilas = mysqli_num_rows($consultaprov);
            
            //y ahora hago un bucle con ese número para ir rellenando los option values
            for ($i=0; $i<$nfilas; $i++){
                $resultado = mysqli_fetch_array($consultaprov);
                echo "<option value='". $resultado['proveedor'] . "'>" . $resultado['proveedor'] . "</option>";
            }
                        
                        
            print
                ("             </select>
                            <button type='submit' name='mandar'>Enviar consulta</button>
                        </form>
                    </fieldset>
                </div>
                ");
            ?>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>