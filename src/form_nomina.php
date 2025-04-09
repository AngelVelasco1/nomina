<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generar Nómina</title>
</head>
<body>
    <h2>Generar Nómina</h2>
    <form action="generar_nomina.php" method="POST">
        <label for="ano_nomina">Año:</label>
        <input type="number" name="ano_nomina" required><br><br>

        <label for="mes_nomina">Mes:</label>
        <select name="mes_nomina" required>
            <option value="">-- Selecciona --</option>
            <?php
                for ($i = 1; $i <= 12; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select><br><br>

        <label for="per_nomina">Período:</label>
        <select name="per_nomina" required>
            <option value="1">Primera Quincena</option>
            <option value="2">Segunda Quincena</option>
        </select><br><br>

        <input type="submit" value="Generar Nómina">
    </form>
</body>
</html>
