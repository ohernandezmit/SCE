<?php ini_set("display_errors","1");
    require '../lib/fpdf185/fpdf.php';  include "../db/var.php";
    include "../db/conect.php";

    class PDF extends FPDF {
        // Cabecera de página
        function cabecera(){
            $this->SetFont('Times','',8);
            $this->Cell(190,10,$fecha,0,1,'R');
            $this->SetFillColor(255,255,255);
            $this->SetFont('Times','B',20);
            //$this->Image('../../../../../sys/img/ATS.png',15,14,25);
            $this->SetY(17);$this->SetX(40);
            $this->Cell(145,8,"The American School of Tampico",55,10,'C',true);
            $this->SetFont('Times','',13);
            $this->SetY(25);$this->SetX(40);
            $this->Cell(145,8,utf8_decode("Campaign ".$campaing),55,10,'C',false);
            $this->SetFont('Times','',11);
            $this->SetY(25);$this->SetX(90);
            $this->Line(20,33,190,33);$this->Line(20,33.5,190,33.5);$this->Line(20,33.6,190,33.6);
            $this->Line(20,34.1,190,34.1);$this->Line(20,34.2,190,34.2);$this->Line(20,34.3,190,34.3);
        }

        function columns(){
            $x_axis = 20; $y_axis = 40;
            $this->SetFont('Times','B',12);
            $this->SetY($y_axis);$this->SetX($x_axis);
            $this->Cell(57,8,utf8_decode("Name"),0,0,'C',false);
            $this->SetY($y_axis);$this->SetX($x_axis+57);
            $this->Cell(57,8,utf8_decode("Pledged"),0,0,'C',false);
            $this->SetY($y_axis);$this->SetX($x_axis+114);
            $this->Cell(57,8,utf8_decode("Received"),0,0,'C',false);
            $this->Line(20,47,190,47);
    }

        function datas($campaing){
            $x_axis = 20; $y_axis = 48;
            $x=1; $ok=true;
            $this->SetFont('Times','',12);
            
            include "../../../../../sys/php/global.php"; include "../conexion.php";
            $query = "SELECT b.Id, b.ac_name, SUM(a.pledged) as pledged, SUM(a.received) as received
                    FROM gifts as a
                    INNER JOIN accounts as b on a.id_acct = b.Id
                    WHERE a.campaign='$campaing' GROUP BY b.ac_name ORDER BY b.Id asc";
            $resultado = $mysqli->query($query);
            while($cmp = $resultado->fetch_assoc()){
                $this->SetY($y_axis);$this->SetX($x_axis);
                $this->Cell(57,8,utf8_decode($cmp["ac_name"]),0,0,'L',false);
                $this->SetY($y_axis);$this->SetX($x_axis+57);
                $this->Cell(57,8,'$ '.$cmp["pledged"],0,0,'C',false);
                $this->SetY($y_axis);$this->SetX($x_axis+114);
                $this->Cell(57,8,'$ '.$cmp["received"],0,0,'C',false);
            $x++; $y_axis = $y_axis+8;  
            }
        }
    }

    $pdf = new PDF('P');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->cabecera();
    $pdf->columns();
    //$pdf->datas($campaing);
    $pdf->SetFont('Times','',12);
    $pdf->Output();
?>