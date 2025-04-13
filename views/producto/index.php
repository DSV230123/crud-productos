<?php
include_once '../templates/header.php';
?>

<div class="container justify-content-center mt-3">
    <div class="row">
        <div class="col">
            <h1 class="text-center mb-2" style="color: #6c5ce7;">INGRESO DE VEHICULO</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6">

            <form action="../../Controller/productos/guardar.php" method="POST" class="form-control">

                <div class="row mb-3">
                    <label for="producto_nombre">INGRESE EL NOMBRE DEL PRODUCTO</label>
                    <input type="text" name="producto_nombre" class="form-control" required>
                </div>

                <div class="row mb-3">
                    <label for="producto_precio">INGRESE EL PRECIO DEL PRODUCTO</label>
                    <input type="text" name="producto_precio" class="form-control" required>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-3 text-center">
                        <button type="submit" class="btn" style="background-color: #6c5ce7; color: white;">REGISTRAR</button>
                    </div>
                </div>
        </div>
    </div>

    </form>
</div>

<?php
include_once '../templates/footer.php';
?>
