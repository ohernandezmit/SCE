<?php
$spreadsheet->getActiveSheet()->getStyle('E1:L7')
->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
$spreadsheet->setActiveSheetIndex(0)->mergeCells('D1:L1');
$spreadsheet->setActiveSheetIndex(0)->mergeCells('D2:M2')->setCellValue('D2', '2022 Año del Quincentenario de Toluca, Capital del Estado de México');
$spreadsheet->setActiveSheetIndex(0)->mergeCells('D3:M3')->setCellValue('D3', 'Esc. Sec. Offic. No. 0000 "Nombre Escuela');
$spreadsheet->setActiveSheetIndex(0)->mergeCells('D4:M4');
$spreadsheet->setActiveSheetIndex(0)->mergeCells('D5:M5')->setCellValue('D5', "Listas de Asistencia Ciclo Escolar 2022 - 2023");
$spreadsheet->getActiveSheet()->getStyle('D5')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->setActiveSheetIndex(0)->mergeCells('D7:L7');
$spreadsheet->getActiveSheet()->getStyle('D1:L1')->getFont()->setName('Calibri')->setSize(10)->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('D4:L4')->getFont()->setName('Calibri')->setSize(10)->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('D2:L2')->getFont()->setName('Copperplate Gothic Light')->setSize(14)->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('D3:L3')->getFont()->setName('Copperplate Gothic Light')->setSize(12)->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('D5:L7')->getFont()->setName('Calibri')->setSize(12)->setBold(true);
//-------------------------------------------IMAGEN
$objDrawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$objDrawing->setName('ATS Logo');
$objDrawing->setDescription('MIT logo');
$objDrawing->setPath('../img/favicon.png');       // filesystem reference for the image file
$objDrawing->setHeight(80);                 // sets the image height to 36px (overriding the actual image height);
$objDrawing->setCoordinates('N1');    // pins the top-left corner of the image to cell D24
$objDrawing->setOffsetX(10); $objDrawing->setOffsetY(20);                // pins the top left corner of the image at an offset of 10 points horizontally to the right of the top-left corner of the cell
$objDrawing->setWorksheet($spreadsheet->getActiveSheet());
// --------------------------------------------------
$spreadsheet->getActiveSheet()->getStyle('A8:R8')->getFont()->setName('Calibri')->setSize(12)->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('A1:R8')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B8:R8')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
cellColor('B8:R8','000000');
$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('B8', '#')
	->setCellValue('C8', 'Nombre')
	->setCellValue('D8', '')
	->setCellValue('E8', '')
	->setCellValue('F8', '')
	->setCellValue('G8', '')
	->setCellValue('H8', '')
	->setCellValue('I8', '')
	->setCellValue('J8', '')
	->setCellValue('K8', '')
	->setCellValue('L8', '')
	->setCellValue('M8', '')
	->setCellValue('N8', '')
	->setCellValue('O8', '')
	->setCellValue('P8', '')
	->setCellValue('Q8', '')
	->setCellValue('R8', '');
	
	$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(5);
	$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(40);
	
	$spreadsheet->getActiveSheet()->getStyle('C')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DATETIME);
	$spreadsheet->getActiveSheet()->getStyle('E')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DATETIME);
	$spreadsheet->getActiveSheet()->getStyle('B8:R8')->getAlignment()->setHorizontal('center');
	$spreadsheet->getActiveSheet()->getStyle('G:L')->getAlignment()->setHorizontal('center');
	
	$frst = $mysqli->query("SELECT apellidos, nombre FROM alumnos WHERE id_grado='$grado' and id_ciclo='1' ORDER BY apellidos ASC");
    $xx=9; $i=1;
	while ($fcmp = $frst->fetch_array(MYSQLI_ASSOC)) {
					
		$spreadsheet->getActiveSheet()->setCellValue('B'.$xx, $i);
		$spreadsheet->getActiveSheet()->setCellValue('C'.$xx, $fcmp['apellidos'].' '.$fcmp['nombre']);
		$spreadsheet->getActiveSheet()->setCellValue('D'.$xx, '');
		$spreadsheet->getActiveSheet()->setCellValue('E'.$xx, '');
		$spreadsheet->getActiveSheet()->setCellValue('F'.$xx, '');
		$spreadsheet->getActiveSheet()->setCellValue('G'.$xx, '');
		$spreadsheet->getActiveSheet()->setCellValue('H'.$xx, '');
		$spreadsheet->getActiveSheet()->setCellValue('I'.$xx, '');
		$spreadsheet->getActiveSheet()->setCellValue('J'.$xx, '');
		$spreadsheet->getActiveSheet()->setCellValue('K'.$xx, '');
		$spreadsheet->getActiveSheet()->setCellValue('L'.$xx, '');
		$spreadsheet->getActiveSheet()->setCellValue('M'.$xx, '');
		$spreadsheet->getActiveSheet()->setCellValue('N'.$xx, '');
		$spreadsheet->getActiveSheet()->setCellValue('O'.$xx, '');
		$spreadsheet->getActiveSheet()->setCellValue('P'.$xx, '');
		$spreadsheet->getActiveSheet()->setCellValue('Q'.$xx, '');
		$spreadsheet->getActiveSheet()->setCellValue('R'.$xx, '');
		$xx++;	$i++;
	}

$callStartTime = microtime(true);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Lista de asistencia.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$objWriter->save('php://output');
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;
?>