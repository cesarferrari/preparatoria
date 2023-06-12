<?php
require('fpdf/fpdf.php');
require('conexion.php');


      $select=$base->prepare("");


      if(isset($_GET['txtAsig'])){
        $asignatura=$_GET['txtAsig'];

  $pdf=new FPDF('L','mm',array(400,270));
  $pdf->AliasNbPages();
  $consultant=$base->prepare("select id_insc,al.nombre,al.apellidoP,al.apellidoM,asig.asignatura,estatus from inscripcion_asignatura
  insc inner join alumno al on al.id=insc.id_alumno inner join asignatura asig on
   asig.id_asignatura=insc.id_asignatura where asig.asignatura='{$asignatura}';");
  $consultant->execute(array());
  $usuario=$consultant->fetchAll(PDO::FETCH_ASSOC);
  
  $pdf->AddPage();
//  $pdf->Image('imagen/home.png',10,8,33);
$pdf->SetFont('Arial','B',14);
$pdf->cell(40);
$pdf->Cell(40,3,'Reporte de Asignaturas '.date('Y-m-d'),0,0,'c');
$pdf->ln(30);
$pdf->Cell(155,10,'nombre Alumno',1,0,'c');$pdf->Cell(85,10,'Asignatura',1,0,'c');$pdf->Cell(85,10,'Estatus',1,0,'c');
$pdf->ln(10);
foreach ($usuario as $user) {


  $pdf->Cell(155,10,$user['nombre']." ".$user['apellidoM']." ".$user['apellidoP'],1,0,'c');$pdf->Cell(85,10,$user['asignatura'],1,0,'c');$pdf->Cell(85,10,$user['estatus'],1,0,'c');
  $pdf->ln(10);
}

$pdf->Output();
      }else if(isset($_GET['txtMatr'])){
        $matricula=$_GET['txtMatr'];
        $pdf=new FPDF('L','mm',array(400,270));
        $pdf->AliasNbPages();
        $consultant=$base->prepare(" select id_insc,al.nombre,al.apellidoP,al.apellidoM,asig.asignatura,estatus from inscripcion_asignatura insc
        inner join alumno al on al.id=insc.id_alumno inner join asignatura asig on asig.id_asignatura=insc.id_asignatura 
        where al.matricula={$matricula};");
        $consultant->execute(array());
        $usuario=$consultant->fetchAll(PDO::FETCH_ASSOC);
        
        $pdf->AddPage();
      //  $pdf->Image('imagen/home.png',10,8,33);
      $pdf->SetFont('Arial','B',14);
      $pdf->cell(40);
      $pdf->Cell(40,3,'Reporte de Asignaturas alumno '.date('Y-m-d'),0,0,'c');
      $pdf->ln(30);
      $pdf->Cell(155,10,'nombre Alumno',1,0,'c');$pdf->Cell(85,10,'Asignatura',1,0,'c');$pdf->Cell(85,10,'Estatus',1,0,'c');
      $pdf->ln(10);
      foreach ($usuario as $user) {
      
      
        $pdf->Cell(155,10,$user['nombre']." ".$user['apellidoM']." ".$user['apellidoP'],1,0,'c');$pdf->Cell(85,10,$user['asignatura'],1,0,'c');$pdf->Cell(85,10,$user['estatus'],1,0,'c');
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