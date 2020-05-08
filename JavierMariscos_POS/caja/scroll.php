<?php
session_start();
include ("includes/conexion.php");
$cnx = Conexion::getConnection();

if (!isset($_SESSION["cantidadcargadas"])) 
	$_SESSION["cantidadcargadas"]=10;

$res = $cnx->query("SELECT COUNT(id) FROM enccuenta");
$numRows = $res->fetchColumn();

if((int)$numRows >= (int)$_SESSION["cantidadcargadas"] ){
	$sql ="SELECT DISTINCT A.id,C.nombre as Cliente, A.mesaBanco, A.horapedido,
                                                       CONVERT(A.fecha, DATE) AS fecha , D.nombre as Status     
                                                       FROM enccuenta A 
                                                       LEFT JOIN detcuenta B ON A.id = B.idCuenta
                                                       LEFT JOIN catclientes C ON A.idCliente = C.id
                                                       LEFT JOIN catstatus D ON A.idestatus = D.id
                                                       WHERE CONVERT(A.fecha, DATE) = CURDATE() AND A.idestatus = "'.$idestatus.'" LIMIT 0, 10";  
	$res = $cnx->query($sql);
		   while($row = $res->fetch(PDO::FETCH_ASSOC)) {										
			?>
				<li>
                	<strong><?php echo utf8_encode($row["id"] . "-" . $row["first_name"]); ?></strong>
                    <br><?php echo strip_tags($row["film_info"]); ?>
                </li>
			<?php				
			}
$_SESSION["cantidadcargadas"]+=10;
}
