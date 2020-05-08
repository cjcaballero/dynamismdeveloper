<?php
include "fpdf/fpdf.php";

require '../database.php';

$id  = $_GET['idCuenta'];

$pdf = new FPDF($orientation='P',$unit='mm', array(45,150)); // <- Ancho y Alto
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);    //Letra Arial, negrita (Bold), tam. 20
$textypos = 5;
$pdf->setY(2);
$pdf->setX(2);
//$pdf->Cell(5,$textypos,"         JAVIER MARISCOS");
$pdf->Image('../images/Logo/Logo.png',16,1,-1200);
$pdf->SetFont('Arial','',5);    //Letra Arial, negrita (Bold), tam. 20
$textypos+=18;
$pdf->setX(2);
$pdf->Cell(5,$textypos,'-------------------------------------------------------------------');
$textypos+=9;
$pdf->setX(2);
$pdf->Cell(5,$textypos,'CANT.  ARTICULO        PRECIO               TOTAL');

$total =0;
$off = $textypos+6;

//Consulta Cuentas
$db = Database::connect();

$statement = $db->query('SELECT id,idCuenta,idplatillo,descplatillo,precio,SUM(precio) as total,SUM(cantidad) as cantidad FROM detcuenta WHERE idCuenta = '.$id.'
GROUP BY idplatillo,descplatillo ORDER BY DESCPLATILLO DESC');


while($item = $statement->fetch()) 
{
	$pdf->setX(2);
	$pdf->Cell(5,$off,$item["cantidad"]);
	$pdf->setX(6);
	$pdf->Cell(35,$off,  strtoupper(substr($item["descplatillo"], 0,12)) );
	$pdf->setX(20);
	$pdf->Cell(11,$off,  "$".number_format($item["precio"],2,".",",") ,0,0,"R");
	$pdf->setX(32);
	$pdf->Cell(11,$off,  "$".number_format($item["total"],2,".",",") ,0,0,"R");

	$total += $item["total"];
	$off+=6;
}

$textypos=$off+6;

$pdf->setX(2);
$pdf->Cell(5,$textypos,"TOTAL: " );
$pdf->setX(38);
$pdf->Cell(5,$textypos,"$ ".number_format($total,2,".",","),0,0,"R");

$pdf->setX(2);
$pdf->Cell(5,$textypos+6,'');
$pdf->Cell(5,$textypos+6,'      GRACIAS POR TU COMPRA ');

$pdf->output();
