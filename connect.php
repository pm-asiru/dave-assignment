<?php

//starting php sessions
session_start();


$conn = mysqli_connect('localhost','root','Reflective21@123','database_registration');
if (!$conn) die('could not connect to the database');
?>