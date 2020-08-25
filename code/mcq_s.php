<?php
session_start();
require 'verify_user_logged_in.php';
if ($_SESSION['User_Type'] === "Student") {
	header("location: student/course_mcqs_students.php");
}
if ($_SESSION['User_Type'] === "Teacher") {
	header("location: teacher/course_mcqs_teacher.php");
}
?>