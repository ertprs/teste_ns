<?php require("header.php");
$xprocura = mysqli_query($con,"SELECT * FROM tbl_paginas");
$count = @mysqli_num_rows($xprocura);
$conta ='0';
?>
<link rel="stylesheet" type="text/css" href="css/step.css">
<div class="page-wrapper">           
  <div class="container-fluid">  
    <div class="row">
      <div class="col-sm-12 space ">
       <a href="paginas-cadastrar.php">
        <button type="button" class="btn btn-danger p-4">
          <h4 class="text-white"><i class="fa fa-plus-circle" aria-hidden="true"></i> Cadastrar Páginas</button>
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
                echo ('Encontramos: <b>'.$count.'</b> paginas </div>');
             
              ?>
            </div>
            <table class="table stylish-table ">
              <thead>

                <tr>
                  <td><b>Nome da página</b></td>
                   <td><b>Site</b></td>
                  <td colspan="6" width="10%" align="center"><b>Ações</b></td>
                </tr>
              </thead>

              <tbody>
                 <?php                 
                        $sql = mysqli_query($con,"SELECT * FROM tbl_paginas order by titulo asc");
                        while($dados = mysqli_fetch_assoc($sql)){
                        $id = $dados['id'];
                        $titulo = $dados['titulo'];
                        $slug = $dados['slug'];
                        ?>
                        <tr class="searchtd">
                          <td><?php echo $titulo; ?></td>
                          <td><a href="http://limaocravo.srv.br/<?php echo $slug; ?>" target="_blank">VER O SITE</a></td>
                          <td>
                            <a href="paginas-cadastrar.php?id=<?php echo $id; ?>">
                             <button class="btn btn-primary waves-effect waves-light" type="button">
                              <span class="btn-label"><i class="fa fa-pencil"></i></span>Editar</button>
                            </a>
                         </td>

                        <td>
                            <a href="excluir.php?id=<?php echo $id; ?>&db=tbl_paginas" onclick="return confirma_deletar();">
                            <button type="button" class="btn btn-danger">Excluir</button></a>
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