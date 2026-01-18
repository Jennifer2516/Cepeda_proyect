<?php
session_start();
session_destroy(); // Elimina los datos de la sesión
header("Location: login.php"); // Devuelve al usuario al inicio
exit();
?>