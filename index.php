<?php require_once "src/connect.php"?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front-end - CIT</title>
     
    <!-- Datatable CSS básico -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" type="text/css" href="src/bootstrap/css/bootstrap.css"/>

    <script src="src/bootstrap/js/bootstrap.bundle.min.js"></script>
        
    <!-- Datatable -->

    
    <link rel="stylesheet" href="css/main.css" />
</head>

<body>
    <div id="content" class="jumbotron text-center container">
        <header>
            <h1>CI&T</h1>
            <hr>
            <h2>My TODO List</h2>

            <form id="form-nova-tarefa" class="form-inline">
                <div class="input-group">
                    <input type="text" name="input-nova-tarefa" id="input-nova-tarefa" class="form-control" size="50" placeholder="Descrição:" required />
                    <!-- <select class="form-control" name="list-checkbox" id="list-checkbox">
						<option>Question</option>
						<option>Category</option>
						<option>User</option>
					  </select>-->  
                    <div class="input-group-btn">
                        <input type="submit" id="enviar-nova-tarefa" class="btn btn-danger" value="Cadastrar" />
                    </div>
                </div>
            </form>
        </header>
        <main>
            <table id="tabela" class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th></th>
                        <th>Tarefa</th>
                        <th>Finalizado?</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $select = "SELECT * FROM informacoes";
                        $resultado = mysqli_query($conn, $select);
                        while($dados = mysqli_fetch_array($resultado)){
                    ?>
                    <tr class="table-light">
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </div>
                        </td>
                        <td><?php echo $dados['nome_tarefa']?></td> 
                        <td><?php if($dados['finalizou'] == 1){echo "Sim";}else{echo "Não";}; ?></td>                               
                        <td>
                            <div class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-sm btnEditar" name="btnEditar" id="<?php echo $dados['id']?>" data-toggle="modal" data-target="#modalEditar">Editar</button>
                                    <button class="btn btn-danger btn-sm btnExcluir" name="btnExcluir" id="<?php echo $dados['id']?>" data-toggle="modal" data-target="#modalExcluir">Excluir</button>
                                    <button class="btn btn-success btn-sm btnFinalizar" name="btnFinalizar" id="<?php echo $dados['id']?>" data-toggle="modal" data-target="#modalFinalizar">Finalizar</button>
                                </div>                                        
                            </div>
                        </td>
                    </tr>
                    <?php }; ?>                                 
                </tbody>
            </table>
            <div class="container">
                <button type="button" class="btn btn-primary">Selecionar tudo</button>
                <button type="button" class="btn btn-primary">teste</button>
            </div>
            
        </main>
    </div>

    <!--Modal editar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gerar ID's</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="" id="gerar_ids">     
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="senhaIds" class="col-form-label">Senha</label>
                            <input type="password" class="form-control" id="senhaIds" name="senhaIds">
                        </div>
                        <div class="form-group">
                            <label for="confirmaSenhaIds" class="col-form-label">Confirmação de senha</label>
                            <input type="password" class="form-control" id="confirmaSenhaIds" name="confirmaSenhaIds">
                        </div>           
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="btnModalGerarIds" class="btn btn-success">Gerar</button>
                    </div>
                </form>    
            </div>
        </div>
    </div> 

    <script src="main.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    
</body>

</html>