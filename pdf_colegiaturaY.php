<?php
require('fpdf/fpdf.php');
require('conexion.php');


      $select=$base->prepare("");


      
if( isset($_GET['txt_fechaI'])&& isset($_GET['txt_fechaF'])){
  
  $fechaI=$_GET['txt_fechaI'];
  $fechaF=$_GET['txt_fechaF'];
  $pdf=new FPDF('L','mm',array(400,270));
  $pdf->AliasNbPages();
  $consultant=$base->prepare("select a.nombre,a.apellidoM,a.apellidoP,motivo,monto,fecha,id_colegiatura from colegiatura inner 
  join alumno a on a.id=colegiatura.id_alumno where fecha between '{$fechaI}' and '{$fechaF}';");
  $consultant->execute(array());
  $usuario=$consultant->fetchAll(PDO::FETCH_ASSOC);
  
  $pdf->AddPage();
//  $pdf->Image('imagen/home.png',10,8,33);
$pdf->SetFont('Arial','B',14);
$pdf->cell(40);
$pdf->Cell(40,3,'Reporte de Colegiaturas '.date('Y-m-d'),0,0,'c');
$pdf->ln(30);
$pdf->Cell(85,10,'nombre Alumno',1,0,'c');$pdf->Cell(190,10,'Motivo',1,0,'c');$pdf->Cell(35,10,'Monto',1,0,'c');$pdf->Cell(35,10,'Fecha',1,0,'c');
$pdf->ln(10);
foreach ($usuario as $user) {


  $pdf->Cell(85,10,$user['nombre']." ".$user['apellidoM']." ".$user['apellidoP'],1,0,'c');$pdf->Cell(190,10,$user['motivo'],1,0,'c');$pdf->Cell(35,10,'$'.$user['monto'],1,0,'c');
  $pdf->Cell(35,10,$user['fecha'],1,0,'c');
  $pdf->ln(10);
}

$pdf->Output();

}


  
  
  
  function Footer(){
    $pdf->setY(-15);
    $this->setFont("arial","B",18);
    $pdf->cell(0,10,"pagina".$this->pageNO().'/{nb}',0,0,'c');
    $pdf->Output();
  }
  
  

 



?>