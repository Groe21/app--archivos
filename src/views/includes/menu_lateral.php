<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/app/startbootstrap-sb-admin-2/public/principal.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Inicio</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        General
    </div>

    <!-- Nav Item - Users -->
    <li class="nav-item">
        <a class="nav-link" href="users.html">
            <i class="fas fa-fw fa-users"></i>
            <span>Usuarios</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFolders"
            aria-expanded="true" aria-controls="collapseFolders">
            <i class="fas fa-fw fa-folder"></i>
            <span>Carpetas</span>
        </a>
        <div id="collapseFolders" class="collapse" aria-labelledby="headingFolders" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestión de Carpetas:</h6>
                <a class="collapse-item" href="#" data-toggle="modal" data-target="#crearCarpetaModal" data-carpeta-padre-id="">Crear Carpeta</a>
                <a class="collapse-item" href="editar-carpeta.html">Editar Carpeta</a>
                <a class="collapse-item" href="#" data-toggle="modal" data-target="#eliminarCarpetaModal">Eliminar Carpeta</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFiles"
            aria-expanded="true" aria-controls="collapseFiles">
            <i class="fas fa-fw fa-file"></i>
            <span>Archivos</span>
        </a>
        <div id="collapseFiles" class="collapse" aria-labelledby="headingFiles" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestión de Archivos:</h6>
                <a class="collapse-item" href="#" data-toggle="modal" data-target="#crearArchivoModal">Crear Archivo</a>
                <a class="collapse-item" href="editar-archivo.html">Editar Archivo</a>
                <a class="collapse-item" href="#" data-toggle="modal" data-target="#eliminarArchivoModal">Eliminar Archivo</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Mas Opciones
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>