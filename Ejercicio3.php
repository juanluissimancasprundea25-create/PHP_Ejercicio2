<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>El Lanzador de Dados</title>
    <style>
        .dado {
            display: inline-block;
            width: 50px;
            height: 50px;
            border: 2px solid #000;
            background-color: #fff;
            text-align: center;
            line-height: 50px;
            margin: 5px;
            font-weight: bold;
            border-radius: 8px;
        }
        .dados-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>El Lanzador de Dados</h2>
    <form method="POST">
        <label>¿Cuantos dados quieres lanzar? 
            <input type="number" name="num_dados" min="1" max="10" value="<?php echo isset($_POST['num_dados']) ? (int)$_POST['num_dados'] : 2; ?>">
        </label><br><br>
        <input type="submit" value="¡Lanzar dados!">
    </form>
    <hr>
    <?php
    if ($_POST) {
        $numDados = isset($_POST['num_dados']) ? (int)$_POST['num_dados'] : 2;

        // Lo limitamos entre 1 y 10
        $numDados = min(10, max(1, $numDados)); 
        $valores = [];
        $sumaTotal = 0;
        echo "<div class='dados-container'>";
        for ($i = 0; $i < $numDados; $i++) {
            $valor = rand(1, 6);
            $valores[] = $valor;
            $sumaTotal += $valor;
            echo "<div class='dado'>{$valor}</div>";
        }
        echo "</div>";
        echo "<p><strong>Suma total: {$sumaTotal}</strong></p>";
    }
    ?>
</body>
</html>
