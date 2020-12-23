<?php require("header.php"); ?>
<div class="page-wrapper">           
    <div class="container-fluid">  
        <div class="row">
            <div class="col-sm-12 space ">
               <a href="cliente-cadastrar.php">
                <button type="button" class="btn btn-warning p-4"><i class="fa fa-plus-circle" aria-hidden="true"></i> CADASTRAR NOVO CLIENTE</button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-block">                            
                    <div class="col-md-12 col-sm-12">
                        <div class="input-group stylish-input-group">
                            <input name="search" type="text" class="form-control" id="myInput" placeholder="buscar">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>  
                            </span>
                        </div>
                    </div>
                    <div class="table-responsive m-t-40">
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
                                    <a href="cliente-cadastrar.php?id_cliente=<?php echo $id_cliente; ?>">
                                        <button class="btn btn-success waves-effect waves-light" type="button">
                                            <span class="btn-label"><i class="fa fa-pencil"></i></span>Editar</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="excluir.php?id=<?php echo $id_cliente; ?>&db=tbl_clientes" onclick="return confirma_deletar();">
                                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a></td> 

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