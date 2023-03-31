<?php ini_set("display_errors","1");
    require '../lib/fpdf185/fpdf.php';  include "../db/var.php";
    include "../db/conect.php";

    ini_set('date.timezone', 'America/Mexico_City');
    $fecha = date('d/m/Y');

    class PDF extends FPDF {
        // Cabecera de página
        function cabecera(){
            $this->SetFillColor(255,255,255);
            $this->SetFont('Times','',10);
            $this->Image('../img/favicon.png',10,5,15);
            $this->Image('../img/favicon.png',185,5,15);
            $this->SetY(20);$this->SetX(10);
            $this->Cell(190,6.5,utf8_decode('2022 Año del Quincentenario de Toluca, Capital del Estado de México'),0,0,'C',true);
            $this->SetFont('Times','B',10);
            $this->SetY(25);$this->SetX(10);
            $this->Cell(190,6.5,utf8_decode('Esc. Sec. Offic. No. 0000 "Nombre Escuela"'),0,0,'C',true);
        }

        function columns(){
            $x_axis = 10; $y_axis = 35;
            $this->SetFont('Times','B',11);
            $this->SetFillColor(234,234,234);
            $this->SetY($y_axis);$this->SetX($x_axis);
            $this->Cell(190,6.5,utf8_decode("Listas de Asistencia Ciclo Escolar 2022 - 2023"),1,0,'C',true);
            $this->SetY($y_axis+6.5);$this->SetX($x_axis);
            $this->Cell(190,6.5,utf8_decode("TERCERO A VESPERTINO"),1,0,'C',true);
            $this->SetFont('Times','B',10);
            $this->SetY($y_axis+13);$this->SetX($x_axis);
            $this->Cell(6,6.5,utf8_decode("#"),1,0,'C',true);
            $this->SetX($x_axis+6);
            $this->Cell(61,6.5,utf8_decode("Nombre"),1,0,'C',true);
            $this->SetX($x_axis+67);
            $this->Cell(23,6.5,utf8_decode(""),1,0,'C',true);
            
            //Bucle para hacer 20 columnas
            $i=100;
            for($var = 0; $var < 20; $var++){
                $this->SetX($i);
                $this->Cell(5,6.5,utf8_decode(""),1,0,'C',true);    
                $i=$i+5;
            }
        }

        function datas(){
            $x_axis = 10; $y_axis = 54.5;
            $x=1; $ok=true;
            $this->SetFont('Times','',8);
            
            include "../db/var.php"; include "../db/conect.php";
            $query = "SELECT apellidos, nombre FROM alumnos WHERE id_grado='5' and id_ciclo='1' ORDER BY apellidos ASC;";
            $resultado = $mysqli->query($query);
            while($cmp = $resultado->fetch_assoc()){
                $this->SetY($y_axis);$this->SetX($x_axis);
                $this->Cell(6,6.5,$x,1,0,'C',false);
                $this->SetY($y_axis);$this->SetX($x_axis+6);
                $this->Cell(61,6.5,utf8_decode($cmp["apellidos"].' '.$cmp["nombre"]),1,0,'L',false);
                $this->SetY($y_axis);$this->SetX($x_axis+67);
                $this->Cell(23,6.5,'',1,0,'C',false);
                //Bucle para hacer 20 columnas
                $i=100;
                for($var = 0; $var < 20; $var++){
                    $this->SetX($i);
                    $this->Cell(5,6.5,utf8_decode(""),1,0,'C',false);    
                    $i=$i+5;
                }
            $x++; $y_axis = $y_axis+6.5;  
            }
        }
    }

    $pdf = new PDF('P');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->cabecera();
    $pdf->columns();
    $pdf->datas();
    $pdf->SetFont('Times','',12);
    $pdf->Output();
?>