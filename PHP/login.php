<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso - Gestión de Pasantías</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <h2>Acceso al Sistema FCS</h2>
        <form action="validar_login.php" method="POST">
            <label>Usuario Académico:</label>
            <input type="text" name="usuario" placeholder="Ej: admin" required>
            
            <label>Contraseña:</label>
            <input type="password" name="clave" placeholder="••••••••" required>
            
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>