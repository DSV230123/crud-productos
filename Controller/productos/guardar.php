<?php
include_once '../../views/templates/header.php';
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require '../../modelos/producto.php';

$_POST['producto_nombre'] = htmlspecialchars($_POST['producto_nombre']);
$_POST['producto_precio'] = filter_var($_POST['producto_precio'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

try {
    $nuevo_usuario = new Productos($_POST);
    $usuario = $nuevo_usuario->guardar();

    $resultado = [
        'mensaje' => 'PRODUCTO INGRESADO SATISFACTORIAMENTE',
        'codigo' => 1,
    ];
} catch (Exception $e) {
    $resultado = [
        'mensaje' => 'OCURRIÓ UN ERROR EN LA EJECUCIÓN',
        'detalle' => $e->getMessage(),
        'codigo' => 0,
    ];
    echo "<pre>";
    echo "Error completo: " . $e->getMessage() . "\n";
    echo "Archivo: " . $e->getFile() . " en línea " . $e->getLine() . "\n";
    echo "Rastreo: " . $e->getTraceAsString();
    echo "</pre>";
}

$colores = ['danger', 'success'];
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="alert alert-<?= $colores[$resultado['codigo']] ?> text-center" role="alert" style="font-weight: bold;">
                <h3><?= $resultado['mensaje'] ?></h3>

                <?php if ($resultado['codigo'] == 0): ?>
                    <p><?= $resultado['detalle'] ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
include_once '../../views/templates/footer.php';
?>