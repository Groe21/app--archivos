<?php
require_once __DIR__ . '/../../../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carpetaId = $_POST['id'];

    try {
        // Eliminar la carpeta de la base de datos
        $query = "DELETE FROM carpetas WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $carpetaId);
        $stmt->execute();

        echo "Carpeta eliminada exitosamente.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Método de solicitud no válido.";
}
?>