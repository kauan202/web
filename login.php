<?php
    session_start();
    include 'conecta.php';
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $logar = mysqli_query($conn, "SELECT * FROM prof WHERE email='$email' AND senha='$senha'");
    if (mysqli_num_rows($logar) > 0) {
        $dados = mysqli_fetch_array($logar);
        $_SESSION["user"] = $dados["nome"];
        $_SESSION["idprof"] = $dados["id"];
        echo "<script>window.location.replace('professor.php');</script>";
    }
    else{
        echo "<script>alert('Login ou senha incorretos!Tente novamente!');</script>";
        echo "<script>window.location.replace('index.php');</script>";
    }
    mysqli_close($conn);