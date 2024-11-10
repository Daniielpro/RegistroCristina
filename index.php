<?php
session_start();

// Inicializar el array de usuarios en la sesión si no existe
if (!isset($_SESSION['usuarios'])) {
    $_SESSION['usuarios'] = [];
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    // Validar que todos los campos están completos
    if (!empty($cedula) && !empty($nombre) && !empty($correo) && !empty($telefono)) {
        // Agregar el usuario al array en la sesión
        $_SESSION['usuarios'][] = [
            'cedula' => htmlspecialchars($cedula),
            'nombre' => htmlspecialchars($nombre),
            'correo' => htmlspecialchars($correo),
            'telefono' => htmlspecialchars($telefono)
        ];
    } else {
        echo "<p style='color:red;'>Por favor completa todos los campos.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
</head>
<body>
    <h2>Registro de Usuarios PHP</h2>
    <!-- Formulario para ingresar datos -->
    <form method="POST" action="">
        <label for="cedula">Cédula:</label>
        <input type="text" id="cedula" name="cedula" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <button type="submit">Registrar</button>
    </form>

    <h3>Usuarios Registrados</h3>

    <!-- Tabla para mostrar los usuarios registrados -->
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
        </tr>
        <?php
        // Mostrar los usuarios registrados en la tabla
        if (!empty($_SESSION['usuarios'])) {
            foreach ($_SESSION['usuarios'] as $usuario) {
                echo "<tr>";
                echo "<td>" . $usuario['cedula'] . "</td>";
                echo "<td>" . $usuario['nombre'] . "</td>";
                echo "<td>" . $usuario['correo'] . "</td>";
                echo "<td>" . $usuario['telefono'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay usuarios registrados.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
