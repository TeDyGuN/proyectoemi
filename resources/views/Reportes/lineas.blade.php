<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Reportes</title>
</head>
<body>
    <h2 align="center">Usuarios Registrados</h2>
    <?php
    echo('<table border="2px" align="center">
            <tr>
                <th>#</th>
                <th>Categoria</th>
                <th>Descripcion</th>
            </tr>');
            foreach($result as $f)
            {
                echo("<tr>");
                echo("<td>".$f->id."</td>");
                echo("<td>".$f->Categoria."</td>");
                echo("<td>".$f->Descripcion."</td>");
                echo("</tr>");
            }
    echo("
          </table>
    ");
    date_default_timezone_set('America/La_Paz');
    $hoy = getdate();
    echo("Reporte Generado en Fecha: ".$hoy['mday']."/".$hoy['mon']."/".$hoy['year']."     ".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds']);
    ?>
</body>
</html>
