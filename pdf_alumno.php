<?php
require('fpdf/fpdf.php');
require('conexion.php');


      $select=$base->prepare("");


      if(isset($_GET['txtNV'])&&isset($_GET['txtGR'])){

        $nivel=$_GET['txtNV'];
        $grupo=$_GET['txtGR'];

  $pdf=new FPDF('L','mm',array(400,270));
  $pdf->AliasNbPages();
  $consultant=$base->prepare("select* from alumno where nivel_educativo='{$nivel}' and grupo='{$grupo}'");
  $consultant->execute(array());
  $usuario=$consultant->fetchAll(PDO::FETCH_ASSOC);
  
  $pdf->AddPage();
//  $pdf->Image('imagen/home.png',10,8,33);
$pdf->SetFont('Arial','B',13);
$pdf->cell(40);
$pdf->Cell(40,30,'Reporte de alumnos '.date('Y-m-d'),0,0,'c');
$pdf->ln(30);
$pdf->Cell(110,10,'nombre alumno',1,0,'c');$pdf->Cell(65,10,'Email',1,0,'c');$pdf->Cell(65,10,'Nivel educativo',1,0,'c');$pdf->Cell(35,10,'Matricula',1,0,'c');$pdf->Cell(35,10,'turno',1,0,'c');$pdf->Cell(35,10,'grupo',1,0,'c');
$pdf->ln(10);
foreach ($usuario as $user) {


  $pdf->Cell(110,10,$user['nombre']." ".$user['apellidoM']." ".$user['apellidoP'],1,0,'c');$pdf->Cell(65,10,$user['email'],1,0,'c');$pdf->Cell(65,10,$user['nivel_educativo'],1,0,'c');$pdf->Cell(35,10,$user['matricula'],1,0,'c');$pdf->Cell(35,10,$user['turno'],1,0,'c');$pdf->Cell(35,10,$user['grupo'],1,0,'c');
  $pdf->ln(10);
}

$pdf->Output();

      }else{
      

  $pdf=new FPDF('L','mm',array(400,270));
  $pdf->AliasNbPages();
  $consultant=$base->prepare("select* from alumno where tipo_usuario not in('alumno')");
  $consultant->execute(array());
  $usuario=$consultant->fetchAll(PDO::FETCH_ASSOC);
  
  $pdf->AddPage();
//  $pdf->Image('imagen/home.png',10,8,33);
$pdf->SetFont('Arial','B',13);
$pdf->cell(40);
$pdf->Cell(40,30,'Reporte de alumnos '.date('Y-m-d'),0,0,'c');
$pdf->ln(30);
$pdf->Cell(110,10,'nombre alumno',1,0,'c');$pdf->Cell(65,10,'Email',1,0,'c');$pdf->Cell(65,10,'Nivel educativo',1,0,'c');$pdf->Cell(35,10,'Matricula',1,0,'c');$pdf->Cell(35,10,'turno',1,0,'c');$pdf->Cell(35,10,'grupo',1,0,'c');
$pdf->ln(10);
foreach ($usuario as $user) {


  $pdf->Cell(110,10,$user['nombre']." ".$user['apellidoM']." ".$user['apellidoP'],1,0,'c');$pdf->Cell(65,10,$user['email'],1,0,'c');$pdf->Cell(65,10,$user['nivel_educativo'],1,0,'c');$pdf->Cell(35,10,$user['matricula'],1,0,'c');$pdf->Cell(35,10,$user['turno'],1,0,'c');$pdf->Cell(35,10,$user['grupo'],1,0,'c');
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