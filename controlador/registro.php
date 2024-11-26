<?php 
if (!empty($_POST["btnenviar"])) {
        
        
# registro eric 
       $Categoria = (!empty($_POST["Categoria"])?$_POST["Categoria"]:"");
       $Marca =(!empty($_POST["Marca"])?$_POST["Marca"]:"");
       $Precio = (!empty($_POST["Precio"])?$_POST["Precio"]:"");
       $Precio=(int)$Precio;
       $Descripcion = (!empty($_POST["Descripcion"])?$_POST["Descripcion"]:"");
       $Nombre = (!empty($_POST["Nombre"])?$_POST["Nombre"]:"");


       $stm=$conexion->prepare("INSERT INTO productos (Categoria, Marca, Precio, Descripcion, Nombre)
       VALUES('$Categoria','$Marca',$Precio,'$Descripcion','$Nombre')");



        

        $stm->execute();
header("location:../index.php");
}
?>