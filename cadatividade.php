<?php
    include ' conecta.php';
    $turma = $_GET['id'];
    $idprof = $_GET['idprof'];
    $atividade = $_POST['atividade'];
    $sql = "INSERT INTO atividade(id_turma,id_prof,atividade) VALUES ('$turma', $idprof,'$atividade')";
    if (mysqli_query($conn, $sql)){
        echo "<script language='javascript' type='text/javascript'>
        window.location.href='visualizar.php?id=$turma';
        </script>";
    }
    else {
        echo " <script language='javascript' type='text/javascript'>
        alert('Não foi possivel inserir este resgistro!');
        window.location.href='visualizar.php?id=$turma';
        </script>"
    }
    mysqli_close($conn);
?>