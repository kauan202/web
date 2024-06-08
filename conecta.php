<?php
$conn = mysqli_connect("localhost","root","","professor");
mysqli_set_charset($conn,"utf8");
if (!$conn) {
    echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
    exit;
}
?> 