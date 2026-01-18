<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['usuario_logeado'])) { header("Location: login.php"); exit(); }

// 1. Estadísticas por Módulo (Mención) incluyendo conteo de expedientes
$sql_menciones = "SELECT mencion, COUNT(expediente) as total_exp, AVG(nota_final) as promedio_nota 
                  FROM pasantias GROUP BY mencion";
$res_menciones = mysqli_query($conexion, $sql_menciones);

// 2. Resumen General del Sistema
$sql_total = "SELECT COUNT(*) as gran_total FROM pasantias";
$res_total = mysqli_query($conexion, $sql_total);
$dato_total = mysqli_fetch_array($res_total);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes de Gestión - USM</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 40px; color: #333; }
        .card { border: 1px solid #ddd; padding: 20px; border-radius: 10px; background: #fdfdfd; box-shadow: 2px 2px 10px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
        th, td { border: 1px solid #ccc; padding: 12px; text-align: center; }
        th { background-color: #004a99; color: white; }
        .total-box { font-size: 1.2em; font-weight: bold; color: #004a99; margin-bottom: 20px; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body>
    <div class="no-print">
        <a href="menu_principal.php">⬅ Volver al Menú Principal</a>
    </div>

    <div class="card">
        <h1>Reportes Estadísticos de Pasantías</h1>
        <p class="total-box">Total de expedientes registrados en el sistema: <?php echo $dato_total['gran_total']; ?></p>

        <h3>Distribución por Módulo de Especialización</h3>
        <table>
            <thead>
                <tr>
                    <th>Módulo (Mención)</th>
                    <th>Expedientes Registrados</th>
                    <th>Promedio de Calificaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($m = mysqli_fetch_array($res_menciones)) { ?>
                <tr>
                    <td><strong><?php echo $m['mencion']; ?></strong></td>
                    <td><?php echo $m['total_exp']; ?></td>
                    <td><?php echo number_format($m['promedio_nota'], 2); ?> pts</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <br><br>
        <p><em>Este reporte genera una visión global del rendimiento estudiantil para la toma de decisiones administrativas.</em></p>
        
        <button class="no-print" onclick="window.print()" style="padding: 10px 20px; cursor: pointer; background: #28a745; color: white; border: none; border-radius: 5px;">
            🖨️ Imprimir Reporte / Guardar PDF
        </button>
    </div>
</body>
</html>