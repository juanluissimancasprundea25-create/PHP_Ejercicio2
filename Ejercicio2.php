<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de Tablas Dinamicas</title>
    <style>
        table { border-collapse: collapse; margin-top: 20px; }
        td, th { border: 1px solid #000; padding: 8px; text-align: center; }
    </style>
</head>
<body>
    <h2>Generador de Tablas Dinamicas</h2>
    <form method="POST">
        <label>Filas: 
            <input type="number" name="filas" min="1" max="20" value="<?php echo isset($_POST['filas']) ? (int)$_POST['filas'] : 3; ?>">
        </label><br><br>
        <label>Columnas: 
            <input type="number" name="columnas" min="1" max="20" value="<?php echo isset($_POST['columnas']) ? (int)$_POST['columnas'] : 3; ?>">
        </label><br><br>
        <input type="submit" value="Generar Tabla">
    </form>
    <hr>
    <?php
    if ($_POST) {
        $filas = isset($_POST['filas']) ? (int)$_POST['filas'] : 3;
        $columnas = isset($_POST['columnas']) ? (int)$_POST['columnas'] : 3;
        $filas = max(1, min(20, $filas));
        $columnas = max(1, min(20, $columnas));
        echo "<table>";
        $contador = 1;
        for ($i = 1; $i <= $filas; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= $columnas; $j++) {
                echo "<td>{$contador}</td>";
                $contador++;
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
