<?php
include "modulos/conexion.php";

  if(!empty($_GET['id'])){
      $txtid=(!empty($_GET['id'])?$_GET['id']:"");
      $stm=$conexion->prepare("DELETE FROM productos WHERE id_Productos = ?");
      $stm->bind_param("i",$txtid);
      $stm->execute();
   
  }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--titulo-->
    <title>CRUD | MASTERPIECE</title>
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

    <!-- siderbar inicio Eric-->
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">

        <div class="sidebar-brand">
            <h2><span class="bi bi-command"></span> <span>MASTERPIECE</span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="#" class="sidebar-link">
                        <span class="bi bi-house-door"></span><span>Nosotros</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="sidebar-link">
                        <span class="bi bi-list-task"></span><span>Nuestros Productos</span>
                    </a>
                </li>

                <li>
                    <a href="modulos/registro_productos.php" class="sidebar-link">
                        <span class="bi bi-clipboard2"></span><span>Registro de Productos</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="sidebar-link">
                        <span class="bi bi-people-fill"></span><span> Contacto</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--sidebar fin-->


    <!--menu busqueda inicio Alex-->

    <div class="main-content">
        <header>
            <h2><label for="nav-toggle"><span class="bi bi-list"></span></label> CRUD | E&A</h2>

            <div class="search-wrapper">
                <form>
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Buscar aqui..." />
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </header>
        <!--menu busqueda fin-->

        <!-- cards inicio Eric-->
        <main>
            <div class="cards">

                <div class="card-single">
                    <div class="card-body sales-card">
                        <h5 class="card-title">Ventas| Diarias</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>145</h6>
                                <span class="text-success small pt-1 fw-bold">20%</span> <span
                                    class="text-muted small pt-2 ps-1">aumento</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-single">
                    <div class="card-body revenue-card">
                        <h5 class="card-title">Ganancias| Mensuales</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                                <h6>$3,264</h6>
                                <span class="text-success small pt-1 fw-bold">8%</span> <span
                                    class="text-muted small pt-2 ps-1">aumentar</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-single">
                    <div class="card-body customers-card">
                        <h5 class="card-title">Clientes| Anuales</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>1244</h6>
                                <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                    class="text-muted small pt-2 ps-1">Disminiye</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>

            <!-- cards fin-->

            <!-- tabla-crud inicio Alex-->
            <div class="container">
                <div class="col-12">
                    <table id="example" style="width:100%" class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Nombre</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "modulos/conexion.php";
                                $stm = $conexion->query("SELECT * FROM productos");
                                while ($datos = $stm->fetch_object()) { 
                                   ?>
                            <tr>
                                <td><?= $datos->Id_Productos ?></td>
                                <td><?= $datos->Categoria ?></td>
                                <td><?= $datos->Marca ?></td>
                                <td><?= $datos->Precio ?></td>
                                <td><?= $datos->Descripcion ?></td>
                                <td><?= $datos->Nombre ?></td>
                                <td>
                                    <a href="editar.php?id=<?= $datos->Id_Productos ?>" class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i></a>
                                    <a href="index.php?id=<?= $datos->Id_Productos ?>" class="btn btn-outline-danger"><i class="bi bi-trash3"></i></a>
                                </td>
                            </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                    <div class="container">
                        <!--boton de agregar-->
                        <a href="modulos/registro_productos.php" class="btn btn-outline-primary">Agregar</a>
                    </div>
                </div>
            </div> <!-- tabla-crud fin -->
        </main>
    </div>


    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!--js-->
    <script src="script.js"></script>
    <!--dataTable-->
</body>

</html>