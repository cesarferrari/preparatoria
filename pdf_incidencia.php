<?php
require('fpdf/fpdf.php');
require('conexion.php');

require('matricula.php');
      $select=$base->prepare("");

if(isset($_GET['txtMatr'])&& isset($_GET['txtFechaI'])&& isset($_GET['txtFechaF'])&& isset($_GET['txtEstudiante'])){
   $matricula=$_GET['txtMatr'];
   $fechaI=$_GET['txtFechaI'];
   $fechaF=$_GET['txtFechaF'];
   
  $pdf=new FPDF('L','mm',array(400,270));
  $pdf->AliasNbPages();
  $consultant=$base->prepare(incidenceMatr($fechaI,$fechaF,$matricula)[0]);
  $consultant->execute(array());
  $usuario=$consultant->fetchAll(PDO::FETCH_ASSOC);
  
  $pdf->AddPage();
//  $pdf->Image('imagen/home.png',10,8,33);
$pdf->setFillColor(232,232,232);
$pdf->SetFont('Arial','B',14);
$pdf->cell(40);
$pdf->Cell(40,3,'Reporte incidencia alumno '.date('Y-m-d'),0,0,'c');
$pdf->ln(30);
//$pdf->Cell(125,10,'nombre alumno',1,0,'c');$pdf->Cell(100,10,'Email',1,0,'c');$pdf->Cell(35,10,'Matricula',1,0,'c');
$pdf->ln(10);
foreach ($usuario as $user) {


  $pdf->Cell(375,10,'nombre: '.$user['nombre']." ".$user['apellidoM']." ".$user['apellidoP'],0,0,'c');
  $pdf->ln(10); 

  $pdf->MultiCell(0,10,utf8_decode('incidencia: '.$user['incidencia']),0,'c');
  $pdf->ln(10);
  $pdf->Cell(375,10,'fecha: '.$user['fecha'],0,0,'c');
  $pdf->ln(20);
}

$pdf->Output();



}else if( isset($_GET['txtFechaI'])&& isset($_GET['txtFechaF'])&& isset($_GET['txtEstudiante'])){
  
  $fechaI=$_GET['txtFechaI'];
  $fechaF=$_GET['txtFechaF'];

  $pdf=new FPDF('L','mm',array(400,270));
  $pdf->AliasNbPages();
  $consultant=$base->prepare(incidence($fechaI,$fechaF)[5]);
  $consultant->execute(array());
  $usuario=$consultant->fetchAll(PDO::FETCH_ASSOC);
  
  $pdf->AddPage();
//  $pdf->Image('imagen/home.png',10,8,33);
$pdf->setFillColor(232,232,232);
$pdf->SetFont('Arial','B',14);
$pdf->cell(40);
$pdf->Cell(40,3,'Reporte incidencia alumno '.date('Y-m-d'),0,0,'c');
$pdf->ln(30);
//$pdf->Cell(125,10,'nombre alumno',1,0,'c');$pdf->Cell(100,10,'Email',1,0,'c');$pdf->Cell(35,10,'Matricula',1,0,'c');
$pdf->ln(10);
foreach ($usuario as $user) {


  $pdf->Cell(375,10,'nombre: '.$user['nombre']." ".$user['apellidoM']." ".$user['apellidoP'],0,0,'c');
  $pdf->ln(10); 

  $pdf->MultiCell(0,10,utf8_decode('incidencia: '.$user['incidencia']),0,'c');
  $pdf->ln(10);
  $pdf->Cell(375,10,'fecha: '.$user['fecha'],0,0,'c');
  $pdf->ln(20);
}

$pdf->Output();

  
}else if(isset($_GET['txtMatr'])&& isset($_GET['txtFechaI'])&& isset($_GET['txtFechaF'])&& isset($_GET['txtProfesor'])){
  $matricula=$_GET['txtMatr'];
  $fechaI=$_GET['txtFechaI'];
  $fechaF=$_GET['txtFechaF'];
  $pdf=new FPDF('L','mm',array(400,270));
  $pdf->AliasNbPages();
  $consultant=$base->prepare(incidenceMatr($fechaI,$fechaF,$matricula)[1]);
  $consultant->execute(array());
  $usuario=$consultant->fetchAll(PDO::FETCH_ASSOC);
  
  $pdf->AddPage();
//  $pdf->Image('imagen/home.png',10,8,33);
$pdf->setFillColor(232,232,232);
$pdf->SetFont('Arial','B',14);
$pdf->cell(40);
$pdf->Cell(40,3,'Reporte incidencia Profesor '.date('Y-m-d'),0,0,'c');
$pdf->ln(30);
//$pdf->Cell(125,10,'nombre alumno',1,0,'c');$pdf->Cell(100,10,'Email',1,0,'c');$pdf->Cell(35,10,'Matricula',1,0,'c');
$pdf->ln(10);
foreach ($usuario as $user) {


  $pdf->Cell(375,10,'nombre: '.$user['nombre']." ".$user['apellidoM']." ".$user['apellidoP'],0,0,'c');
  $pdf->ln(10); 

  $pdf->MultiCell(0,10,utf8_decode('incidencia: '.$user['incidencia']),0,'c');
  $pdf->ln(10);
  $pdf->Cell(375,10,'fecha: '.$user['fecha'],0,0,'c');
  $pdf->ln(20);
}

$pdf->Output();
  
}else if(isset($_GET['txtFechaI'])&& isset($_GET['txtFechaF'])&& isset($_GET['txtProfesor'])){
  //$matricula=$_GET['txtMatr'];
  $fechaI=$_GET['txtFechaI'];
  $fechaF=$_GET['txtFechaF'];
  $pdf=new FPDF('L','mm',array(400,270));
  $pdf->AliasNbPages();
  $consultant=$base->prepare(incidence($fechaI,$fechaF)[6]);
  $consultant->execute(array());
  $usuario=$consultant->fetchAll(PDO::FETCH_ASSOC);
  
  $pdf->AddPage();
//  $pdf->Image('imagen/home.png',10,8,33);
$pdf->setFillColor(232,232,232);
$pdf->SetFont('Arial','B',14);
$pdf->cell(40);
$pdf->Cell(40,3,'Reporte incidencia Profesores '.date('Y-m-d'),0,0,'c');
$pdf->ln(30);
//$pdf->Cell(125,10,'nombre alumno',1,0,'c');$pdf->Cell(100,10,'Email',1,0,'c');$pdf->Cell(35,10,'Matricula',1,0,'c');
$pdf->ln(10);
foreach ($usuario as $user) {


  $pdf->Cell(375,10,'nombre: '.$user['nombre']." ".$user['apellidoM']." ".$user['apellidoP'],0,0,'c');
  $pdf->ln(10); 

  $pdf->MultiCell(0,10,utf8_decode('incidencia: '.$user['incidencia']),0,'c');
  $pdf->ln(10);
  $pdf->Cell(375,10,'fecha: '.$user['fecha'],0,0,'c');
  $pdf->ln(20);
}

$pdf->Output();
  
}if(isset($_GET['txtFechaI'])&& isset($_GET['txtFechaF'])&& isset($_GET['txtSe'])){
  //$matricula=$_GET['txtMatr'];
  $fechaI=$_GET['txtFechaI'];
  $fechaF=$_GET['txtFechaF'];
  $pdf=new FPDF('L','mm',array(400,270));
  $pdf->AliasNbPages();
  $consultant=$base->prepare("select incidencia,fecha from incidencia where fecha between '2022-09-09' and '2023-06-29';");
  $consultant->execute(array());
  $usuario=$consultant->fetchAll(PDO::FETCH_ASSOC);
  
  $pdf->AddPage();
//  $pdf->Image('imagen/home.png',10,8,33);
$pdf->setFillColor(232,232,232);
$pdf->SetFont('Arial','B',14);
$pdf->cell(40);
$pdf->Cell(40,3,'Reporte incidencia general '.date('Y-m-d'),0,0,'c');
$pdf->ln(30);
//$pdf->Cell(125,10,'nombre alumno',1,0,'c');$pdf->Cell(100,10,'Email',1,0,'c');$pdf->Cell(35,10,'Matricula',1,0,'c');
$pdf->ln(10);
foreach ($usuario as $user) {


  //$pdf->Cell(375,10,'nombre: '.$user['nombre']." ".$user['apellidoM']." ".$user['apellidoP'],0,0,'c');
  //$pdf->ln(10); 
  $pdf->Cell(375,10,'fecha: '.$user['fecha'],0,0,'c');
  $pdf->ln(10);
  $pdf->MultiCell(0,10,utf8_decode('incidencia: '.$user['incidencia']),0,'c');
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