<?php
$spreadsheet->getActiveSheet()->getStyle('E1:L7')
->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
$spreadsheet->setActiveSheetIndex(0)->mergeCells('E1:L1');
$spreadsheet->setActiveSheetIndex(0)->mergeCells('E2:L2')->setCellValue('E2', '2022 Año del Quincentenario de Toluca, Capital del Estado de México');
$spreadsheet->setActiveSheetIndex(0)->mergeCells('E3:L3')->setCellValue('E3', 'Esc. Sec. Offic. No. 0000 "Nombre Escuela');
$spreadsheet->setActiveSheetIndex(0)->mergeCells('E4:L4');
$spreadsheet->setActiveSheetIndex(0)->mergeCells('E5:L5')->setCellValue('E5', "Listas de Asistencia Ciclo Escolar 2022 - 2023");
//$spreadsheet->setActiveSheetIndex(0)->mergeCells('A6:H6')->setCellValue('A6', 'Periodo: '.$periodox);
$spreadsheet->setActiveSheetIndex(0)->mergeCells('E7:L7');
$spreadsheet->getActiveSheet()->getStyle('E1:L1')->getFont()->setName('Calibri')->setSize(10)->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('E4:L4')->getFont()->setName('Calibri')->setSize(10)->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('E2:L2')->getFont()->setName('Copperplate Gothic Light')->setSize(14)->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('E3:L3')->getFont()->setName('Copperplate Gothic Light')->setSize(12)->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('E5:L7')->getFont()->setName('Calibri')->setSize(11)->setBold(true);
//-------------------------------------------IMAGEN
$objDrawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$objDrawing->setName('ATS Logo');
$objDrawing->setDescription('MIT logo');
$objDrawing->setPath('../img/favicon.png');       // filesystem reference for the image file
$objDrawing->setHeight(80);                 // sets the image height to 36px (overriding the actual image height);
$objDrawing->setCoordinates('J1');    // pins the top-left corner of the image to cell D24
$objDrawing->setOffsetX(10); $objDrawing->setOffsetY(20);                // pins the top left corner of the image at an offset of 10 points horizontally to the right of the top-left corner of the cell
$objDrawing->setWorksheet($spreadsheet->getActiveSheet());
// --------------------------------------------------
$spreadsheet->getActiveSheet()->getStyle('A8:R8')->getFont()->setName('Calibri')->setSize(9)->setBold(true);
$spreadsheet->getActiveSheet()->getStyle('A1:R8')->getAlignment()->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('B8:R8')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
cellColor('B8:R8','000000');
$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('B8', 'Nombre')
	->setCellValue('C8', 'Fecha Solicitud')
	->setCellValue('D8', 'DescripciÓn')
	->setCellValue('E8', 'Fecha Limite')
	->setCellValue('F8', 'Area')
	->setCellValue('G8', 'C')
	->setCellValue('H8', 'R')
	->setCellValue('I8', 'S')
	->setCellValue('J8', 'L')
	->setCellValue('K8', 'F')
	->setCellValue('L8', 'O')
	->setCellValue('M8', 'Prioridad')
	->setCellValue('N8', 'Estatus')
	->setCellValue('O8', 'Responsable')
	->setCellValue('P8', 'Observaciones MTTO')
	->setCellValue('Q8', 'Fecha Entrega')
	->setCellValue('R8', 'Encargado');
	
	$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(15);
	$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(25);
	$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
	$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	$spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(15);
	$spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(25);
	$spreadsheet->getActiveSheet()->getColumnDimension('P')->setWidth(25);
	$spreadsheet->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
	$spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(20);
	
	$spreadsheet->getActiveSheet()->getStyle('C')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DATETIME);
	$spreadsheet->getActiveSheet()->getStyle('E')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DATETIME);
	$spreadsheet->getActiveSheet()->getStyle('B8:R8')->getAlignment()->setHorizontal('center');
	$spreadsheet->getActiveSheet()->getStyle('G:L')->getAlignment()->setHorizontal('center');
	
	
	/* $frst = $mysqli->query("SELECT * FROM work_order WHERE notifico = 1 and seccion='$seccion' ORDER BY Id asc");
	$xx=9; $C=''; $R=''; $S=''; $L=''; $F=''; $O='';
	while ($fcmp = $frst->fetch_array(MYSQLI_ASSOC)) {
		if ($fcmp['construccion']==1) { $C='X'; }
		if ($fcmp['reparacion']==1) { $R='X'; }
		if ($fcmp['sanitizacion']==1) { $S='X'; }
		if ($fcmp['limpieza']==1) { $L='X'; }
		if ($fcmp['fumigacion']==1) { $F='X'; }
		if ($fcmp['otros']==1) {
			$O='X';
		}

		if ($fcmp['estatus']=='verde.png') {
			$estatus='Completado';
		}elseif ($fcmp['estatus']=='amarillo.png') {
				$estatus='En proceso';
			} else {
				$estatus="No iniciado";
			}
					
		$spreadsheet->getActiveSheet()->setCellValue('B'.$xx, $fcmp['solicito']);
		$spreadsheet->getActiveSheet()->setCellValue('C'.$xx, $fcmp['fecha_solicitud']);
		$spreadsheet->getActiveSheet()->setCellValue('D'.$xx, $fcmp['descripcion']);
		$spreadsheet->getActiveSheet()->setCellValue('E'.$xx, $fcmp['fecha_limite']);
		
		$spreadsheet->getActiveSheet()->setCellValue('F'.$xx, $fcmp['ubicacion']);
		$spreadsheet->getActiveSheet()->setCellValue('G'.$xx, $C);
		$spreadsheet->getActiveSheet()->setCellValue('H'.$xx, $R);
		$spreadsheet->getActiveSheet()->setCellValue('I'.$xx, $S);
		$spreadsheet->getActiveSheet()->setCellValue('J'.$xx, $L);
		$spreadsheet->getActiveSheet()->setCellValue('K'.$xx, $F);
		$spreadsheet->getActiveSheet()->setCellValue('L'.$xx, $O);
		$spreadsheet->getActiveSheet()->setCellValue('M'.$xx, $fcmp['prioridad']);
		$spreadsheet->getActiveSheet()->setCellValue('N'.$xx, $estatus);
		$spreadsheet->getActiveSheet()->setCellValue('O'.$xx, $fcmp['responsable']);
		$spreadsheet->getActiveSheet()->setCellValue('P'.$xx, $fcmp['obs_mant']);
		$spreadsheet->getActiveSheet()->setCellValue('Q'.$xx, $fcmp['fecha_e']);
		$spreadsheet->getActiveSheet()->setCellValue('R'.$xx, $fcmp['encargado']);
		$xx++;	
	} */
$callStartTime = microtime(true);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Lista de asistencia.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$objWriter->save('php://output');
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;
?>
