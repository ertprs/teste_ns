<?php 
session_start();
//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if (!isset($_SESSION['login']) && !isset($_SESSION['senha'])) {
    //Destrói
  session_destroy();
    //Limpa
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);  
  

    //Redireciona para a página de autenticação
  header('location:login.php');
  exit;
}

$login = $_SESSION['login'];
$senha = $_SESSION['senha'];

require("conexao.php"); 
require('conexao_mkt.php');
$conect = mysqli_query($con, "SELECT * FROM tbl_usuarios WHERE login = '$login' and senha = '$senha'");
$dados = mysqli_fetch_assoc($conect);

$id = $dados["id"];
$nome = $dados["nome"];


if($id != "")
{
  $_REQUEST["id"] = $id;
} 
?>