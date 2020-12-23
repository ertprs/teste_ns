<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Teste Nova Singular - Sistema administrativo </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!--===============================================================================================-->	
	<link rel="shortcut icon" href="images/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css?id=<?php echo time(); ?>">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			
			<div class="container">
				<div class="row">						
					<div class="col-lg-12">
						<div class="wrap-login100">	
							<span class="login100-form-title p-b-10">
								<img src="images/logo-branco.png" class="img-fluid">
							</span>
							<center>
								<hr>
								<p class="mt-3 mb-5">ÁREA ADMINISTRATIVA</p>
							</center>

							<form method="post" action="">
								<div class="wrap-input100 text-center">
									<input class="input100" type="text" name="login" required>
									<span class="focus-input100" data-placeholder="Usuário"></span>
								</div>
								<div class="wrap-input100 text-center">
									<input class="input100" type="password" name="senha" required>
									<span class="focus-input100" data-placeholder="Senha"></span>
								</div>

								<div class="container-login100-form-btn">
									<div class="wrap-login100-form-btn">
										<div class="login100-form-bgbtn"></div>
										<button class="login100-form-btn">								
											<input type="submit" name="entrar" value="ENTRAR" class="login100-form-btn" style="background: transparent;">
											<input type="hidden" name="acao" value="logar">
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="sidebar-footer">
							<center>			                       
								<a href="https://rafacoelho.com.br" target="_blank">
									<h6><small>Desenvolvido por Rafa Coelho</small></h6>
								</a>
							</center>
						</div>
					</div>
				</div>	
			</div>
		</div>	
	</div>
</div>
</div>
<!-- Modal Erro -->
<div class="modal fade" id="msgErro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Err0</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body text-center">
				<img src="images/error.gif" class="img-fluid">
				<h4>Ops, Algo de errado! <br>Login ou senha incorretos!</h4>
			</div>
			<div class="modal-footer">
				<a href="login.php"><button type="button" class="btn btn-secondary">Ok</button></a>
			</div>
		</div>
	</div>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="plugins/bootstrap/js/popper.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="js/main.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
<script type="text/javascript" src="js/setup.js"></script>



<?php
require("conexao.php");
if(isset($_POST) && isset($_POST['acao']) == 'logar'){ 

	$login = mysqli_real_escape_string($con, $_POST['login']);
	$senha = mysqli_real_escape_string($con, $_POST['senha']);
	
	$verifica = mysqli_query($con, "SELECT * FROM tbl_usuarios WHERE login = '$login' and senha = '$senha'");
	$dados = mysqli_fetch_assoc($verifica);

	if(mysqli_num_rows($verifica) == 1){
		session_start();	
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;

		echo "<script>window.location.href='index.php'</script>";
	}else{   
		session_destroy();
		//Limpa
		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);
		//Redireciona para a página de autenticação
		echo "<script>$('#msgErro').modal('show')</script>";
	}
}
?>
</body>
</html>
