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
$sqlquerye1 = "SELECT * FROM answerpapers_projects2 WHERE Course_No='{$_SESSION['course']}' AND Semester_No='{$_SESSION['semester']}' ORDER BY A_Id ASC";
$resultsqlquerye1 = mysqli_query($connect, $sqlquerye1);
$count=2;
$sheet->setCellValue('A1',"U_Id"); 				$sheet->setCellValue('B1',"Q_Id");
$sheet->setCellValue('C1',"A_Id");			$sheet->setCellValue('D1',"Semester_No");
$sheet->setCellValue('E1',"Course_No");      $sheet->setCellValue('F1',"Chosen_Answer");
$sheet->setCellValue('G1',"Actual_Answer");			$sheet->setCellValue('H1',"Result");
while ($row=mysqli_fetch_assoc($resultsqlquerye1)) {
	$sheet->setCellValue('A'.$count,$row["U_Id"]); 				$sheet->setCellValue('B'.$count,$row["Q_Id"]);
	$sheet->setCellValue('C'.$count,$row["A_Id"]);		$sheet->setCellValue('D'.$count,$row["Semester_No"]);
	$sheet->setCellValue('E'.$count,$row["Course_No"]);    $sheet->setCellValue('F'.$count,$row["Chosen_Answer"]);
	$sheet->setCellValue('G'.$count,$row["Actual_Answer"]);		$sheet->setCellValue('H'.$count,$row["Result"]);
	$count++;
}
//$sheet->setCellValue('A1','#');
/*****writing from here********/
/** Point X0 **/
$name = "MCQgrades-".$_SESSION['semester']."-".$_SESSION['course'];
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename='.$name);
header("Cache-Control: max-age=0");
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output'); // browser treats it as an html file to treat it as an excel file see up  ** Point X0 **/
?>