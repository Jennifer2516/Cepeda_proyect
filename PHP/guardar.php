<?php
include("conexion.php");

// Recibimos el nuevo campo
$expediente = $_POST['expediente'];
$cedula     = $_POST['cedula'];
$nombre     = $_POST['nombre'];
$empresa    = $_POST['empresa'];
$mencion    = $_POST['mencion'];
$periodo    = $_POST['periodo'];
$nota       = $_POST['nota'];

// Manejo del archivo PDF
$nombre_archivo = $_FILES['archivo']['name'];
$ruta_temporal  = $_FILES['archivo']['tmp_name'];
$ruta_destino   = "uploads/" . $nombre_archivo;

if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
    // Agregamos 'expediente' tanto en las columnas como en los valores
    $sql = "INSERT INTO pasantias (expediente, cedula_estudiante, nombre_estudiante, empresa, mencion, periodo_academico, nota_final, archivo_pdf) 
            VALUES ('$expediente', '$cedula', '$nombre', '$empresa', '$mencion', '$periodo', '$nota', '$nombre_archivo')";
    
    if (mysqli_query($conexion, $sql)) {
        echo "¡Registro exitoso! El expediente $expediente ha sido guardado.";
    } else {
        echo "Error al guardar: " . mysqli_error($conexion);
    }
}
?> else {
    echo "Error al subir el archivo PDF.";
}