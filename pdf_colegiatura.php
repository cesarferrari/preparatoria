<?php
require('fpdf/fpdf.php');
require('conexion.php');


      $select=$base->prepare("");




  $pdf=new FPDF('L','mm',array(100,50));
  $pdf->AddPage();
  $pdf->SetFont('Arial','B',15);
  $pdf->Cell(100,10,'helllo world',0,1,'C');


  $pdf->Output();




  class PDF extends FPDF{
    function header(){
      $this->Image('iamgen/edu.jpg',5,5,30);
      $this->SetFont('Arial','B',15);
      $this->Cell(30);
      $this->Cell('120','10','reporte de Colegiaturas',0,0,'C');
      $this->Ln(20);
    }
     function Footer(){
    
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'pagina ',$this->PageNo().'/{nb}',0,0,'C');
     }
    
     }


?>