<?php
session_start();
require ('../dbconnection.php');
require ('../vendor/autoload.php');
require 'verify_user_logged_in.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;




$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// set cell value
$sqlquerye1 = "SELECT * FROM assignments_project2 WHERE Course_No='{$_SESSION['course']}' AND Semester_No='{$_SESSION['semester']}' ORDER BY Assignment_No ASC";
$resultsqlquerye1 = mysqli_query($connect, $sqlquerye1);
$count=2;
$sheet->setCellValue('A1',"Student_ID"); 				$sheet->setCellValue('B1',"Student_Email");
$sheet->setCellValue('C1',"Semester_No");			$sheet->setCellValue('D1',"Course_No");
$sheet->setCellValue('E1',"Assignment_No");      $sheet->setCellValue('F1',"Assignment_Name");
$sheet->setCellValue('G1',"Upload_Date");			$sheet->setCellValue('H1',"Marks");
$sheet->setCellValue('I1',"Check_Date");
while ($row=mysqli_fetch_assoc($resultsqlquerye1)) {
	$sheet->setCellValue('A'.$count,$row["Student_ID"]); 				$sheet->setCellValue('B'.$count,$row["Student_Email"]);
	$sheet->setCellValue('C'.$count,$row["Semester_No"]);		$sheet->setCellValue('D'.$count,$row["Course_No"]);
	$sheet->setCellValue('E'.$count,$row["Assignment_No"]);    $sheet->setCellValue('F'.$count,$row["Assignment_FileN"]);
	$sheet->setCellValue('G'.$count,$row["Upload_Date"]);		$sheet->setCellValue('H'.$count,$row["Marks"]);
	$sheet->setCellValue('I'.$count,$row["Check_Date"]);
	$count++;
}
//$sheet->setCellValue('A1','#');
/*****writing from here********/
/** Point X0 **/
$name = "AssignmentsGrade-".$_SESSION['semester']."-".$_SESSION['course'];
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename='.$name);
header("Cache-Control: max-age=0");
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output'); // browser treats it as an html file to treat it as an excel file see up  ** Point X0 **/
?>