<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

class MostrarCarpeta {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerCarpetas() {
        $query = "SELECT * FROM carpetas WHERE id_carpeta_padre IS NULL";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function generarTarjetas() {
        $carpetas = $this->obtenerCarpetas();
        $html = '';

        foreach ($carpetas as $carpeta) {
            $html .= '
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="ver_contenido_carpeta.php?id=' . htmlspecialchars($carpeta['id']) . '" class="text-decoration-none">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <input type="checkbox" name="carpetaSeleccionada" value="' . htmlspecialchars($carpeta['id']) . '">
                                </div>
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        ' . htmlspecialchars($carpeta['nombre']) . '
                                </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-folder fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>';
        }

        return $html;
    }
}


?>