<?php
session_start();
$arreglo = $_SESSION['carrito'];
for($i=0;$i<count($arreglo);$i++){
   if($arreglo[$i]['Id'] != $_POST['id']){
       $arregloNuevo[]= array(
           'Id' => $arreglo[$i]['Id'],
           'Nombre' => $arreglo[$i]['Nombre'],
           'Precio' => $arreglo[$i]['Precio'],
           'Imagen' => $arreglo[$i]['Imagen'],
           'Cantidad' => $arreglo[$i]['Cantidad'],
           'Descripcion' => $arreglo[$i]['Descripcion'],
           'Talla' => $arreglo[$i]['Talla'],
           'Categoria' => $arreglo[$i]['Categoria']
       );
   } 
}
if(isset($arregloNuevo)){
    $_SESSION['carrito'] = $arregloNuevo;
}else{
    //registro a eliminar es unico
    unset($_SESSION['carrito']);
}
echo "listo";
?>