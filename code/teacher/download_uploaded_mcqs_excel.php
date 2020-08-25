<?php
session_start();
require '../dbconnection.php';
require '../vendor\autoload.php';
require 'verify_user_logged_in.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sqlquerye3 = "SELECT * FROM questionpapers_project2 WHERE Semester_No='{$_SESSION['semester']}' AND Course_No='{$_SESSION['course']}' ORDER BY Semester_No ASC";
$resultsqlquerye3 = mysqli_query($connect,$sqlquerye3);

$count=2;

$sheet->setCellValue('A1','Q_Id');
$sheet->setCellValue('B1','Semester_No');
$sheet->setCellValue('C1','Course_No');
$sheet->setCellValue('D1','Question');
$sheet->setCellValue('E1','Option1');
$sheet->setCellValue('F1','Option2');
$sheet->setCellValue('G1','Option3');
$sheet->setCellValue('H1','Option4');
$sheet->setCellValue('I1','Answer');

while ($row=mysqli_fetch_assoc($resultsqlquerye3)) {
	$sheet->setCellValue('A'.$count,$row['Q_Id']);
	$sheet->setCellValue('B'.$count,$row['Semester_No']);
	$sheet->setCellValue('C'.$count,$row['Course_No']);
	$sheet->setCellValue('D'.$count,$row['Question']);
	$sheet->setCellValue('E'.$count,$row['Op1']);
	$sheet->setCellValue('F'.$count,$row['Op2']);
	$sheet->setCellValue('G'.$count,$row['Op3']);
	$sheet->setCellValue('H'.$count,$row['Op4']);
	$sheet->setCellValue('I'.$count,$row['Answer']);

	$count++;

}

$name = "Uploaded_mcqs-".$_SESSION['semester']."-".$_SESSION['course'];
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachement;filename='.$name);
header("Cache-Control: max-age=0");

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx' );
$writer->save('php://output');
?>