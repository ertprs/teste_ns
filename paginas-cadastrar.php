<?php require("header.php"); 

$id = $_GET["id"];
$edit = mysqli_query($con, "SELECT * FROM tbl_paginas WHERE id='$id'");
$dados = mysqli_fetch_assoc($edit);
$id = $dados['id'];
$titulo = $dados['titulo'];
$materia = $dados['materia'];
$id_color = $dados['id_color'];
?>

  <div class="page-wrapper">
            <div class="container-fluid">    
  <form class="form-horizontal form-material" method="post" action="" autocomplete="on" enctype="multipart/form-data">

                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">   
                              <div class="row">
                                     <div class="col-md-12">
                                       <?php if ($id == '') {
                                           echo ('<hr class="hr-text" data-content="Nova página">');
                                       }else{
                                           echo(' <hr class="hr-text" data-content="Editar página">');
                                        } ?>
                                    </div>
                                   <div class="col-lg-12">
                                    <div id="accordion">
                                      <div class="card">
                                        <div id="headingOne" class="card-header">
                                          <h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"> Hall two</button></h5>
                                        </div>
                                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                                          <div class="card-body"> <label>Botão padrão</label> 
                                      <pre><code>&lt;button class="btn btn-outline-secondary"&gtdownload&lt;/button&gt</code></pre></div>
                                         <div class="card-body"> <label>Caixa expansiva</label> 
                                          <pre>&lt;div id="accordion"&gt;
&lt;div class="card">
&lt;div id="headingOne&quot; class="card-header">
&lt;h5 class="mb-0">&lt;button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"> ------ TITULO VAI AQUI -----&lt;/button&gt;&lt;/h5>
&lt;/div&gt;
&lt;div id="collapseOne" class="collapse" data-parent="#accordion">
&lt;div class="card-body">----- O TEXTO VAI AQUI -------&lt;/div>
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;</pre>

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                  
                                   <div class="col-md-6">
                                    <label for="titulo">Categoria do site</label>
                                     <select class="form-control" name="id_color">
                                      <option>Selecione</option>
                                       <option value="bg-roxo" <?php if ($id_color == 'bg-roxo') { echo 'selected';} ?>>História</option>
                                       <option value="bg-primary" <?php if ($id_color == 'bg-primary') { echo 'selected';} ?>>Administração</option>
                                       <option value="bg-verde" <?php if ($id_color == 'bg-verde') { echo 'selected';} ?>>Atividades</option>
                                       <option value="bg-laranja" <?php if ($id_color == 'bg-laranja') { echo 'selected';} ?>>Transparência</option>
                                       <option value="bg-vermelho" <?php if ($id_color == 'bg-vermelho') { echo 'selected';} ?>>Comunidade</option>
                                     </select>
                                   </div>

                                    <div class="col-md-6">
                                      <label for="titulo">Nome da página <i>(manter minúsculo)</i></label>                                    
                                        <input type="text" name="titulo" id="titulo" class="form-control form-control-line text-lowercase" value="<?php echo $titulo; ?>" required>
                                    </div>
                                    <div class="col-md-12">                              
                                        <label for="Matéria">Matéria</label>               
                                        <textarea name="materia" class="form-control editor text-capitalize" rows="30"><?php echo $materia; ?></textarea>
                                    </div>                                    
                       
                                        <div class="col-sm-12">
                                            <br> 
                                                <?php if ($id != '') {
                                                     echo ('<button type="submit" class="btn btn-success">ATUALIZAR</button> 
                                                          <input type="hidden" name="id" value="'.$id.'">   
                                                          <input type="hidden" name="ok" value="update">
                                                      '); }else{ 

                                                    echo ('<button type="submit" class="btn btn-success">CADASTRAR</button>
                                                           <input type="hidden" name="acao" value="criar"> '); 
                                                     } 
                                                ?>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <!-- Column -->
                </div>
                <!-- Row -->
                  </form>
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

    $titulo = $_POST["titulo"];
    $materia = $_POST["materia"];
    $id_color = $_POST["id_color"];
    
        function limpaUrl($str){
            $str = strtolower(utf8_decode($str)); $i=1;
            $str = strtr($str, utf8_decode('àáâãäçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaceeeeiiiinoooooouuuyyy');
            $str = preg_replace("/([^a-z0-9])/",'-',utf8_encode($str));
            while($i>0) $str = str_replace('--','-',$str,$i);
            if (substr($str, -1) == '-') $str = substr($str, 0, -1);
            return $str;
        }

      $texto = limpaUrl($titulo);

    $query = mysqli_query($con,"INSERT INTO tbl_paginas(
      titulo, 
      materia,
      id_color, 
      slug
  
      ) VALUES(
      '$titulo', 
      '$materia',
      '$id_color',
      '$texto'

    )");

        if (!$query)
        {
            echo "<script>$('#msgErro').modal('show')</script>";
        }
        else
        {
            echo "<script>$('#msgSucesso').modal('show')</script>";
            echo "<script>window.location.href='paginas-lista.php'</script>";
        }
    }

?>


<?php 

if (isset($_POST) && isset($_POST['ok']) == 'update') {  

    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $materia = $_POST["materia"];
    $id_color = $_POST["id_color"];

        function limpaUrl($str){
            $str = strtolower(utf8_decode($str)); $i=1;
            $str = strtr($str, utf8_decode('àáâãäçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaceeeeiiiinoooooouuuyyy');
            $str = preg_replace("/([^a-z0-9])/",'-',utf8_encode($str));
            while($i>0) $str = str_replace('--','-',$str,$i);
            if (substr($str, -1) == '-') $str = substr($str, 0, -1);
            return $str;
        }

    $texto = limpaUrl($titulo);



    $zupdate = mysqli_query($con, "UPDATE tbl_paginas SET titulo = '$titulo', materia = '$materia', slug = '$texto', id_color = '$id_color' WHERE id='$id' ");
        if (!$zupdate)  
        {   
            echo "<script>$('#msgErro').modal('show')</script>";
        } 
        else
        {
            echo "<script>$('#msgSucesso').modal('show')</script>";
            echo "<script>window.location.href='paginas-lista.php'</script>";
        }
    }

   ?>
