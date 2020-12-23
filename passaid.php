 <?php
 $id_cliente = $_GET["id_cliente"]; 
 require("conexao.php");
 $query = mysqli_query($con,"SELECT * FROM tbl_clientes WHERE id='$id_cliente'");                       
 $dados = mysqli_fetch_assoc($query); 
 $id_cliente = $dados['id'];
 $cliente = $dados['cliente'];
 $tel = $dados['tel'];
 $email = $dados['email'];
 $cpf = $dados['cpf'];
 $endereco = $dados['endereco'];
 $tipo = $dados['tipo']; 

 ?>
 <div class="row">
 	<div class="container">
 		<form method="post" action="">
 			<div class="col-sm-12">
 				<h2>Tem certeza que deseja reservar?</h2>
 			</div>

 			<div class="col-sm-12" style="text-align: right;"> 		
 				<button type="submit" class="btn btn-success">Sim, confirmar!</button>
 				<input type="hidden" name="id_cliente" value="<?php echo $id_cliente ?>">
 				<input type="hidden" name="acao" value="criar">
 			</div>
 		</form>
 	</div> 			
 </div>
 
