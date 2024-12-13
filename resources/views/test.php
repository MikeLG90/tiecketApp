<?php
// Configuración de conexión
$host = '10.9.1.30';
$user = 'visor1';
$password = 'Visor.1';
$database = 'visor1';

// Crear conexión
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener todas las tablas en la base de datos
$sqlTables = "SHOW TABLES";
$resultTables = $conn->query($sqlTables);

if ($resultTables->num_rows > 0) {
    // Iterar sobre cada tabla
    while ($row = $resultTables->fetch_array()) {
        $tableName = $row[0];
        echo "<h2>Tabla: $tableName</h2>";

        // Obtener la estructura de la tabla
        $sqlDescribe = "DESCRIBE $tableName";
        $resultDescribe = $conn->query($sqlDescribe);

        if ($resultDescribe->num_rows > 0) {
            // Crear una tabla HTML para mostrar la estructura
            echo "<table border='1'>";
            echo "<tr>
                    <th>Campo</th>
                    <th>Tipo</th>
                    <th>Null</th>
                    <th>Clave</th>
                    <th>Valor predeterminado</th>
                    <th>Extra</th>
                  </tr>";

            while ($rowDescribe = $resultDescribe->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($rowDescribe['Field']) . "</td>
                        <td>" . htmlspecialchars($rowDescribe['Type']) . "</td>
                        <td>" . htmlspecialchars($rowDescribe['Null']) . "</td>
                        <td>" . htmlspecialchars($rowDescribe['Key']) . "</td>
                        <td>" . htmlspecialchars($rowDescribe['Default']) . "</td>
                        <td>" . htmlspecialchars($rowDescribe['Extra']) . "</td>
                      </tr>";
            }

            echo "</table><br>";
        } else {
            echo "No se pudo describir la tabla $tableName.<br>";
        }
    }
} else {
    echo "No se encontraron tablas en la base de datos.";
}

// Cerrar conexión
$conn->close();
?>
