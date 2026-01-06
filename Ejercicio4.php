<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversor Universal</title>
</head>
<body>
    <h2>Conversor Universal</h2>
    <form method="POST">
        <label>Cantidad: 
            <input type="number" step="any" name="cantidad" value="<?php echo isset($_POST['cantidad']) ? htmlspecialchars($_POST['cantidad']) : '100'; ?>" required>
        </label><br><br>
        <label>Conversion: 
            <select name="conversion">
                <option value="eur_usd" <?php echo (isset($_POST['conversion']) && $_POST['conversion'] == 'eur_usd') ? 'selected' : ''; ?>>Euros a Dolares</option>
                <option value="usd_eur" <?php echo (isset($_POST['conversion']) && $_POST['conversion'] == 'usd_eur') ? 'selected' : ''; ?>>Dolares a Euros</option>
                <option value="m_ft"    <?php echo (isset($_POST['conversion']) && $_POST['conversion'] == 'm_ft') ? 'selected' : ''; ?>>Metros a Pies</option>
                <option value="ft_m"    <?php echo (isset($_POST['conversion']) && $_POST['conversion'] == 'ft_m') ? 'selected' : ''; ?>>Pies a Metros</option>
            </select>
        </label><br><br>
        <input type="submit" value="Convertir">
    </form>
    <hr>
    <?php
    if ($_POST) {
        $cantidad = isset($_POST['cantidad']) ? (float)$_POST['cantidad'] : 0;
        $conversion = $_POST['conversion'] ?? 'eur_usd';

        // Tasas y factores
        // 1 euro = 1.08 dolar
        $tasa_eur_usd = 1.08; 

        // 1 metro = 3.28084 pies
        $factor_m_ft = 3.28084; 
        $resultado = '';

        // Permitimos negativos (ej. deuda en divisas)
        $cantidad_abs = abs($cantidad); 
        switch ($conversion) {
            case 'eur_usd':
                $valor = $cantidad * $tasa_eur_usd;
                $resultado = "$cantidad Euros equivalen a " . number_format($valor, 2) . " Dolares";
                break;
            case 'usd_eur':
                $valor = $cantidad / $tasa_eur_usd;
                $resultado = "$cantidad Dolares equivalen a " . number_format($valor, 2) . " Euros";
                break;
            case 'm_ft':
                if ($cantidad < 0) {
                    $resultado = "No se admiten distancias negativas en metros.";
                } else {
                    $valor = $cantidad * $factor_m_ft;
                    $resultado = "$cantidad metros equivalen a " . number_format($valor, 2) . " pies";
                }
                break;
            case 'ft_m':
                if ($cantidad < 0) {
                    $resultado = "No se admiten distancias negativas en pies.";
                } else {
                    $valor = $cantidad / $factor_m_ft;
                    $resultado = "$cantidad pies equivalen a " . number_format($valor, 2) . " metros";
                }
                break;
            default:
                $resultado = "Conversion no valida.";
        }
        if ($resultado) {
            echo "<p><strong>{$resultado}</strong></p>";
        }
    }
    ?>
</body>
</html>
