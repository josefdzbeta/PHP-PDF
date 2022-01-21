<?php
require_once("dbcontroller.php");
    //Procedimientos PHP
    $db_handle = new DBController();
    $result = $db_handle->runQuery("SELECT * FROM UsuariosDAW");
    
    //Obtener la información de título
    $header = $db_handle->runQuery("SELECT `COLUMN_NAME` 
    FROM `INFORMATION_SCHEMA`.`COLUMNS` 
    WHERE `TABLE_SCHEMA`='Alumnos' 
        AND `TABLE_NAME`='UsuariosDAW'");

    //Creamos un nuevo objeto fpdf
    require('fpdf/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();
    
    //Ponemos el tipo de letra negrita y tamaño 12 en el título y le damos el ancho y la altura de la celda, con borde 1
    $pdf->SetFont('Arial','B',12);		
    foreach($header as $heading) {
        foreach($heading as $column_heading)
            $pdf->Cell(30,12,$column_heading,1);
    }

    //Ponemos el tamaño de letra 12 para el contenido y le damos el ancho y la altura de la celda, con borde 1
    foreach($result as $row) {
        $pdf->SetFont('Arial','',12);	
        $pdf->Ln();
        foreach($row as $column)
            $pdf->Cell(30,12,$column,1);
    }
    $pdf->Output();
?>
