<?php require("header.php"); 
$id_cliente = $_GET["id_cliente"];
$edit = mysqli_query($con, "SELECT * FROM tbl_clientes WHERE id = '$id_cliente'");
$dados = mysqli_fetch_assoc($edit);
$id_cliente = $dados['id'];
$cliente = $dados['cliente'];
$tel = $dados['tel'];
$cep = $dados['cep'];
$dt_nascimento = $dados["dt_nascimento"];
$email = $dados['email'];
$endereco = $dados['endereco'];
$cidade = $dados['cidade'];
$cpf = $dados['cpf'];
?>
<div class="page-wrapper">
    <div class="container-fluid">    
       <form method="post" action="" autocomplete="on" enctype="multipart/form-data">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">   
                        <div class="row">
                           <div class="col-md-12"><hr class="hr-text" data-content="Dados do cliente"></div>
                           <div class="col-md-3">
                              <label for="cliente">Nome do cliente*</label>                                    
                              <input type="text" name="cliente" id="cliente" class="form-control" value="<?php echo $cliente; ?>" required>
                          </div>
                          <div class="col-md-3">
                            <label for="tel">Telefone ou celular*</label>                                   
                            <input name="tel" type="tel" id="tel" class="form-control celular" placeholder="(_)______-____" value="<?php echo $tel; ?>" required>                                                   
                        </div>
                        <div class="col-md-3">
                          <label for="dt_nascimento">Data de nascimento</label>                                    
                          <input type="text" name="dt_nascimento" id="dt_nascimento" placeholder="__/__/____" class="form-control nascimento" value="<?php echo $dt_nascimento; ?>">
                      </div>                                        

                      <div class="col-md-3">
                        <label for="cpf">CPF</label>                                
                        <input name="cpf" id="cpf" class="form-control cpf" value="<?php echo $cpf; ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cep">CEP</label>
                        <input type="text" id="cep" class="form-control cep" name="cep" value="<?php echo $cep; ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="rua">Endereço</label>
                        <input type="text" id="rua" class="form-control" name="endereco" value="<?php echo $endereco; ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="cidade">Cidade</label>
                        <input type="text" id="cidade" class="form-control" name="cidade" value="<?php echo $cidade; ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="col-sm-12">

                       <br> 
                       <?php if ($id_cliente == "") {
                         echo ('
                            <button type="submit" class="btn btn-success">CADASTRAR</button> 
                            <input type="hidden" name="acao" value="enviar-cadastro">');
                     }else{
                        echo ('<button type="submit" class="btn btn-success">ATUALIZAR</button>
                            <input type="hidden" name="id_cliente" value="'.$id_cliente.'">
                            <input type="hidden" name="envia" value="update">
                            ');
                    } 
                    ?>
                </div>
            </div>
        </div> 
    </div>
</div>
</div>
</form>

</div>
</div>
<!-- Modal Sucesso -->
<div class="modal fade" id="msgSucesso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Cadastro</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <p>Cadastro realizado com sucesso.</p>
    </div>
    <div class="modal-footer">
        <a href="clientes.php"><button type="button" class="btn btn-danger">OK</button></a>
    </div>
</div>
</div>
</div>
<!-- Modal Erro -->
<div class="modal fade" id="msgErro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">       
        <h4 class="modal-title" id="myModalLabel">Cadastro</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <p>Não foi possível realizar o cadastro!</p>
    </div>
</div>
</div>
</div>
<!-- Modal Erro -->
<div class="modal fade" id="msgCadastro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">        
        <h4 class="modal-title" id="myModalLabel">Cadastro</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <p>Consultei e vi que consta um nome parecido, já cadastrado.</p>
    </div>
</div>
</div>
</div>
<script type="text/javascript" >

 $(document).ready(function() {
    function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
            }
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {
                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');
                //Verifica se campo cep possui valor informado.
                if (cep != "") {
                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;
                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {
                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                          if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
    <?php require("footer.php"); 
    if(isset($_POST) && isset($_POST['acao']) == 'enviar-cadastro'){
        $tel = $_POST["tel"];
        $cliente = $_POST["cliente"];
        $cep = $_POST["cep"];
        $dt_nascimento = $_POST["dt_nascimento"];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $cpf = $_POST['cpf'];

        $busca = mysqli_query($con, "SELECT * FROM tbl_clientes WHERE cliente like '%$cliente%' or tel like '%$tel%'");
        if(mysqli_num_rows($busca) >= 1){
            echo "<script>$('#msgCadastro').modal('show')</script>";
            exit();
        }

        $query = mysqli_query($con,"INSERT INTO tbl_clientes (tel, cliente, cep, dt_nascimento, email, endereco, cidade, cpf) VALUES('$tel', '$cliente', '$cep', '$dt_nascimento', '$email', '$endereco', '$cidade', '$cpf')");
        if (!$query)
        {
            echo "<script>$('#msgErro').modal('show')</script>";
        } 
        else{
            echo "<script>$('#msgSucesso').modal('show')</script>";
        }     
    }
    if (isset($_POST) && isset($_POST['envia']) == 'update') {  
        $id_cliente = $_POST["id_cliente"];
        $tel = $_POST["tel"];
        $cliente = $_POST["cliente"];
        $cep = $_POST["cep"];
        $dt_nascimento = $_POST["dt_nascimento"];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade']; 
        $cpf = $_POST['cpf'];    
        
        $update = mysqli_query($con, "UPDATE tbl_clientes SET tel = '$tel', cliente = '$cliente', cep = '$cep', dt_nascimento = '$dt_nascimento', email = '$email', endereco = '$endereco', cidade = '$cidade', cpf = '$cpf' WHERE id='$id_cliente' ");
        if (!$update)  
        {   
            echo "<script>$('#msgErro').modal('show')</script>";
        } 
        else
        {
            echo "<script>$('#msgSucesso').modal('show')</script>";
        }
    }
    ?>