<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Reportes</title>
</head>
<body>
    <h2 align="center">Trabajos de Investigacion Registrados</h2>
    <?php
    echo('<table border="2px" align="center">
            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Autor</th>
                <th>Correo Electronico</th>
            </tr>');
            foreach($result as $f)
            {
                echo("<tr>");
                echo("<td>".$f->id."</td>");
                echo("<td>".$f->titulo."</td>");
                echo("<td>".$f->Descripcion."</td>");
                echo("<td>".$f->last_name."</td>");
                echo("<td>".$f->first_name."</td>");
                echo("<td>".$f->email."</td>");
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
