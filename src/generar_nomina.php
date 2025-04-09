<?php
include_once "base_de_datos.php";

if (!isset($_POST["ano_nomina"]) || !isset($_POST["mes_nomina"]) || !isset($_POST["per_nomina"])) {
    echo "Faltan datos para generar la nómina";
    exit();
}

// Capturamos los valores del formulario
$ano_nomina = $_POST["ano_nomina"];
$mes_nomina = $_POST["mes_nomina"];
$per_nomina = $_POST["per_nomina"];

try {
    // Preparamos la llamada a la función PostgreSQL
    $query = "SELECT fun_gen_nomina(:ano, :mes, :per) AS resultado;";
    $stmt = $base_de_datos->prepare($query);

    // Ejecutamos con los valores
    $stmt->execute([
        ":ano" => $ano_nomina,
        ":mes" => $mes_nomina,
        ":per" => $per_nomina
    ]);

    // Capturamos el resultado
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        echo "<h2>✅ Nómina generada correctamente</h2>";
        
        // Consulta para traer la nómina generada
        $query = "SELECT * FROM tab_nomina WHERE ano_nomina = :ano AND mes_nomina = :mes AND per_nomina = :periodo";
        $stmt2 = $base_de_datos->prepare($query);
        $stmt2->execute([':ano' => $ano_nomina, ':mes' => $mes_nomina, ':periodo' => $per_nomina]);

        // Mostrar resultados en tabla HTML
        echo "<table border='1' cellpadding='8'>";
        echo "<tr><th>Año</th><th>Mes</th><th>Periodo</th><th>ID Empleado</th><th>ID Concepto</th><th>Días</th><th>Valor</th></tr>";
        while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['ano_nomina']}</td>";
            echo "<td>{$row['mes_nomina']}</td>";
            echo "<td>{$row['per_nomina']}</td>";
            echo "<td>{$row['id_emplea']}</td>";
            echo "<td>{$row['id_concepto']}</td>";
            echo "<td>{$row['val_dias_trab']}</td>";
            echo "<td>{$row['val_nomina']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>❌ Error al generar nómina. Revise los parámetros o los mensajes internos de la función.</h2>";
    }


    echo "</table>";
} catch (PDOException $e) {
    echo "💥 Error en la ejecución: " . $e->getMessage();
}
?>