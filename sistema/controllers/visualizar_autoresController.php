<?php 
include_once('../models/autor.php');
include_once('../db.class.php');


$dados = $_POST;


$objDb = new = db();
$link = $objDb->conecta_mysql();

$sql = "select * from autores"; 

$result = mysqli_query($link,$sql);















?>

