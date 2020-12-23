<?php require("header.php");
$xprocura = mysqli_query($con,"SELECT * FROM tbl_filmes");
$count = @mysqli_num_rows($xprocura);
$conta ='0';
?>
<link rel="stylesheet" type="text/css" href="css/step.css">
<div class="page-wrapper">           
  <div class="container-fluid">  
    <div class="row">
      <div class="col-sm-12 space ">
        <a href="filmes-cadastrar.php">
          <button type="button" class="btn btn-danger p-4">
            <h4 class="text-white"><i class="fa fa-plus-circle" aria-hidden="true"></i> Cadastrar Filmes</button>
            </h4>
          </a>
        </div>
      </div>
      <!-- Row -->
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-block">                             
              <div class="col-md-12 col-sm-12">
                <form method="get" action="paginas-lista.php">
                  <div class="input-group stylish-input-group">
                    <input name="search" type="text" class="form-control" id="myInput" placeholder="buscar" value="<?php echo $proc ?>">
                    <span class="input-group-addon">
                      <button type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                      </button>  
                    </span>
                  </div>
                </form>
              </div>
              <div class="table-responsive m-t-40">
                <div class="w-100; text-center mb-5">
                 <?php 
                 echo ('Encontramos: <b>'.$count.'</b> filmes cadastrados </div>');

                 ?>
               </div>
               <table class="table stylish-table ">
                <thead>

                  <tr>
                   <td></td>
                   <td><b>Nome do filme</b></td>
                   <td><b>Quantidade</b></td>
                   <td colspan="6" width="10%" align="center"><b>Ações</b></td>
                 </tr>
               </thead>

               <tbody>
                 <?php                 
                 $sql = mysqli_query($con,"SELECT * FROM tbl_filmes order by id desc");
                 while($dados = mysqli_fetch_assoc($sql)){
                  $id = $dados['id'];
                  $nome_filme = $dados['nome_filme'];
                  $qt = $dados['qt'];
                  $status = $dados['status'];
                  $descricao = $dados['descricao'];
                  $img = $dados['img'];
                  ?>
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
                    <td><?php echo $qt; ?></td>
                    <td>
                      <a href="filmes-cadastrar.php?id=<?php echo $id; ?>">
                       <button class="btn btn-primary waves-effect waves-light" type="button">
                        <span class="btn-label"><i class="fa fa-pencil"></i></span>Editar</button>
                      </a>
                    </td>

                    <td>
                      <a href="excluir.php?id=<?php echo $id; ?>&db=tbl_filmes" onclick="return confirma_deletar();">
                        <button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
                      </td>  

                    </tr>
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
    </div>
  </div>
</div>

<script>
  function confirma_deletar() {
    return confirm( 'Tem certeza que deseja excluir este registro?' );
  }
</script>
<?php require("footer.php"); ?>