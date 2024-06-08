<?php
    session_start();
    $user = $_SESSION["user"];
    $idprof = $_SESSION["idprof"];
    if (!isset($user)){
        echo "<script language='javascript' type='text/javascript'>
        window.location.href='index.php';
        </script>";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SENAI - Professor</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .botao {
            text-align: right;
            margin-right: 250px;
        }

        .titulo {
            margin-left: 400px;
        }
    </style>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="scripts/bootstrap5/js/bootstrap.min.js"></script>
    <div class="row" style="background-color: #0000FF">
        <div class="col">
            <?php
                echo "&nbsp;&nbsp;&nbsp;&nbsp;<font color='white'><b>".$user."</b></font>";

            ?>
    </div>
    <div class="col text-end">
        <?php
            echo "<a href='sair.php'><font color='white'><b>SAIR</b></font></a>&nbsp;&nbsp;&nbsp;&nbsp;";

        ?>
    <br />
    <br />
    <br />
    <br />
    <div class="botao">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar turma</button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Turma</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <form name="turma" action="cadturma.php?id=<?php echo $idprof; ?>" method="post">
                        <input class="form-control" type="text" name="turma" required placeholder="Digite o nome da turma"/>
                        <br/>
                        <input type="submit" class="w-100 btn btn-lg btn-primary" value="CADASTRAR"/>   

                    </form
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <br />
    <br />
    <label class="titulo">
        <h4>Turmas</h4>
    </label>
    <br />
    <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Número</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include 'conecta.php';
                                $pesquisa = mysqli_query($conn, "SELECT * FROM turma WHERE id_prof=$idprof");
                                $row = mysqli_num_rows($pesquisa);
                                if ($row > 0){
                                    while ($registro = $pesquisa -> fetch_array()){
                                        $id = $registro['id'];
                                        echo '<td>';
                                        echo '<td>'.$registro['id'].'</td>';
                                        echo '<td>'.$registro['nome'].'</td>';
                                        echo '<td><a href="excluir.php?id='.$sid. '"class="btn-danger">Excluir</a>&nbsp;&nbsp;<a href="visualizar.php?id='.$id.'" class=btn btn-sucess">Visualizar</a></td>';
                                        echo '<td/>';
                                    }
                                    echo '</tbody>';
                                    echo '</table>';
                                }
                                else {
                                    echo "Não há turmas cadastradas!";
                                    echo '</tbody>';
                                    echo '</table>';
                                }


                            
                            ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>