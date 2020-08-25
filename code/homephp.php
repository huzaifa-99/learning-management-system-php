<?php
session_start();
require 'verify_user_logged_in.php';
if (isset($_POST['course']) && $_POST['course']) {
  $_SESSION['course'] = $_POST['course'];
}
if (isset($_SESSION['semester']) && isset($_SESSION['course'])) {
  header("location: servicestousers.php");
}
?>