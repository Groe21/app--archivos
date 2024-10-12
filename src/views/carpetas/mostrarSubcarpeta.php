<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

class ContenidoCarpeta {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerContenido($carpetaId) {
        try {
            // Obtener los documentos de la carpeta
            $queryDocumentos = "SELECT * FROM documentos WHERE id_carpeta = :carpeta_id";
            $stmtDocumentos = $this->pdo->prepare($queryDocumentos);
            $stmtDocumentos->bindParam(':carpeta_id', $carpetaId, PDO::PARAM_INT);
            $stmtDocumentos->execute();
            $documentos = $stmtDocumentos->fetchAll(PDO::FETCH_ASSOC);

            // Obtener las subcarpetas de la carpeta
            $queryCarpetas = "SELECT * FROM carpetas WHERE id_carpeta_padre = :carpeta_id";
            $stmtCarpetas = $this->pdo->prepare($queryCarpetas);
            $stmtCarpetas->bindParam(':carpeta_id', $carpetaId, PDO::PARAM_INT);
            $stmtCarpetas->execute();
            $carpetas = $stmtCarpetas->fetchAll(PDO::FETCH_ASSOC);

            return ['documentos' => $documentos, 'carpetas' => $carpetas];
        } catch (PDOException $e) {
            throw new Exception("Error al obtener el contenido de la carpeta: " . $e->getMessage());
        }
    }
}