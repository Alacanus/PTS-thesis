<?php
const DB_HOST = 'localhost';
const DB_NAME = 'u657624546_pts';
const DB_USER = 'u657624546_eslp';
const DB_PASSWORD = 'Zxcvbnm1';
$con = mysqli_connect("localhost","u657624546_eslp","Zxcvbnm1","u657624546_pts");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>