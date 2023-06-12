<?php
require('fpdf/fpdf.php');
require('conexion.php');


      $select=$base->prepare("");


      

  $pdf=new FPDF('L','mm',array(400,270));
  $pdf->AliasNbPages();
  $consultant=$base->prepare("select asig.asignatura,asig.nivel_educativo,prof.nombre,prof.apellidoP,prof.apellidoM,prof.email from asignatura asig inner join profesor prof on 
  prof.id_profesor=asig.id_asignatura");
  $consultant->execute(array());
  $usuario=$consultant->fetchAll(PDO::FETCH_ASSOC);
  
  $pdf->AddPage();
//  $pdf->Image('imagen/home.png',10,8,33);
$pdf->SetFont('Arial','B',13);
$pdf->cell(40);
$pdf->Cell(40,30,'Reporte de profesores '.date('Y-m-d'),0,0,'c');
$pdf->ln(30);
$pdf->Cell(110,12,'nombre profesor',1,0,'c');$pdf->Cell(65,12,'Email',1,0,'c');$pdf->Cell(65,12,'asignatura',1,0,'c');$pdf->Cell(65,12,'nivel_educativo',1,0,'c');
$pdf->ln(12);
foreach ($usuario as $user) {


  $pdf->Cell(110,10,$user['nombre']." ".$user['apellidoM']." ".$user['apellidoP'],1,0,'c');$pdf->Cell(65,10,$user['email'],1,0,'c');
  $pdf->Cell(65,10,$user['asignatura'],1,0,'c');$pdf->Cell(65,10,$user['nivel_educativo'],1,0,'c');
  $pdf->ln(10);
}

$pdf->Output();




  
  
  
  function Footer(){
    $pdf->setY(-15);
    $this->setFont("arial","B",18);
    $pdf->cell(0,10,"pagina".$this->pageNO().'/{nb}',0,0,'c');
    $pdf->Output();
  }
  
  

 



?>