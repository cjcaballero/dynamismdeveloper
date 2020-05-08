<?php

  	require '../database.php';
    include '../dbConfig.php';


       $action = $_GET['action'];
       //$usuario  = $_GET['user'];

        

        if(!empty($_POST['user'])) {

          $usuario  = $_POST['user'];

        }

        if(!empty($_GET['user'])) {

          $usuario  = $_GET['user'];

        }

        if(!empty($_POST['id'])) {

          $id = $_POST['id'];

        }

        if(!empty($_POST['tipoinv'])) {

          $tipoinv = $_POST['tipoinv'];

        }

        if(!empty($_POST['precio'])) {
        
          $Precio = $_POST['precio'];

        }

        if(!empty($_POST['stock'])) {
          
          $Stock = $_POST['stock'];

        }

        if(!empty($_POST['codigo'])) {
          
          $codigo   = $_POST['codigo'];

        }

        if(!empty($_POST['producto'])) {
          
          $producto = $_POST['producto'];

        }

        if(!empty($_POST['precio'])) {
          
          $precio   = $_POST['precio'];

        }

        if(!empty($_POST['stock'])) {
          
          $stock    = $_POST['stock']; 

        }

        if(!empty($_POST['unidad'])) {
          
          $unidad    = $_POST['unidad']; 

        }

        if(!empty($_POST['categoria'])) {
          
          $categoria = $_POST['categoria']; 

        }

        if(!empty($_POST['proveedor'])) {
          
          $proveedor = $_POST['proveedor']; 

        }

        if(!empty($_POST['categoria'])) {

            $idcategoria  = $_POST['categoria'];

          }

        if(!empty($_POST['producto'])) {

            $idproducto  = $_POST['producto'];

        }

        if(!empty($_POST['cantidad'])) {

            $cantidad  = $_POST['cantidad'];

        }

        if(!empty($_POST['unidad'])) {

            $idunidad  = $_POST['unidad'];

        }


 //===================================================================================================//


       //Obtenemos el Id del Cajero
       $query = $db->query("SELECT id FROM catUsers WHERE name = '".$usuario."'");

       $custRow = $query->fetch_assoc();

       $idCajero = $custRow['id']; 


 //===================================================================================================//

        //Transacciones Cuentas

        if ($action == 'actualizainventario'){


                   //Obtenemos registro inventario por producto antes de guardar cambios
                   $query = $db->query("SELECT * FROM catproductos WHERE id = '".$id."'");

                   $custRow = $query->fetch_assoc();

                   $idprod = $custRow['id']; 
                   $codigo = $custRow['codigo']; 
                   $nombreprod = $custRow['nombre']; 
                   $precioprod = $custRow['precio']; 
                   $stockprod = $custRow['stock']; 
                   $idcategoria = $custRow['idcategoria']; 
                   $idproveedor = $custRow['idproveedor']; 
                   $idunidad = $custRow['idunidad']; 
                   $idcajeroprod = $custRow['idcajero']; 
                   $idstatus = $custRow['idstatus']; 
                   $fecha = $custRow['fecha']; 

                   //if($precioprod != $Precio || $stockprod != $Stock){


                        //Guardamos Historial
                        $db = Database::connect();
                        $statement = $db->prepare("INSERT INTO historialinventario (idcatproductos,codigo,nombre,precio,stock,idcategoria,idproveedor,idunidad,idcajero,idstatus,fechacaptura) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        $statement->execute(array($idprod,'00000',$nombreprod,$precioprod,$stockprod,$idcategoria,$idproveedor,$idunidad,$idcajeroprod,$idstatus,$fecha));
                        Database::disconnect();

                        // Actualizamos datos
                        $db = Database::connect();
                        $statement = $db->prepare("UPDATE catproductos SET precio = ?, stock = ? WHERE id = '".$id."'");
                        $statement->execute(array($Precio,$Stock));
                        Database::disconnect();



                        if( $statement ){
                  
                          $return = "ok";

                        } else{

                          $return = "fail";
                        }

                        header("Location:muestrainventario.php?user=$usuario&action=Insumos&return=$return");


                   // }else{


                   //       header("Location:muestrainventario.php?user=$usuario&action=$tipoinv&return=fail");

                   // }


        }

        //===================================================================================================//

           if ($action == 'eliminaritem'){


                $db = Database::connect();
                $statement = $db->prepare("DELETE FROM catproductos WHERE Id = ?");
                $statement->execute(array($id));
                Database::disconnect();


                $db = Database::connect();
                $statement = $db->prepare("DELETE FROM historialinventario WHERE idcatproductos = ?");
                $statement->execute(array($id));
                Database::disconnect();


                header("Location:muestrainventario.php?user=$usuario&action=Insumos&return=elimina");


           }


         //===================================================================================================//



           if ($action == 'nuevoitem'){


              $db = Database::connect();
              $statement = $db->prepare("INSERT INTO catproductos (codigo,nombre,precio,stock,idcategoria,idproveedor,idunidad,idcajero,idstatus) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
              $statement->execute(array('00000',$producto,$precio,$stock,$categoria,$proveedor,$unidad,$idCajero,1));
              Database::disconnect();
              
              if( $statement ){
                  
                   $return = "new";

              } else{

                   $return = "fail";
              }


              header("Location:muestrainventario.php?user=$usuario&action=Insumos&return=$return");


           }


         //===================================================================================================//

           if ($action == 'salidaitem'){


             
              $db = Database::connect();
              $statement = $db->prepare("INSERT INTO salidainventario (idcategoria,idproducto,cantidad,idunidad,idusuario) values(?, ?, ?, ?, ?)");
              $statement->execute(array($idcategoria,$idproducto,$cantidad,$idunidad,$idCajero));
              Database::disconnect();

             //Obtenemos registro inventario por producto antes de guardar cambios
             $query = $db->query("SELECT id,stock FROM catproductos WHERE id = '".$idproducto."'");

             //$custRow = $query->fetch_assoc();

            while($custRow = $query->fetch()) 
            {

             $idprod = $custRow['id']; 
             $stock = $custRow['stock']; 

             $StockNuevo = $stock - $cantidad;

            }

              // Actualizamos datos
              $db = Database::connect();
              $statement = $db->prepare("UPDATE catproductos SET stock = ? WHERE id = '".$idproducto."'");
              $statement->execute(array($StockNuevo));
              Database::disconnect();
              
              if( $statement ){
                  
                   $return = "new";

              } else{

                   $return = "fail";
              }


              header("Location:muestrainventario.php?user=$usuario&action=Mariscos&return=$return");


           }

         //===================================================================================================//


    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }



	?>