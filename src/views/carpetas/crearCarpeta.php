<?php
require_once __DIR__ . '/../../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $id_usuario = 1; // Asume un ID de usuario fijo por simplicidad
    $fecha_creacion = date('Y-m-d H:i:s');
    $id_carpeta_padre = !empty($_POST['id_carpeta_padre']) ? $_POST['id_carpeta_padre'] : null;

    try {
        // Insertar la carpeta en la base de datos
        $query = "INSERT INTO carpetas (nombre, id_usuario, fecha_creacion, id_carpeta_padre) VALUES (:nombre, :id_usuario, :fecha_creacion, :id_carpeta_padre)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':fecha_creacion', $fecha_creacion);
        $stmt->bindParam(':id_carpeta_padre', $id_carpeta_padre, PDO::PARAM_INT);
        $stmt->execute();

        // Manejar la subida de archivos
        if (!empty($_FILES['archivo']['name'][0])) {
            $carpeta_id = $pdo->lastInsertId();
            $upload_dir = __DIR__ . '/uploads/' . $carpeta_id . '/';
            mkdir($upload_dir, 0777, true);

            foreach ($_FILES['archivo']['name'] as $key => $filename) {
                $filepath = $upload_dir . basename($filename);
                move_uploaded_file($_FILES['archivo']['tmp_name'][$key], $filepath);
            }
        }

        echo "Carpeta creada exitosamente.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Método de solicitud no válido.";
}
?>