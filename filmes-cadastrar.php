<?php require("header.php"); 

$id = $_GET["id"];
$edit = mysqli_query($con, "SELECT * FROM tbl_filmes WHERE id='$id'");
$dados = mysqli_fetch_assoc($edit);
$id = $dados['id'];
$nome_filme = $dados['nome_filme'];
$qt = $dados['qt'];
$status = $dados['status'];
$descricao = $dados['descricao'];
$img = $dados['img'];
?>
<script src="https://cdn.tiny.cloud/1/mewrstxy1qafkxzgwrof3s2apj0mnccleag1rsj527bs02fd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<style>
  .tox .tox-notification--warn, .tox .tox-notification--warning {
    display: none;
    }.tox .tox-notification--error {
      display: none;
    }
  </style>

  <div class="page-wrapper">
    <div class="container-fluid">    
     <form method="post" action="" autocomplete="on" enctype="multipart/form-data">

      <div class="row">
        <!-- Column -->                  
        <div class="col-lg-4 col-xlg-3 col-md-5">
          <div class="card">
            <div class="card-block">
              <center class="m-t-30">          
                <label for="fileUpload">Inserir capa do filme </label>
                <input name="img" type="file" id="fileUpload" accept="image/*" onchange="previewImage(this)"> 
                <?php if ($img != "") {
                  echo ('<img src="uploads/'.$img.'" id="imgpreview">');
                }else{
                  echo ('<img src="images/perfil.jpg" id="imgpreview">');
                } ?>
              </center>
            </div>
          </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
          <div class="card">
            <div class="card-block">   

             <div class="col-md-12"><hr class="hr-text" data-content="Dados do Filme"></div>

             <div class="col-md-12">
              <label for="nome_filme">Nome do Filme*</label>                                    
              <input type="text" name="nome_filme" id="nome_filme" class="form-control" value="<?php echo $nome_filme; ?>" required>
            </div>
            <div class="col-md-12">
              <label for="qt">Quantidade (cópias)*</label>                                       
              <input type="number" name="qt" id="qt" class="form-control" value="<?php echo $qt; ?>">                       
            </div> 
            <div class="col-md-12">
              <label for="descricao">Descrição*</label>                                    
              <textarea class="form-control editor" name="descricao" rows="15"><?php echo $descricao; ?></textarea>
            </div> 


            <div class="col-sm-12">

             <br> 
             <?php if ($id == "") {
               echo ('
                <button type="submit" class="btn btn-success">CADASTRAR</button> 
                <input type="hidden" name="acao" value="enviar-cadastro">');
             }else{
              echo ('<button type="submit" class="btn btn-success">ATUALIZAR</button>
                <input type="hidden" name="img" value="'.$img.'">
                <input type="hidden" name="id" value="'.$id.'">
                <input type="hidden" name="ok" value="update">
                ');
            } 
            ?>


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
        <a href="filmes-cadastrar.php?id=<?php echo $id ?>"><button type="button" class="btn btn-danger">Ok, Fechar</button></a>
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

  $nome_filme = $_POST["nome_filme"];
  $qt = $_POST["qt"];
  $descricao = $_POST["descricao"];

  $pasta = 'uploads';
  $permitido = array('image/jpg', 'image/jpeg', 'image/png');

  $img = $_FILES['img'];
  $tmp = $img['tmp_name'];
  $name = $img['name'];
  $type = $img['type'];

  require('funcao.php');


  if($type == 'image/jpeg')
  {
    $foto = md5(uniqid(rand(),true)).'.'.'jpg';
    upload($tmp, $foto, 400, $pasta, $type);
  }
  elseif ($type == 'image/png')
  {
    $foto = md5(uniqid(rand(),true)).'.'.'png';
    upload($tmp, $foto, 400, $pasta, $type);
  }
  elseif ($type == 'image/gif')
  {
    $foto = md5(uniqid(rand(),true)).'.'.'gif';
    upload($tmp, $foto, 400, $pasta, $type);
  }



  $query = mysqli_query($con,"INSERT INTO tbl_filmes(
    nome_filme, 
    qt,
    descricao, 
    img

    ) VALUES(
    '$nome_filme', 
    '$qt',
    '$descricao',
    '$foto'

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


<?php 

if (isset($_POST) && isset($_POST['ok']) == 'update') {  

  $id = $_POST["id"];
  $nome_filme = $_POST["nome_filme"];
  $qt = $_POST["qt"];
  $descricao = $_POST["descricao"];
  $foto = $_POST["img"];

  $pasta = 'uploads';
  $permitido = array('image/jpg', 'image/jpeg', 'image/png');

  $img = $_FILES['img'];
  $tmp = $img['tmp_name'];
  $name = $img['name'];
  $type = $img['type'];

  require('funcao.php');

  if(!empty($name) && in_array($type,$permitido))
  {
    if(file_exists(realpath("uploads/".$foto)))
    {
      unlink(realpath("uploads/".$foto));
      if($type == 'image/jpeg')
      {
        $foto = md5(uniqid(rand(),true)).'.'.'jpg';
        upload($tmp, $foto, 400, $pasta, $type);
      }
      elseif ($type == 'image/png')
      {
        $foto = md5(uniqid(rand(),true)).'.'.'png';
        upload($tmp, $foto, 400, $pasta, $type);
      }
      elseif ($type == 'image/gif')
      {
        $foto = md5(uniqid(rand(),true)).'.'.'gif';
        upload($tmp, $foto, 400, $pasta, $type);
      }
    }
    else
    {
      unlink(realpath("uploads/".$foto));

      if($type == 'image/jpeg')
      {
        $foto = md5(uniqid(rand(),true)).'.'.'jpg';
        upload($tmp, $foto, 400, $pasta, $type);
      }
      elseif ($type == 'image/png')
      {
        $foto = md5(uniqid(rand(),true)).'.'.'png';
        upload($tmp, $foto, 400, $pasta, $type);
      }
      elseif ($type == 'image/gif')
      {
        $foto = md5(uniqid(rand(),true)).'.'.'gif';
        upload($tmp, $foto, 400, $pasta, $type);
      }
    }
  }


  $uup = mysqli_query($con, "UPDATE tbl_filmes SET nome_filme='$nome_filme', qt='$qt', descricao='$descricao', img='$foto' WHERE id='$id' ");
  if (!$uup)  
  {   
    echo "<script>$('#msgErro').modal('show')</script>";
  } 
  else
  {
    echo "<script>$('#msgSucesso').modal('show')</script>";
  }
}

?>
