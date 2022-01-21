<?php
require_once("dbcontroller.php");
    $db_handle = new DBController();
    $result = $db_handle->runQuery("SELECT * FROM UsuariosDAW");
    $header = $db_handle->runQuery("SELECT `COLUMN_NAME` 
    FROM `INFORMATION_SCHEMA`.`COLUMNS` 
    WHERE `TABLE_SCHEMA`='Alumnos' 
        AND `TABLE_NAME`='UsuariosDAW'");

    require('fpdf/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();
    
    $pdf->SetFont('Arial','B',12);		
    foreach($header as $heading) {
        foreach($heading as $column_heading)
            $pdf->Cell(30,12,$column_heading,1);
    }
    foreach($result as $row) {
        $pdf->SetFont('Arial','',12);	
        $pdf->Ln();
        foreach($row as $column)
            $pdf->Cell(30,12,$column,1);
    }
    $pdf->Output();
?>