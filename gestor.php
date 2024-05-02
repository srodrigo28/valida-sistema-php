row<?php
    include './core/conn.php';

    function CriarGestor($conn){

        $nome  = $_POST['nome'];
        $email = $_POST['email'];
        $sexo  = $_POST['sexo'];
        $tel   = $_POST['telefone'];

        if($nome == "" || $sexo == "" || $email == "" || $tel == ""){
            echo " Preencha todos os campos !! ";
        }else{
            $stmt = $conn->prepare(
                "INSERT INTO gestor (nome, sexo, email, telefone) 
                VALUES (:nome, :sexo, :email, :telefone)"
            );
    
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":sexo", $sexo);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":telefone", $tel);
    
            $stmt->execute();   
        }
    }

    function ListaGestor($conn){

        $stmt = $conn->prepare("SELECT * FROM gestor");

        $stmt->execute();

        $data = $stmt->fetch();
    }

    $sql_users = "SELECT * FROM gestor ORDER BY nome ASC";
    $result_itens = $conn->prepare($sql_users);
    $result_itens->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Adicionar Gestor</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-3 mb-3">Gestores</h1>

        <div class="divForm mb-5 container">
            <form method="post" action="#">
                <div class="row">
                    <div class="col mb-2">
                        <label for="exampleInputEmail1" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome">
                    </div>
                    <div class="col mb-2">
                        <label for="exampleInputPassword1" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label for="exampleInputPassword1" class="form-label">Sexo</label>
                        <input type="text" class="form-control" id="sexo" name="sexo">
                    </div>
                    <div class="col mb-2">
                        <label for="exampleInputPassword1" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone">
                    </div>
                </div>

                <button class="btn btn-primary" onclick=<?php CriarGestor($conn) ?>>Cadastrar</button>
            </form>
        </div>

        <div class=" container">
            <table class="table table-striped display" id="listar" style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nome</th>
                        <th>sexo</th>
                        <th>telefone</th>
                        <th>ações</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Gestor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="#">
                        <div class="row">
                            <div class="col mb-2">
                                <label for="exampleInputEmail1" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>
                            <div class="col mb-2">
                                <label for="exampleInputPassword1" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label for="exampleInputPassword1" class="form-label">Sexo</label>
                                <input type="text" class="form-control" id="sexo" name="sexo">
                            </div>
                            <div class="col mb-2">
                                <label for="exampleInputPassword1" class="form-label">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone">
                            </div>
                        </div>

                        <button class="btn btn-primary" onclick=<?php CriarGestor($conn) ?>>Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const myModal = document.getElementById('modal-dialog')
        const btnEdit = document.getElementById('btnEdit')

        myModal.addEventListener('shown.bs.modal', () => {
            btnEdit.focus()
        })
    </script>

    <script>
        $document.ready(function(){
            $('#listar').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "listar.php"
            })
        });
    </script>
</body>
</html>