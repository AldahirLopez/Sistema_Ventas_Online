<?php
 session_start();
 include 'registros/conexion.php';
 if(isset($_SESSION['carrito'])){
     //si ya esta agregado
     if(isset($_GET['id']) && isset($_GET['id_talla'])){
        $arreglo = $_SESSION['carrito'];
        $encontro = false;
        $numero = 0;
        for($i=0;$i<count($arreglo);$i++){
          if($arreglo[$i]['Id'] == $_GET['id'] && $arreglo[$i]['Talla'] == $_GET['id_talla']){
            $encontro = true;
            $numero=$i;
          }
        }
        if($encontro == true){
          $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad']+1;
          $_SESSION['carrito']=$arreglo;
        }else{
          //no estaba 
          $nombre="";
          $precio="";
          $imagen="";
          $res = $conexion -> query('select * from items where id='.$_GET['id'])or die($conexion -> error );
          $fila = mysqli_fetch_row($res);
          $nombre=$fila[1];
          $precio=$fila[3];
          $imagen=$fila[7];
          $desc=$fila[4];
          $talla=$_GET['id_talla'];
          $categoria=$fila[6];
          $arregloNuevo = array(
              'Id' => $_GET['id'],
              'Nombre' => $nombre,
              'Precio' => $precio,
              'Imagen' => $imagen,
              'Descripcion' => $desc,
              'Talla' => $talla,
              'Categoria' => $categoria,
              'Cantidad' => 1
          );
          array_push($arreglo, $arregloNuevo);
          $_SESSION['carrito'] = $arreglo;
        }
     }

 }else{
     //si no existe
     if(isset($_GET['id'])){
         $nombre="";
         $precio="";
         $imagen="";
         $res = $conexion -> query('select * from items where id='.$_GET['id'])or die($conexion -> error );
         $fila = mysqli_fetch_row($res);
         $nombre=$fila[1];
         $precio=$fila[3];
         $imagen=$fila[7];
         $desc=$fila[4];
         $talla=$_GET['id_talla'];
         $categoria=$fila[6];
         $arreglo[] = array(
             'Id' => $_GET['id'],
             'Nombre' => $nombre,
             'Precio' => $precio,
             'Imagen' => $imagen,
             'Descripcion' => $desc,
             'Talla' => $talla,
             'Categoria' => $categoria,
             'Cantidad' => 1
         );
         $_SESSION['carrito']=$arreglo;
     }
      
 }
   header("Location: itemone.php?id=".$_GET['id']);
?>