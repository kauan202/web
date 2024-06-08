<?php
    include ' conecta.php';
    $idprof = $GET['id'];
    $turma = $_POST['turma'];
    $sql = "INSERT INTO turma(nome,id_prof) VALUES ('$turma', $idprof)";
    if (mysqli_query($conn, $sql)){
        echo "<script language='javascript' type='text/javascript'>
        window.location.href='professor.php';
        </script>";
    }
    else {
        echo " <script language='javascript' type='text/javascript'>
        alert('Não foi possivel inserir este resgistro!');
        window.location.href='professor.php';
        </script>"
    }
    mysqli_close($conn);
?>