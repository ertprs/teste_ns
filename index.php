<?php require("header.php"); ?>


<div class="page-wrapper">           
  <div class="container-fluid">             


    <div class="col-sm-12">
      <div class="card">
        <div class="card-block">                             
          <h2>Filmes alugados</h2>

          <div class="row">            

            <?php       
            $buscar = mysqli_query($con,"SELECT * FROM tbl_agendados inner join tbl_filmes on(tbl_agendados.codigo = tbl_filmes.codigo)");    
            while($dados = mysqli_fetch_assoc($buscar)){
              $id_cliente = $dados["id_cliente"];
              $img = $dados["img"];
              $nome_filme = $dados["nome_filme"];
              $codigo = $dados["codigo"];
              $data = date("d/m/Y h:i:s", strtotime($dados["data"]));

              $buscarcliente = mysqli_query($con,"SELECT * FROM tbl_clientes where id = '$id_cliente'");    
              $dados = mysqli_fetch_assoc($buscarcliente);
              $cliente = $dados["cliente"];
              ?>
              <div class="col-xs-12 col-sm-2 d-flex">

                <div class="card2">                
                  <?php if ($img != '') {
                    echo ("<img src='uploads/$img' class='img-fluid'>");
                  }else{
                    echo ('<img src="images/sem_foto_bb.jpg">');
                  } ?>

                  <div class="card-content text-center">                                
                    <h5>
                      Alugado em: <br><?php echo $data; ?><br> por: <a href="cliente-cadastrar.php?id_cliente=<?php echo $id; ?>"><?php echo $cliente; ?></a>
                    </h5>
                  </div>

                </div>
              </div>
            <?php } ?>    


          </div>
        </div>

      </div>

    </div>
    <div class="col-sm-12">
      <div class="card">
        <div class="card-block">                              
          <h2>Lista de filmes</h2>

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
               <td></td>
               <td><b>Nome do filme</b></td>
               <td><b>Codigo</b></td>
               <td><b>Quantidade</b></td>
               <td colspan="6" width="10%" align="center"><b>Ações</b></td>
             </tr>
           </thead>

           <tbody>
             <?php                 
             $sql = mysqli_query($con,"SELECT * FROM tbl_filmes order by nome_filme asc");
             while($dados = mysqli_fetch_assoc($sql)){
              $id = $dados['id'];
              $nome_filme = $dados['nome_filme'];
              $qt = $dados['qt'];
              $status = $dados['status'];
              $codigo = $dados['codigo'];
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
                <td><?php echo $codigo; ?></td>
                <td><?php echo $qt; ?></td>
                <td>
                  <a href="reservar.php?codigo=<?php echo $codigo; ?>">
                   <button class="btn btn-success waves-effect waves-light" type="button">
                    <span class="btn-label"><i class="fa fa-ticket"></i></span>Alugar</button>
                  </a>
                </td>

                <td>
                  <a href="filmes-cadastrar.php?id=<?php echo $id; ?>">
                   <button class="btn btn-primary waves-effect waves-light" type="button">
                    <span class="btn-label"><i class="fa fa-pencil"></i></span>Editar</button>
                  </a>
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
  <?php require("footer.php"); ?>