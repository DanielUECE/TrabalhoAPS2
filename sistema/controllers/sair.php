<?php


session_start();

unset($_SESSION['nome']);
unset($_SESSION['email']);


header('Location: ../views/index.php');




























?>