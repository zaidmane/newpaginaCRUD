<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--titulo-->
    <title>Registro de Productos| MASTERPIECE</title>
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

    <!-- registro de Poductos eric-->
    <div class="container">
        <br>
        <form method="post">
            <?php
                include ("conexion.php");
                include ("../controlador/registro.php");
            ?>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Categoria</label>
                <input type="Text" class="form-control" name="Categoria">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Marca</label>
                <input type="Text" class="form-control" name="Marca">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio</label>
                <input type="Text" class="form-control" name="Precio">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                <input type="Text" class="form-control" name="Descripcion">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="Text" class="form-control" name="Nombre">
            </div>

            <div class="text-center">
                <!--alex-->
                <button type="submit" class="btn btn-outline-primary " name="btnenviar" value="ok">Enviar</button>
                <!--eric-->
                <a href="../index.php" class="btn btn-outline-dark">Atras</a>
            </div>
        </form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!--js-->
    <script src="script.js"></script>
    <!--dataTable-->
</body>

</html>