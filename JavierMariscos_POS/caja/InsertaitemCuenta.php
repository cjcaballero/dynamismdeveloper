<?php

  	require '../database.php';
    include '../dbConfig.php';


    	$usuario  = $_GET['user'];
        $action = $_GET['action'];
        //$FechaCorte = strlen($_GET['FechaCorte']);
         $gastostotales = $_GET['gastostotales']; 


        if(!empty($_GET['statusCuenta'])) 
        {

            $statusCuenta  = $_GET['statusCuenta'];
        }

       if(!empty($_GET['Fecha'])) 
        {

            $Fecha = $_GET['Fecha'];
        }
        
        if(!empty($_GET['delivery'])) 
        {

            $delivery = $_GET['delivery'];
        }
        
        if(!empty($_GET['transaccion'])) 
        {

            $transaccion = $_GET['transaccion'];
        }
      
        if(!empty($_GET['mesaBanco'])) 
        {

            $mesaBanco = $_GET['mesaBanco'];
        }

        if(!empty($_GET['monto'])) 
        {

            $monto = $_GET['monto'];
        }
       
        if(!empty($_GET['Subtotal'])) 
        {

            $subTotal = $_GET['Subtotal'];
        }

        if(!empty($_GET['Iva'])) 
        {

            $iva = $_GET['Iva'];
        }
        
        if(!empty($_GET['Total'])) 
        {

            $total = $_GET['Total'];
        }
        
        if(!empty($_GET['iddelivery'])) 
        {

            $iddelivery = $_GET['iddelivery'];
        }
        
        if(!empty($_GET['idCuenta'])) 
        {

            $idCuenta = $_GET['idCuenta'];
        }
        
        if(!empty($_GET['Id'])) 
        {

            $idPlatillo = $_GET['Id'];
        }
        
        if(!empty($_GET['Platillo'])) 
        {

            $Platillo = $_GET['Platillo'];
        }
        
        if(!empty($_GET['Precio'])) 
        {

            $Precio = $_GET['Precio']; 
        }
        
        
        if(!empty($_GET['ventatotal'])) 
        {

            $ventatotal = $_GET['ventatotal']; 

        }
        

        if(!empty($_GET['gastostotales'])) 
        {

            $gastostotales = $_GET['gastostotales']; 
        }
        

        if(!empty($_GET['gananciatotal'])) 
        {

            $gananciatotal = $_GET['gananciatotal']; 
        }
        

 //===================================================================================================//


       //Obtenemos el Id del Cajero
       $query = $db->query("SELECT id FROM catUsers WHERE name = '".$usuario."'");

       $custRow = $query->fetch_assoc();

       $idCajero = $custRow['id']; 


 //===================================================================================================//

        //Transacciones Cuentas
        if ($action == 'insert'){


            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO detcuenta (idCuenta,idplatillo,descplatillo,precio,cantidad) values(?, ?, ?, ?, ?)");
            $statement->execute(array($idCuenta,$idPlatillo,$Platillo,$Precio,1));
            Database::disconnect();

            header("Location:pos.php?user=$usuario&idCuenta=$idCuenta&statusCuenta=Por Pagar");


        }

        if ($action == 'delete'){


            $db = Database::connect();
            $statement = $db->prepare("DELETE FROM detcuenta WHERE Id = ? AND IdCuenta = ?");
            $statement->execute(array($idPlatillo,$idCuenta));
            Database::disconnect();

            //header("Location:pos.php?user=$usuario&idCuenta=$idCuenta&action=porPagar&statusCuenta=Por Pagar");
            header("Location:pos.php?user=$usuario&idCuenta=$idCuenta&statusCuenta=Por Pagar");


        }


 //===================================================================================================//

        //Botones Acciones 

            //Pagar
            if ($action == 'pagar'){


                    $db = Database::connect();
                    $statement = $db->prepare("UPDATE enccuenta SET pagacon = ?, total = ?, iva = ?, cambio = ?, idestatus = ? WHERE id = '".$idCuenta."'");
                    $statement->execute(array($monto,$total,$iva,($monto - $total),4));
                    Database::disconnect();

                    header("Location:cuentas.php?user=$usuario&action=Pagadas");
                    


            }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
            if ($action == 'TDC'){


                    $db = Database::connect();
                    $statement = $db->prepare("UPDATE enccuenta SET pagacon = ?, total = ?, iva = ?, cambio = ?, idestatus = ? WHERE id = '".$idCuenta."'");
                    $statement->execute(array($monto,$total,$iva,($monto - $total),4));
                    Database::disconnect();

                    header("Location:cuentas.php?user=$usuario&action=Pagadas");


            }

            //Cancelar
            if ($action == 'cancelar'){


                    $db = Database::connect();
                    $statement = $db->prepare("UPDATE enccuenta SET pagacon = ?, total = ?, iva = ?, cambio = ?, idestatus = ? WHERE id = '".$idCuenta."'");
                    $statement->execute(array($monto,$total,$iva,($monto - $total),5));
                    Database::disconnect();

                    header("Location:cuentas.php?user=$usuario&action=Canceladas");


            }

            //Guardar
            if ($action == 'guardar'){


                    $db = Database::connect();
                    $statement = $db->prepare("UPDATE enccuenta SET pagacon = ?, total = ?, iva = ?, cambio = ?, idestatus = ? WHERE id = '".$idCuenta."'");
                    $statement->execute(array($monto,$total,$iva,($monto - $total),3));
                    Database::disconnect();

                    header("Location:cuentas.php?user=$usuario&action=porPagar");


            }


 //===================================================================================================//


        // Tipos de Cuentas

        //Comedor
        if ($action == 'Comedor'){

            if ($transaccion =='actualiza'){


                $db = Database::connect();
                $statement = $db->prepare("UPDATE enccuenta SET mesaBanco = ?, horapedido = ? WHERE id = '".$idCuenta."'");
                $statement->execute(array($mesaBanco,DATE( '%H:%M')));
                Database::disconnect();

                header("Location:pos.php?user=$usuario&idCuenta=$idCuenta&statusCuenta=Por Pagar");


            }else{



                $db = Database::connect();
                $statement = $db->prepare("INSERT INTO enccuenta (idCajero,idCliente,idtipoCuenta,idtipopago,idestatus) values(?, ?, ?, ?, ?)");
                $statement->execute(array($idCajero,$idPlatillo,$idPlatillo,1,3));
                Database::disconnect();

                 //Obtenemos el ultimo ID insertado en la tabla enccuenta
                 $query = $db->query("SELECT MAX(id) AS LastID FROM enccuenta");

                 $custRow = $query->fetch(PDO::FETCH_ASSOC);

                 $idCuenta = $custRow['LastID']; 

                 header("Location:croquisComedor.php?user=$usuario&idCuenta=$idCuenta&statusCuenta=Por Pagar");


            }


        }

        //Para Llevar
        if ($action == 'P/ Llevar'){


            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO enccuenta (idCajero,idCliente,idtipoCuenta,idtipopago,idestatus) values(?, ?, ?, ?, ?)");
            $statement->execute(array($idCajero,$idPlatillo,$idPlatillo,1,3));
            Database::disconnect();

              //Obtenemos el ultimo ID insertado en la tabla enccuenta
                 $query = $db->query("SELECT MAX(id) AS LastID FROM enccuenta");

                 $custRow = $query->fetch(PDO::FETCH_ASSOC);

                 $idCuenta = $custRow['LastID']; 

            header("Location:pos.php?user=$usuario&idCuenta=$idCuenta&statusCuenta=Por Pagar");


        }

        //A domicilio
        if ($action == 'A Domicilio'){


            if ($delivery == 'si'){



                $db = Database::connect();
                $statement = $db->prepare("UPDATE enccuenta SET iddelivery = ? WHERE id = '".$idCuenta."'");
                $statement->execute(array($iddelivery));
                Database::disconnect();

                header("Location:pos.php?user=$usuario&idCuenta=$idCuenta&statusCuenta=Por Pagar&delivery=$delivery");


            }
            else{


                $db = Database::connect();
                $statement = $db->prepare("INSERT INTO enccuenta (idCajero,idCliente,idtipoCuenta,idtipopago,idestatus) values(?, ?, ?, ?, ?)");
                $statement->execute(array($idCajero,$idPlatillo,$idPlatillo,1,3));
                Database::disconnect();


                 //Obtenemos el ultimo ID insertado en la tabla enccuenta
                 $query = $db->query("SELECT MAX(id) AS LastID FROM enccuenta");

                 $custRow = $query->fetch(PDO::FETCH_ASSOC);

                 $idCuenta = $custRow['LastID']; 


                header("Location:delivery.php?user=$usuario&idCuenta=$idCuenta");


            }

        }

 //===================================================================================================//


        // Corte de Caja

         if($action == 'generacorte'){


                //Validamos si el cierre ya se realizo
               $query = $db->query("SELECT id FROM cierrediario WHERE CONVERT(fecha, DATE) = date('d-m-Y')");

               $custRow = $query->fetch_assoc();

               $idcierre = $custRow['id']; 

               if($idcierre > 0 || !empty($idcierre)){

                    $return = "fail";

                    header("Location:corteCaja.php?user=$usuario&return=$return");

               }else{


                    $db = Database::connect();
                    $statement = $db->prepare("INSERT INTO cierrediario (ventatotal,gastostotales,gananciatotal,idcajero,idstatus,fecha) values(?, ?, ?, ?, ?, ?)");
                    $statement->execute(array($ventatotal,$gastostotales,$gananciatotal,$idCajero,6,date('d-m-Y')));
                    Database::disconnect();


                        if($statement){
                          
                            $return = "ok";

                                header("Location:corteCaja.php?user=$usuario&return=$return");

                          }else{

                            $return = "fail";
                          }

                }

         }


         if($action == 'generacorteatrasado'){


                //Validamos si el cierre ya se realizo
         

                    $db = Database::connect();
                    $statement = $db->prepare("INSERT INTO cierrediario (ventatotal,gastostotales,gananciatotal,idcajero,idstatus,fecha) values(?, ?, ?, ?, ?, ?)");
                    $statement->execute(array($ventatotal,$gastostotales,$gananciatotal,$idCajero,6, date("d/m/Y", strtotime('-1 day'))));
                    Database::disconnect();


                        if($statement){
                          
                           $return = "ok";

                            header("Location:../menuAdmin.php?user=$usuario&return=$return");

                          }else{

                               $return = "fail";
                          }

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