<?php  
if(isset($_POST['sms'])){ //sms user insert 
require($_SERVER['DOCUMENT_ROOT']."/sms/class.phpmailer.php"); 
$tes = 'tes'; 
$mysmtp = 'mail.bocadito.mx';//<--Cambiar*** Servidor SMTP de Correo 
$myuname = 'contacto@bocadito.mx';//Nombre de Usuario de E-Mail 
$mypasswd = 'Bocadito2019';//<--Cambiar*** Clave de Usuario E-Mail 
$myfrom = 'watitas0529@gmail.com';//<--Cambiar*** E-Mail de Usuario 
$mytoPhone = "8125822061";//<--Cambiar*** Numero de telefono destino 
$smsMsg = $_POST['sms']; 
$mailer = new PHPMailer(); 
   $mailer->IsSMTP(); 
   $mailer->IsHTML(true); 
   $mailer->Host = $mysmtp; 
   $mailer->SMTPAuth = TRUE; 
   $mailer->Username = $myuname; 
   $mailer->Password = $mypasswd; 
   $mailer->From = $myfrom; 
   $mailer->Body = "$smsMsg"."\n Ir a www.forosdelweb.com/f18/enviar-sms-1113207/"; 
  // $mailer->AddAttachment("images/32.jpg", "new.jpg");//Envia solo a E-Mail no SMS 
 //  $mailer->Subject = $tes.'-sms Form';//Opcional 
   $mailer->AddAddress($mytoPhone); 
   if(!$mailer->Send()){ 
    echo $mailError; 
    }else{ 
echo '<h3>SMS Enviado...</h3>';    
   } 
} 
?> 