<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>El Censor de Comentarios</title>
    <style>
        .comentario-censurado {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 15px;
            margin-top: 20px;
            font-family: Arial, sans-serif;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>El Censor de Comentarios</h2>

    <!-- Palabra a censurar -->
    <form method="POST">
        <label for="comentario">Escribe tu comentario:</label><br>
        <textarea name="comentario" id="comentario" rows="6" cols="60" placeholder="Escribe algo..."><?php 
            echo isset($_POST['comentario']) ? htmlspecialchars($_POST['comentario']) : '';
        ?></textarea><br><br>
        <input type="submit" value="Publicar">
    </form>
    <hr>

    <!-- Mostrar el comentario censurado -->
    <?php
    if ($_POST && isset($_POST['comentario'])) {
        $comentario = $_POST['comentario'];
        $prohibidas = ["tonto", "feo", "imbecil"];
        $comentarioCensurado = $comentario;
        foreach ($prohibidas as $palabra) {
            $asteriscos = str_repeat('*', strlen($palabra));
            $comentarioCensurado = str_ireplace($palabra, $asteriscos, $comentarioCensurado);
        }
        echo "<div class='comentario-censurado'>";
        echo htmlspecialchars($comentarioCensurado);
        echo "</div>";
    }
    ?>
</body>
</html>
