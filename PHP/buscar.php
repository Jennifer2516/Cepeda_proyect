<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['usuario_logeado'])) { header("Location: login.php"); exit(); }

// Capturamos los filtros
$expediente = isset($_GET['expediente']) ? $_GET['expediente'] : '';
$periodo    = isset($_GET['periodo']) ? $_GET['periodo'] : '';
$mencion    = isset($_GET['mencion']) ? $_GET['mencion'] : '';

// Consulta base
$sql = "SELECT * FROM pasantias WHERE 1=1";

// Lógica de filtrado
if($expediente != '') { $sql .= " AND expediente LIKE '%$expediente%'"; }
if($periodo != '')    { $sql .= " AND periodo_academico = '$periodo'"; }
if($mencion != '')    { $sql .= " AND mencion = '$mencion'"; }

$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Pasantías - FCS</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .filtros { background: #f9f9f9; padding: 20px; border-radius: 8px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <h1>Consulta de Expedientes de Pasantías</h1>
    <a href="menu_principal.php">Volver al Menú</a><br><br>

    <div class="filtros">
        <form method="GET">
            <input type="text" name="expediente" placeholder="Buscar por N° Expediente" value="<?php echo $expediente; ?>">
            
            <input type="text" name="periodo" placeholder="Periodo (Ej: 2025-01)" value="<?php echo $periodo; ?>">
            
            <select name="mencion">
                <option value="">Todos los Módulos</option>
                <option value="Audiovisual" <?php if($mencion == 'Audiovisual') echo 'selected'; ?>>Audiovisual</option>
                <option value="Impresos" <?php if($mencion == 'Impresos') echo 'selected'; ?>>Impresos</option>
                <option value="Corporativo" <?php if($mencion == 'Corporativo') echo 'selected'; ?>>Corporativo</option>
            </select>
            
            <button type="submit">Aplicar Filtros</button>
            <a href="buscar.php">Limpiar</a>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Expediente</th>
                <th>Estudiante</th>
                <th>Módulo</th>
                <th>Periodo</th>
                <th>Nota</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila = mysqli_fetch_array($resultado)) { ?>
            <tr>
                <td><strong><?php echo $fila['expediente']; ?></strong></td>
                <td><?php echo $fila['nombre_estudiante']; ?></td>
                <td><?php echo $fila['mencion']; ?></td>
                <td><?php echo $fila['periodo_academico']; ?></td>
                <td><?php echo $fila['nota_final']; ?></td>
                <td>
                    <a href="uploads/<?php echo $fila['archivo_pdf']; ?>" target="_blank">📄 Ver PDF</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>