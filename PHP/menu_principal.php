<?php
session_start();
if (!isset($_SESSION['usuario_logeado'])) { header("Location: login.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Gestión - FCS</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container" style="max-width: 900px;">
        <header>
            <h1>Bienvenido, <?php echo $_SESSION['usuario_logeado']; ?></h1>
            <p style="text-align: center; color: #666;">Sistema de Gestión de Pasantías - Facultad de Comunicación Social</p>
        </header>

        <div class="menu-grid">
            <a href="registro.php" class="card-button">
                <i class="fas fa-user-plus"></i>
                <span>Registrar Pasantía</span>
            </a>

            <a href="buscar.php" class="card-button">
                <i class="fas fa-search"></i>
                <span>Consultar Expedientes</span>
            </a>

            <a href="reportes.php" class="card-button">
                <i class="fas fa-chart-bar"></i>
                <span>Generar Reportes</span>
            </a>

            <a href="logout.php" class="card-button logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                <span>Cerrar Sesión</span>
            </a>
        </div>
    </div>
</body>
</html>