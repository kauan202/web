<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $sql2 = "SELECT * FROM atividades WHERE id_turma=$id";
    $result = $conn->query($sql2);
    if ($result->num_rows > 0){
        echo " <script language='javascript' type='text/javascript'>
        alert('Esta turma tem atividade!');
        window.location.href='professor.php';
        </script>";
    }
    else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Não foi possivel excluir!');
        window.location.href='professor.php';
        </script>";
    }
    else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Não foi possivel inserir resgistro!');
        window.location.href='professor.php';
        </script>";
        
    }
    mysqli_close($conn);
?>