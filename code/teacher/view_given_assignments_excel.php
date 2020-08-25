<?php
// require autoload for project dependencies like phpspreadsheet and dbconnection for connection to database
session_start();
require '../dbconnection.php';
require '../vendor/autoload.php';
require 'verify_user_logged_in.php';
// calling spreadsheet class for excel and iofactory class for I/O operations on excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
// creating a new spreadsheet object and checking for active sheets if there are any
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// defining the query into a variable and running the query in the very next line 
$sqlquerye2 = "SELECT * FROM given_assignments_project2 WHERE Semester_No='{$_SESSION['semester']}' AND Course_No='{$_SESSION['course']}' ORDER BY Assign_No ASC";
$resultsqlquerye2 = mysqli_query($connect,$sqlquerye2);
// creating a count variable to be used in the while loop for iterating through the cell rows
$count=2;
// setting the values for the first row in the generated excel file
$sheet->setCellValue('A1','Semester_No');
$sheet->setCellValue('B1','Course_No');
$sheet->setCellValue('C1','Assign_No');
$sheet->setCellValue('D1','Assign_Topic');
$sheet->setCellValue('E1','Assign_Marks');
$sheet->setCellValue('F1','Dategiven');
$sheet->setCellValue('G1','Deadline');
// looping through the DB coloumns and setting the values for each cell of a row
while ($row=mysqli_fetch_assoc($resultsqlquerye2)) {
	$sheet->setCellValue('A'.$count,$row['Semester_No']);
	$sheet->setCellValue('B'.$count,$row['Course_No']);
	$sheet->setCellValue('C'.$count,$row['Assign_No']);
	$sheet->setCellValue('D'.$count,$row['Assign_Topic']);
	$sheet->setCellValue('E'.$count,$row['Assign_Marks']);
	$sheet->setCellValue('F'.$count,$row['Dategiven']);
	$sheet->setCellValue('G'.$count,$row['Deadline']);
	// iterating the count value each time the loop executes
	$count++;
}
$name = "GivenAssignments-".$_SESSION['semester']."-".$_SESSION['course'];
// defining headers for giving the file to the user for downloading
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); //MIME type for excel file
header('Content-Disposition: attachement;filename='.$name);      //File Name and download popup
header("Cache-Control: max-age=0");                                             
// creating a IOFactory instance for the variable $spreadsheet and the file type excel
$writer= IOFactory::createWriter($spreadsheet,'Xlsx');
// saving the output given by the php script to the .xlsx file
$writer->save('php://output');

?>