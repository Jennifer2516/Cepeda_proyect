<?php
include("conexion.php");
session_start(); // Inicia una sesión para mantener al usuario conectado

$usuario = $_POST['usuario'];
$clave   = $_POST['clave'];

// Consulta para buscar al usuario
$sql = "SELECT * FROM usuarios WHERE username = '$usuario' AND password = '$clave'";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    // Si las credenciales son válidas (Rombo "SI" del diagrama)
    $_SESSION['usuario_logeado'] = $usuario;
    header("Location: menu_principal.php");
} else {
    // Si no son válidas (Rombo "NO" del diagrama)
    echo "<script>
            alert('Credenciales incorrectas. Intente de nuevo.');
            window.location.href='login.php';
          </script>";
}
?>