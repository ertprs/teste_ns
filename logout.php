<?php 

session_start();

$_SESSION['login'];

$_SESSION['senha'];



//Limpa



    unset ($_SESSION['login']);

    unset ($_SESSION['senha']);





//redirecionar o usuario para a página de login



echo "<script>alert('Você saiu do sistema...');top.location.href='login.php';</script>";





 ?>