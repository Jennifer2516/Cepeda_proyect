<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Pasantías - FCS</title>
    <style>
        body { font-family: sans-serif; margin: 40px; line-height: 1.6; }
        input, select { margin-bottom: 15px; padding: 8px; width: 300px; }
        label { font-weight: bold; display: block; }
    </style>
</head>
<body>
    <h2>Formulario de Registro de Pasantía</h2>
    <form action="guardar.php" method="POST" enctype="multipart/form-data">
        
        <label>Expediente:</label>
        <input type="text" name="expediente" placeholder="N° de Expediente Académico" required>

        <label>Cédula:</label>
        <input type="text" name="cedula" placeholder="Cédula del estudiante" required>

        <label>Nombre Completo:</label>
        <input type="text" name="nombre" placeholder="Nombres y Apellidos" required>

        <label>Empresa:</label>
        <input type="text" name="empresa" placeholder="Lugar de pasantía" required>
        
        <label>Módulo de Especialización:</label>
        <select name="mencion">
            <option value="Audiovisual">Audiovisual</option>
            <option value="Impresos">Impresos</option>
            <option value="Corporativo">Corporativo</option>
        </select>

        <label>Periodo Académico:</label>
        <input type="text" name="periodo" placeholder="Ej: 2025-01" required>

        <label>Nota Final:</label>
        <input type="number" step="0.01" name="nota" placeholder="0.00" required>
        
        <label>Informe Digitalizado (Solo PDF):</label>
        <input type="file" name="archivo" accept=".pdf" required>
        
        <br>
        <button type="submit" style="padding: 10px 20px; background: #28a745; color: white; border: none; cursor: pointer;">
            Guardar Pasantía
        </button>
    </form>
</body>
</html>