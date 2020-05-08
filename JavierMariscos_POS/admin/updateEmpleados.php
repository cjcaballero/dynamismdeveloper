<?php
     
    require '../database.php';

    $user  = $_GET['user'];

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

 
    $diario = $lnacimientoError = $image = $imageError = $entradaError = $salidaError = $entrada = $salida = $diarioError = $sueldoError = $sueldo = $salarioError = $fingresoError = $fsalidaError = $direccion= $direccionError = $fnacimientoError =$CelularError = $TelError = $nameError = $emailError = $usuarioError = $passwordError = $name = $email = $telefono = $celular = $estadocivilError= "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $direccion          = checkInput($_POST['direccion']);
        $telefono           = checkInput($_POST['telefono']);
        $celular            = checkInput($_POST['celular']); 
        $email              = checkInput($_POST['email']);
        $estadocivil        = checkInput($_POST['estadocivil']); 
        $lnacimiento        = checkInput($_POST['lnacimiento']); 
        $fnacimiento        = checkInput($_POST['fnacimiento']); 
        $fingreso           = checkInput($_POST['fingreso']); 
        $fsalida            = checkInput($_POST['fsalida']); 
        $salario            = checkInput($_POST['salario']); 
        $sueldo             = checkInput($_POST['sueldo']); 
        $diario             = checkInput($_POST['diario']); 
        $hentrada           = checkInput($_POST['hentrada']); 
        $hsalida            = checkInput($_POST['hsalida']); 
        $image              = checkInput($_FILES["image"]["name"]);
        $imagePath          = 'images/'. basename($image);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
       
        $isSuccess          = true;
        $isUploadSuccess    = false;

        
        if(empty($name)) 
        {
            $nameError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        elseif(empty($direccion)) 
        {
            $direccionError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        elseif(empty($telefono)) 
        {
            $telefonoError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        elseif(empty($celular)) 
        {
            $celularError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        }
        elseif(empty($email)) 
        {
            $emailError = 'Este campo no puede estar vacío';
            $isSuccess = false;
        } 
        elseif($estadocivil == 'Seleccione') 
        {
            $estadocivil = 'Debe Seleccionar un Estado Civil';
            $isSuccess = false;
        }
        elseif($lnacimiento == 'Seleccione') 
        {
            $lnacimientoError = 'Debe Seleccionar un Lugar de Nacimiento';
            $isSuccess = false;
        }
        elseif($fnacimiento == date("Y-m-d")) 
        {
            $fnacimientoError = 'Debe especificar una Fecha de Nacimiento ';
            $isSuccess = false;
        }
        elseif($salario == 'Seleccione') 
        {
            $salarioError = 'Debe seleccionar un Tipo de Salario';
            $isSuccess = false;
        }
        elseif(empty($sueldo))
        {
            $sueldoError = 'Debe capturar Un Sueldo Total';
            $isSuccess = false;
        }
        elseif(empty($hentrada))
        {
            $entradaError = 'Debe capturar la Hora de Entrada';
            $isSuccess = false;
        }
        elseif(empty($hsalida))
        {
            $salidaError = 'Debe capturar la Hora de Salida';
            $isSuccess = false;
        }
        else
        {
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Los archivos permitidos son: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }

            if($_FILES["image"]["size"] > 1000000) 
            {
                $imageError = "El archivo no debe exceder el 500 KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Se ha producido un error al subir el archivo";
                    $isUploadSuccess = false;
                } 
            } 
        }
       
        if($isSuccess && $isUploadSuccess) 
        {
            $db = Database::connect();

                 $statement = $db->prepare("UPDATE catEmployees  set nombre = ?, direccion = ?, telefono = ?, celular = ?, idestadocivil = ?, 
                    idlugarnacimiento = ?, fechanacimiento = ?, email = ?, fechaingreso = ?, idpagosalario = ?, horarioentrada = ?, 
                    horariosalida = ?, salariodiario = ?, salariototal = ?, foto = ? WHERE id = ?");
                $statement->execute(array($name,$direccion,$telefono,$celular,$estadocivil,$lnacimiento,$fnacimiento,$email,$fingreso,
                                        $salario,$hentrada,$hsalida,$diario,$sueldo,$image,$id));


            Database::disconnect();

            if($statement){
                
                 $return = "update";

            } else{

                 $return = "fail";
            }

            
            header("Location:empleados.php?user=$user&return=$return");
       
        }
    }
    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT A.nombre,A.direccion,A.telefono,A.celular,A.email,B.id,A.idlugarnacimiento,CONVERT(A.fechanacimiento, DATE) as fechanacimiento,A.fechaingreso,A.fechabaja,A.idpagosalario,A.salariototal,A.salariodiario,A.horarioentrada,A.horariosalida,
            A.foto FROM catEmployees A 
            INNER JOIN catcivilstatus B ON A.idestadocivil = B.id 
            WHERE a.id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();

        $name               = $item['nombre'];
        $direccion          = $item['direccion'];
        $telefono           = $item['telefono'];
        $celular            = $item['celular']; 
        $email              = $item['email'];
        $estadocivil        = $item['id']; 
        $lnacimiento        = $item['idlugarnacimiento']; 
        $fnacimiento        = $item['fechanacimiento']; 
        $fingreso           = $item['fechaingreso']; 
        $fsalida            = $item['fechabaja']; 
        $salario            = $item['idpagosalario']; 
        $sueldo             = $item['salariototal']; 
        $diario             = $item['salariodiario']; 
        $hentrada           = $item['horarioentrada']; 
        $hsalida            = $item['horariosalida']; 
        $image              = $item["foto"];

        Database::disconnect();
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Javier Mariscos | Los Originales desde 1980&#174;</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/cwdialog.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="apple-touch-icon" sizes="57x57" href="../images/Favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../images/Favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../images/Favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../images/Favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../images/Favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../images/Favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../images/Favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../images/Favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../images/Favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="../images/Favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../images/Favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../images/Favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../images/Favicon/favicon-16x16.png">
        <link rel="manifest" href="../images/Favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="../images/Favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <script>
           
        //Funcion Calculo Sueldos
        function division() {
            //Obtenemos el Tipo de Salario
           var numero1 = Number($("#salario").val());
           //Validamos el Tipo de Salario
            if(numero1 == 3){

                numero1 = 7;

           } 

            else if(numero1 == 4){

                numero1 = 7;
                
           } 
            else if(numero1 == 5){

                numero1 = 30;
                
           } 
           //Obtenemos el Sueldo Total
           var numero2 = Number($("#sueldo").val());
           //Calculamos el Sueldo Diario
           var sumar = numero2 / numero1;
           //Mostramos el Resultado en el Input
           var resultado = $("#diario").val(sumar);
           //var resultado = $("#salario").val(1);

        }

        </script>


    </head>
    
    <body>
        <div class="container">
            <a href="../index.php?user=<?php echo $user ?>"><div class="logo"></div></a>
         <div class="container admin">
                         <div style="text-align: right; font-weight: bold;"><span style="color: #EC6104;">Bienvenido: </span> <?php echo $user ?> <span style="text-align: right;font-size:xx-small; text-decoration: underline;"><a href="../logout.php">Cerrar Sesion</a></span></div>
            <div class="row">
                <h1><strong>Editar Empleado</strong></h1>
                <br>
                <form class="form" action="altaEmpleados.php?user=<?php echo $user ?>" class="form" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nombre Completo:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="<?php echo $name;?>">
                        <span class="help-inline"><?php echo $nameError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $direccion;?>">
                    <span class="help-inline"><?php echo $direccionError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $telefono;?>">
                        <span class="help-inline"><?php echo $TelError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="celular">Celular:</label>
                        <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" value="<?php echo $celular;?>">
                        <span class="help-inline"><?php echo $CelularError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electronico:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email;?>">
                        <span class="help-inline"><?php echo $emailError;?></span>
                    </div>
                    <div class="col-xs-12 col-md-6 table-responsive">
                        <div class="form-group">
                            <label for="estadocivil" style="margin-left: -13px;">Estado Civil:
                            <select class="form-control" id="estadocivil" name="estadocivil"  style="width:500px; margin-left: -1px;">
                            <?php
                            $db = Database::connect();

                            echo '<option value="Seleccione">Seleccione</option>';
                            
                            foreach ($db->query('SELECT * FROM catcivilstatus ORDER BY id DESC') as $row) 
                            {
                                
                                echo '<option value="'. $row['id'] .'">'. $row['nombre'] . '</option>';
                                
                            }
                            Database::disconnect();
                            ?>
                            </select>
                            <span class="help-inline"><?php echo $estadocivilError;?></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 table-responsive">
                        <div class="form-group">
                            <label for="lnacimiento">Lugar Nacimiento:
                            <select class="form-control" id="lnacimiento" name="lnacimiento" style="width:500px">
                            <?php
                            $db = Database::connect();
                            
                            echo '<option value="Seleccione">Seleccione</option>';

                            foreach ($db->query('SELECT * FROM catstates ORDER BY id DESC') as $row) 
                            {
                                
                                echo '<option value="'. $row['id'] .'">'. $row['nombre'] . '</option>';
                                
                            }
                            Database::disconnect();
                            ?>
                            </select>
                            <span class="help-inline"><?php echo $lnacimientoError;?></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 table-responsive" style="margin-left: -13px;">
                        <div class="form-group">
                            <label for="fnacimiento">Fecha Nacimiento:</label>
                      
                            <input type="date" class="form-control" name="fnacimiento" step="1" min="1900-01-01" max="3000-12-31" value="<?php echo $fnacimiento ?>">

                            <span class="help-inline"><?php echo $fnacimientoError;?></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 table-responsive">
                        <div class="form-group">
                            <label for="fingreso">Fecha Ingreso:</label>
                      
                            <input type="date" class="form-control" name="fingreso" step="1" min="1900-01-01" max="3000-12-31" value="<?php echo $fingreso ?>">

                            <span class="help-inline"><?php echo $fingresoError;?></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 table-responsive">
                        <div class="form-group">
                            <label for="fsalida">Fecha Salida:</label>
                      
                            <input type="date" class="form-control" name="fsalida" step="1" min="1900-01-01" max="3000-12-31" value="<?php echo date("Y-m-d");?>">

                            <span class="help-inline"><?php echo $fsalidaError;?></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 table-responsive" style="margin-left: -13px;">
                        <div class="form-group">
                            <label for="salario">Tipo Salario:
                            <select class="form-control" id="salario" name="salario" style="width:300px" onchange="CalculaSalario()">
                            <?php
                            $db = Database::connect();
                            
                            echo '<option value="Seleccione">Seleccione</option>';

                            foreach ($db->query('SELECT * FROM catsalarytype ORDER BY id DESC') as $row) 
                            {
                                
                                echo '<option value="'. $row['id'] .'">'. $row['nombre'] . '</option>';
                                
                            }
                            Database::disconnect();
                            ?>
                            </select>
                            <span class="help-inline"><?php echo $salarioError;?></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 table-responsive">
                        <div class="form-group">
                            <label for="sueldo">Suelto Total:</label> 
                            <input type="number" class="form-control" id="sueldo" name="sueldo" placeholder="Sueldo Total" value="<?php echo $sueldo;?>" onchange="division()">
                            <span class="help-inline"><?php echo $sueldoError;?></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 table-responsive">
                        <div class="form-group">
                            <label for="diario">Suelto Diario:</label>
                            <input type="number" class="form-control" id="diario" name="diario" placeholder="Sueldo Diario" value="<?php echo $diario;?>">
                            <span class="help-inline"><?php echo $diarioError;?></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 table-responsive" style="margin-left: -13px;">
                        <div class="form-group">
                            <label for="hentrada">Horario Entrada:</label>
                            <input type="time" class="form-control" id="hentrada" name="hentrada" placeholder="Hora Entrada" value="<?php echo $hentrada;?>">
                            <span class="help-inline"><?php echo $entradaError;?></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 table-responsive">
                        <div class="form-group">
                            <label for="hsalida">Horario Salida:</label>
                            <input type="time" class="form-control" id="hsalida" placeholder="Hora Salida" name="hsalida" value="<?php echo $hsalida;?>" max="22:30:00" min="5:00:00" step="1">
                            <span class="help-inline"><?php echo $salidaError;?></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 table-responsive">
                        <div class="form-group">
                            <label for="image">Imagen:</label>
                            <p><?php echo $image;?></p>
                            <input type="file" id="image" name="image" style="color: red; font-weight: bold;"> 
                            <span class="help-inline"><?php echo $imageError;?></span>
                        </div>
                    </div>
                </label>
            </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Actualizar</button>
                        <a class="btn btn-primary" href="empleados.php?user=<?php echo $user ?>"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
                   </div>
                </form>
            </div>
        </div>   
    </div>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
