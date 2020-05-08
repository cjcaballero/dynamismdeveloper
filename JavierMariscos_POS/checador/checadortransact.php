<?php

  	require '../database.php';
    include '../dbConfig.php';


    	  $usuario  = $_GET['user'];
        $action = $_GET['action'];
        


        if(!empty($_GET['statusCuenta'])) 
        {

            $statusCuenta  = $_GET['statusCuenta'];
        }

     
 //===================================================================================================//


       //Obtenemos el Id del Cajero
       $query = $db->query("SELECT id FROM catUsers WHERE name = '".$usuario."'");

       $custRow = $query->fetch_assoc();

       $idCajero = $custRow['id']; 


 //===================================================================================================//


        //Transacciones 
        if ($action == 'insertaentrada'){

            //Obtenemos la hora actual
            $Hora = new DateTime('NOW', new DateTimeZone('America/Mexico_City'));
            $HoraEntrada = $Hora->format('h:i:s') . "\n";



            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO relojchecador (idempleado,horaentrada,idstatus) values(?, ?, ?)");
            $statement->execute(array($idCajero,$HoraEntrada,1));
            Database::disconnect();

            header("Location:../menuAdmin.php?user=$usuario&return=Entrada");


        }

        if ($action == 'insertasalida'){

            //Obtenemos la hora actual
            $Hora = new DateTime('NOW', new DateTimeZone('America/Mexico_City'));
            $HoraSalida = $Hora->format('h:i:s') . "\n";


            $db = Database::connect();
            $statement = $db->prepare("UPDATE relojchecador SET horasalida = ? WHERE idempleado = '".$idCajero."' AND CONVERT(fecha, DATE) = CURDATE()");
            $statement->execute(array($HoraSalida));
            Database::disconnect();

            header("Location:../menuAdmin.php?user=$usuario&return=Salida");



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