<?php
require_once "vendor/autoload.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$html = $_POST['render_data'];
$title = $_POST['doc_name'];
// var_dump($title); exit();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF 
$dompdf->render();

// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream($title);
?>