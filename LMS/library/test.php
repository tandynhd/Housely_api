<?php
session_start();
error_reporting(0);
include('includes/config.php');




$name = $mysqli->query("SELECT no_of_books_reserved FROM tblstudents WHERE StudentId='SID012'")->fetch_object()->name; 
$row['$name'];



?>