<?php require("header.php"); 

$codigo = $_GET["codigo"];

$edit = mysqli_query($con, "SELECT * FROM tbl_filmes WHERE codigo='$codigo'");
$dados = mysqli_fetch_assoc($edit);
$id = $dados['id'];
$nome_filme = $dados['nome_filme'];
$qt = $dados['qt'];
$status = $dados['status'];
$codigo = $dados['codigo'];
$descricao = $dados['descricao'];
$img = $dados['img'];
?>


<div class="page-wrapper">
  <div class="container-fluid">    
   <form method="post" action="" autocomplete="on" enctype="multipart/form-data">

    <div class="row">

     <table class="table stylish-table ">
      <thead>

        <tr>
         <td></td>
         <td><b>Nome do filme</b></td>
         <td><b>Código</b></td>
         <td><b>Quantidade</b></td>
         <td colspan="1"><b>Selecionado</b></td> 
       </tr>
     </thead>

     <tbody>
      <tr class="searchtd">
        <td width="150">
          <?php if ($img != '') {
            echo "<img src='uploads/$img' class='img-thumbnail'>";
          }else{
            echo '<span class="img-thumbnail">'.substr($nome_filme,0,1).'</span>';
          } 
          ?>

        </td>
        <td><?php echo $nome_filme; ?></td>
        <td><?php echo $codigo; ?></td>
        <td><?php echo $qt; ?></td>
        <td><input type="checkbox" name="codigo" class="form-control" checked value="<?php echo $codigo ?>"></td>
      </tr>


    </tbody>
  </table>

  <div class="col-lg-12">
    <div class="card">
      <div class="card-block">   

        <div class="col-md-12"><hr class="hr-text" data-content="Buscar cliente"></div>
        <div class="col-lg-12 mb-3">
          <form method="post" action="">
            <div class="input-group stylish-input-group">
              <input type="nome" class="form-control" id="myInput" name="search" placeholder="Busque por: Nome do filme ou código" value="<?php echo $search ?>">
              <span class="input-group-addon">
                <button type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>  
              </span>
            </div>
          </form>
        </div>
        <table class="table stylish-table ">
          <thead>
            <tr>
              <td colspan="2"><b>Cliente</b></td>                                     
              <td colspan="1"><b>Telefone</b></td>  
              <td colspan="1"><b>CPF</b></td>                                                              
              <td colspan="2" width="10%" align="center"><b>Ações</b></td>
            </tr>
          </thead>

          <tbody>
            <?php 
            $cadastro = mysqli_query($con, "SELECT * FROM tbl_clientes ORDER BY id desc");
            while($dados = mysqli_fetch_assoc($cadastro)){  
              $id_cliente = $dados['id'];
              $cliente = $dados['cliente'];
              $tel = $dados['tel'];
              $email = $dados['email'];
              $cpf = $dados['cpf'];
              $endereco = $dados['endereco'];
              $tipo = $dados['tipo'];                                    
              ?>
              <tr class="searchtd">
                <td style="width:50px;">

                 <span class="round"><?php echo substr($cliente,0,1); ?></span>

               </td>
               <td>
                <h6><?php echo $cliente; ?></h6>
                <small class="text-muted"><?php echo $email; ?></small>
              </td>
              

              <td>
                <?php echo $tel; ?>
              </td>
              <td>
                <?php echo $cpf; ?>
              </td>

              <td>

                <a href="javascript:void(0)" onclick="agenda(<?php echo $id_cliente ?>)">
                  <button class="btn btn-danger" type="button">
                    <span class="btn-label"><i class="fa fa-flag-checkered" aria-hidden="true"></i></span>Reservar</button>
                  </a>

                </td>

              <?php } ?>
              <script>
                $(document).ready(function(){                                                        
                  $("#myInput").on("keyup", function() {                             
                    var string = $(this).val().toLowerCase();
                    $(".searchtd").filter(function() {
                      $(this).toggle($(this).text().toLowerCase().indexOf(string) > -1)
                    });
                  });
                });
              </script>
            </tbody>
          </table>



        </div>
      </div>
    </div>
  </div>

  <!-- Column -->
</div>
<!-- Row -->
</form>
</div>
</div>



<script type="text/javascript">
  function agenda(id_cliente) {
   $("#carrega").load("passaid.php?id_cliente="+id_cliente);
   $("#openmodal").modal("show");
 }
</script>
<div id="openmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">        
        <h4 class="modal-title">Confirmação</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">       
        <div id="carrega"></div>    
      </div>
      
    </div>
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
      <div class="modal-body text-center">
        <img src="images/correct.gif" class="img-fluid">
      </div>
      <div class="modal-footer">
        <a href="index.php"><button type="button" class="btn btn-danger">Ok, Fechar</button></a>
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





<?php require("footer.php"); 

if(isset($_POST) && isset($_POST['acao']) == 'criar'){

  $id_cliente = $_POST["id_cliente"];
  $codigo = $_GET["codigo"];
  $data = date('Y-m-d H:i:s');


  $query = mysqli_query($con,"INSERT INTO tbl_agendados(
    id_cliente, 
    codigo,
    data

    ) VALUES(
    '$id_cliente', 
    '$codigo',
    '$data'

  )");

  if (!$query)
  {
    echo "<script>$('#msgErro').modal('show')</script>";
  }
  else
  {
    echo "<script>$('#msgSucesso').modal('show')</script>";
  }
}

?>
