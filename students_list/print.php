<?php ini_set("display_errors","1");
    require '../lib/fpdf185/fpdf.php';  include "../db/var.php";
    include "../db/conect.php";

    ini_set('date.timezone', 'America/Mexico_City');
    $fecha = date('d/m/Y');
    $grado = $_POST['grado'];

    $query = "SELECT apellidos, nombre FROM alumnos WHERE id_grado='$grado' and id_ciclo='1' ORDER BY apellidos ASC";
    $resultado = $mysqli->query($query);
    $num = $resultado->num_rows;
    
    if($num>0){
        $pdf = new FPDF('P');
        $pdf->SetAutoPageBreak(true);
        $pdf->AddPage();
        $pdf->SetFillColor(255,255,255);
        $pdf->SetFont('Times','',10);
        $pdf->Image('../img/favicon.png',10,5,15);
        $pdf->Image('../img/favicon.png',185,5,15);
        $pdf->SetY(20);$pdf->SetX(10);
        $pdf->Cell(190,6.5,utf8_decode('2022 Año del Quincentenario de Toluca, Capital del Estado de México'),0,0,'C',true);
        $pdf->SetFont('Times','B',10);
        $pdf->SetY(25);$pdf->SetX(10);
        $pdf->Cell(190,6.5,utf8_decode('Esc. Sec. Offic. No. 0000 "Nombre Escuela"'),0,0,'C',true);
        
        $x_axis = 10; $y_axis = 35;
        $pdf->SetFont('Times','B',11);
        $pdf->SetFillColor(234,234,234);
        $pdf->SetY($y_axis);$pdf->SetX($x_axis);
        $pdf->Cell(190,6.5,utf8_decode("Listas de Asistencia Ciclo Escolar 2022 - 2023"),1,0,'C',true);
        $pdf->SetY($y_axis+6.5);$pdf->SetX($x_axis);
        $pdf->Cell(190,6.5,utf8_decode("TERCERO A VESPERTINO"),1,0,'C',true);
        $pdf->SetFont('Times','B',10);
        $pdf->SetY($y_axis+13);$pdf->SetX($x_axis);
        $pdf->Cell(6,6.5,utf8_decode("#"),1,0,'C',true);
        $pdf->SetX($x_axis+6);
        $pdf->Cell(61,6.5,utf8_decode("Nombre"),1,0,'C',true);
        $pdf->SetX($x_axis+67);
        $pdf->Cell(23,6.5,utf8_decode(""),1,0,'C',true);
            
        //Bucle para hacer 20 columnas
        $i=100;
        for($var = 0; $var < 20; $var++){
            $pdf->SetX($i);
            $pdf->Cell(5,6.5,utf8_decode(""),1,0,'C',true);    
            $i=$i+5;
        }
        
        $pdf->Ln();
        //Obtenemos los datos de la base de datos y los 
        $x_axis = 10; $y_axis = 54.5;
        $x=1;
        $pdf->SetFont('Times','',8);
        while($cmp = $resultado->fetch_assoc()){
            $pdf->SetY($y_axis);$pdf->SetX($x_axis);
            $pdf->Cell(6,6.5,$x,1,0,'C',false);
            $pdf->SetY($y_axis);$pdf->SetX($x_axis+6);
            $pdf->Cell(61,6.5,utf8_decode($cmp["apellidos"].' '.$cmp["nombre"]),1,0,'L',false);
            $pdf->SetY($y_axis);$pdf->SetX($x_axis+67);
            $pdf->Cell(23,6.5,'',1,0,'C',false);
            //Bucle para hacer 20 columnas
            $i=100;
            for($var = 0; $var < 20; $var++){
                $pdf->SetX($i);
                $pdf->Cell(5,6.5,utf8_decode(""),1,0,'C',false);    
                $i=$i+5;
            }
            // Al tener 33 registros generamos nueva pagina para imprimir los registros faltantes
            if($x==33){
                $pdf->AddPage();
                $pdf->SetFillColor(255,255,255);
                $pdf->SetFont('Times','',10);
                $pdf->Image('../img/favicon.png',10,5,15);
                $pdf->Image('../img/favicon.png',185,5,15);
                $pdf->SetY(20);$pdf->SetX(10);
                $pdf->Cell(190,6.5,utf8_decode('2022 Año del Quincentenario de Toluca, Capital del Estado de México'),0,0,'C',true);
                $pdf->SetFont('Times','B',10);
                $pdf->SetY(25);$pdf->SetX(10);
                $pdf->Cell(190,6.5,utf8_decode('Esc. Sec. Offic. No. 0000 "Nombre Escuela"'),0,0,'C',true);
                
                $x_axis = 10; $y_axis = 35;
                $pdf->SetFont('Times','B',11);
                $pdf->SetFillColor(234,234,234);
                $pdf->SetY($y_axis);$pdf->SetX($x_axis);
                $pdf->Cell(190,6.5,utf8_decode("Listas de Asistencia Ciclo Escolar 2022 - 2023"),1,0,'C',true);
                $pdf->SetY($y_axis+6.5);$pdf->SetX($x_axis);
                $pdf->Cell(190,6.5,utf8_decode("TERCERO A VESPERTINO"),1,0,'C',true);
                $pdf->SetFont('Times','B',10);
                $pdf->SetY($y_axis+13);$pdf->SetX($x_axis);
                $pdf->Cell(6,6.5,utf8_decode("#"),1,0,'C',true);
                $pdf->SetX($x_axis+6);
                $pdf->Cell(61,6.5,utf8_decode("Nombre"),1,0,'C',true);
                $pdf->SetX($x_axis+67);
                $pdf->Cell(23,6.5,utf8_decode(""),1,0,'C',true);
                
                $x_axis = 10; $y_axis = 48;
                $pdf->SetFont('Times','',8);
                    
                //Bucle para hacer 20 columnas
                $i=100;
                for($var = 0; $var < 20; $var++){
                    $pdf->SetX($i);
                    $pdf->Cell(5,6.5,utf8_decode(""),1,0,'C',true);    
                    $i=$i+5;
                }    
            }    
            $x++; $y_axis = $y_axis+6.5;  
        }
        
        $pdf->Output();
    }
$mysqli->close();
    
?>