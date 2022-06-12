<?php
//conexion 
include 'registros/conexion.php';
$link=mysqli_connect('localhost','root','','sistema_online');
///variabñles

$mes = $_GET["mes"];
$nombremes = "";
switch ($mes) {
    case 1:
        $nombremes = "ENERO";
        break;
    case 2:
        $nombremes = "FEBRERO";
        break;
    case 3:
        $nombremes = "MARZO";
        break;
    case 4:
        $nombremes = "ABRIL";
        break;
    case 5:
        $nombremes = "MAYO";
        break;
    case 6:
        $nombremes = "JUNIO";
        break;
    case 7:
        $nombremes = "JULIO";
        break;
    case 8:
        $nombremes = "AGOSTO";
        break;
    case 9:
        $nombremes = "SEPTIEMBRE";
        break;
    case 10:
        $nombremes = "OCTUBRE";
        break;
    case 11:
        $nombremes = "NOVIEMBRE";
        break;
    case 12:
        $nombremes = "DICIEMBRE";
        break;
}
?>

<?php
include "fpdf/fpdf.php";


date_default_timezone_set("America/Mexico_City");

// Obteniendo la fecha actual con hora, minutos y segundos en PHP
$fechaActual = date('d-m-Y');
$HoraActual = date('H:i:s');

$total = 0; 


$pdf = new FPDF($orientation = 'P', $unit = 'mm');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 20);
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);
// Agregamos los datos de la empresa
$pdf->Image('img/logos/logo_gris.png', 10, 6, 28);
$pdf->SetFont('Arial', 'B', 15);
$pdf->setY(35);
$pdf->setX(15);
$pdf->Cell(5, $textypos, "RR Desing");

$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(40);
$pdf->setX(15);
$pdf->Cell(5, $textypos, "C. J. Ortiz de Domínguez 29, Pilares, Metepec.");
$pdf->setY(45);
$pdf->setX(15);
$pdf->Cell(5, $textypos, "52175l");
$pdf->setY(50);
$pdf->setX(15);
$pdf->Cell(5, $textypos, "Estado de México");
$pdf->setY(55);
$pdf->setX(15);
$pdf->Cell(5, $textypos, "552-568-8988");
$pdf->setY(60);
$pdf->setX(15);
$pdf->Cell(5, $textypos, "rrdesing@gmail.com");
header('Content-Type: application/json');


// Agregamos los datos del cliente
$numF =
    $pdf->SetFont('Arial', 'B', 12);
$pdf->setY(20);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "REPORTE MENSUAL: $nombremes");
$pdf->SetFont('Arial', '', 10);
$pdf->setY(25);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "FECHA:");
$pdf->setY(25);
$pdf->setX(150);
$pdf->Cell(5, $textypos, $fechaActual);
$pdf->setY(30);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "HORA:");
$pdf->setY(30);
$pdf->setX(150);
$pdf->Cell(5, $textypos, $HoraActual);
$pdf->setY(60);
$pdf->setX(155);
$pdf->Cell(5, $textypos, "");
$pdf->setY(65);
$pdf->setX(155);
$pdf->Cell(5, $textypos, "");

/// Apartir de aqui empezamos con la tabla de productos
$pdf->setY(75);
$pdf->setX(135);
$pdf->Ln();
/////////////////////////////
//// Array de Cabecera
$header = array("id_venta", "Fecha", "Producto", "Cantidad", "Talla", "Precio", "Total");

// Column widths
$w = array(25, 30, 30, 25, 25, 25, 25);
// Header
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
$pdf->Ln();

// rellenamos tabla del reporte de ventas
foreach ($link->query("SELECT vpro.id_venta, vpro.id_producto, vpro.cantidad, vpro.talla,vpro.precio, ven.total, ven.fecha , 
ven.id_venta from venta_productos vpro INNER JOIN venta ven on (vpro.id_venta=ven.id_venta)
WHERE MONTH(fecha)=$mes AND YEAR(fecha)=2022; ") as $row) {

    $fecha1 = new DateTime($row['fecha']);
    $pdf->Cell($w[0], 5, $row['id_venta'], 1);
    $pdf->Cell($w[1], 5, $row['fecha'], 1);
    $pdf->Cell($w[2], 5, $row['id_producto'], 1);
    $pdf->Cell($w[3], 5, $row['cantidad'], 1);
    $pdf->Cell($w[4], 5, $row['talla'], 1);
    $pre = "$ " . number_format($row['precio'], 2, ".", ",");
    $pdf->Cell($w[5], 5, $pre, 1);
    $numt = "$ " . number_format($row['total'], 2, ".", ",");
    $pdf->Cell($w[6], 5, $numt, 1);

    $con = $row['total'];
    $pdf->Ln();
    $total += $con;
}


/////////////////////////////
$yposdi = 45 + (count($w) * 10);

$pdf->sety($yposdi);
$pdf->setX(150);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(5, $textypos, "Total:");

$pdf->setX(165);
$pdf->Cell(5, $textypos, "$ " . number_format($total, 2, ".", ","));
$pdf->Ln();
// Data


//// Apartir de aqui esta la tabla con los subtotales y totales
$yposdinamic = 60 + (count($w) * 10);

$pdf->setY($yposdinamic);
$pdf->setX(235);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);

$pdf->setY($yposdinamic);
$pdf->setX(10);
$pdf->SetFont('Arial', '', 10);

$pdf->setY($yposdinamic + 10);
$pdf->setX(10);
$pdf->setY($yposdinamic + 20);
$pdf->setX(10);


$pdf->output();