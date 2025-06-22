<?php
// includes/header.php
// ¡IMPORTANTE!: Iniciar la sesión al principio de cada archivo que use sesiones.
if (session_status() == PHP_SESSION_NONE) { // Solo inicia la sesión si no está ya iniciada
    session_start();
}

// Obtener información del usuario si ha iniciado sesión
$is_logged_in = isset($_SESSION['user_id']);
$logged_in_nombre = $is_logged_in ? htmlspecialchars($_SESSION['nombre'] ?? '') : '';
$logged_in_apellido = $is_logged_in ? htmlspecialchars($_SESSION['apellido'] ?? '') : '';
// $logged_in_username_display ya no se usará en el HTML, pero se mantiene en sesión si es útil para otras lógicas
$logged_in_username_display = $is_logged_in ? htmlspecialchars($_SESSION['username'] ?? '') : ''; 
$user_rol = $is_logged_in ? htmlspecialchars($_SESSION['rol'] ?? '') : ''; 

// Puedes cambiar el título dinámicamente si es necesario en cada página que lo incluya.
$page_title = isset($page_title) ? $page_title : 'Colegio | U.E Colegio María Auxiliadora';
$body_class = isset($body_class) ? $body_class : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:700&display=swap" rel="stylesheet">
</head>
<body class="<?php echo $body_class; ?>">

    <header class="main-header">
        <div class="container header-content">
            <a href="index.php" class="header-logo">
                <img src="assets/img/logo.png" alt="Logo del Colegio">
            </a>

            <nav class="main-nav">
                <ul class="nav-list">
                    <li class="active"><a href="index.php">Inicio</a></li>
                    <li class="has-submenu">
                        <a href="#">Colegio<i class="fas fa-chevron-down arrow-down"></i></a>
                        <ul class="submenu">
                            <li><a href="mision_vision.php">Misión y Visión</a></li>
                            <li><a href="ubicacion.php">Ubícanos</a></li>
                            <li><a href="#">Instalaciones</a></li>
                            </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#">Manual de Convivencia <i class="fas fa-chevron-down arrow-down"></i></a>
                        <ul class="submenu">
                            <li><a href="assets/docs/1  DISPOSICIONES FUNDAMENTALES.pdf" target="_blank">I. Disposiciones Fundamentales</a></li>
                            <li><a href="assets/docs/2  RESPONSABILIDADES Y DEBERES DE LOS ALUMNOS.pdf" target="_blank">II. Responsabilidades y deberes de los alumnos</a></li>
                            <li><a href="assets/docs/3  DERECHOS Y GARANTÍAS DE LOS ESTUDIANTES.pdf" target="_blank">III. DERECHOS Y GARANTÍAS DE LOS ESTUDIANTES</a></li>
                            <li><a href="assets/docs/4  RESPONSABILIDADES Y DEBERES DE LOS REPRESENTANTES.pdf" target="_blank">IV. DEBERES Y DERECHOS PP.RR</a></li>
                            <li><a href="assets/docs/5  DERECHOS Y GARANTÍAS DE LOS REPRESENTANTES.pdf" target="_blank">V. DERECHOS Y GARANTÍAS DE LOS REPRESENTANTES</a></li>
                            <li><a href="assets/docs/6  COMPROMISO DE INSCRIPCION REPRESENTANTES.pdf" target="_blank">VI. COMPROMISO</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="solicitud_cupo.php">Admisión</a>
                    </li>
                    <li><a href="contacto.php">Contacto</a></li>
                </ul>
            </nav>

            <div class="header-auth">
                <?php if ($is_logged_in): // Si el usuario ha iniciado sesión ?>
                    <div class="user-info-display">
                        <span class="user-full-name">¡Hola, <?php echo $logged_in_nombre . ' ' . $logged_in_apellido; ?>!</span>
                        </div>
                    <a href="logout.php" class="btn btn-logout">Cerrar Sesión</a>
                <?php else: // Si no ha iniciado sesión ?>
                    <a href="login.php" class="btn btn-primary">Acceder</a>
                    <a href="register.php" class="btn btn-secondary">Registrarse</a>
                <?php endif; ?>
            </div>

            <button class="menu-toggle" aria-label="Abrir menú">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </header>