<?php
include "modulos/conexion.php";

$txtid = isset($_GET['id']) ? $_GET['id'] : "";

if (!empty($txtid)) {
    $stm = $conexion->prepare("SELECT * FROM productos WHERE Id_Productos = ?");
    $stm->bind_param("i", $txtid);
    $stm->execute();

    $result = $stm->get_result();
    $registro = $result->fetch_assoc();

    if ($registro) {
        $Categoria = $registro['Categoria'];
        $Marca = $registro['Marca'];
        $Precio = $registro['Precio'];
        $Descripcion = $registro['Descripcion'];
        $Nombre = $registro['Nombre'];
    } 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["btnactualizar"])) {
    $txtid = isset($_POST["id"]) ? $_POST["id"] : "";
    $Categoria = isset($_POST["Categoria"]) ? trim($_POST["Categoria"]) : "";
    $Marca = isset($_POST["Marca"]) ? trim($_POST["Marca"]) : "";
    $Precio = isset($_POST["Precio"]) ? (float)$_POST["Precio"] : 0;
    $Descripcion = isset($_POST["Descripcion"]) ? trim($_POST["Descripcion"]) : "";
    $Nombre = isset($_POST["Nombre"]) ? trim($_POST["Nombre"]) : "";


    $stm = $conexion->prepare("UPDATE productos SET Categoria = ?, Marca = ?, Precio = ?, Descripcion = ?, Nombre = ? WHERE Id_Productos = ?");
    $stm->bind_param("ssissi", $Categoria, $Marca, $Precio, $Descripcion, $Nombre, $txtid);

    if ($stm->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar: " . $conexion->error;
        exit();
    }
}
?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--titulo-->
    <title>EDITAR | MASTERPIECE</title>
    <link rel="icon" type="imagen/x-icon" href="imagenes/icono.png" />
    <!--bootstrapp-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!--iconos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="style.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200&display=swap"
        rel="stylesheet">
    <!--jquery-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Editar Producto</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($txtid) ?>">

            <div class="mb-3">
                <label for="Categoria" class="form-label">Categoría</label>
                <input type="text" class="form-control" name="Categoria" id="Categoria" value="<?= htmlspecialchars($Categoria) ?>" required>
            </div>
            <div class="mb-3">
                <label for="Marca" class="form-label">Marca</label>
                <input type="text" class="form-control" name="Marca" id="Marca" value="<?= htmlspecialchars($Marca) ?>" required>
            </div>
            <div class="mb-3">
                <label for="Precio" class="form-label">Precio</label>
                <input type="number" step="0.01" class="form-control" name="Precio" id="Precio" value="<?= htmlspecialchars($Precio) ?>" required>
            </div>
            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripcion</label>
                <input type="Text" class="form-control" name="Descripcion" id="Descripcion" value="<?= htmlspecialchars($Descripcion) ?>" required>
            </div>
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="Nombre" id="Nombre" value="<?= htmlspecialchars($Nombre) ?>" required>
            </div>

            <div class="text-center">
                <button type="submit" name="btnactualizar" class="btn btn-primary">Actualizar</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
        </form>
    </div>

 


    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!--js-->
    <script src="script.js"></script>
    <!--dataTable-->
</body>
            {
</html>}