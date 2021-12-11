<?php

session_start();

$conexao = mysqli_connect('localhost', 'root', '12345', 'controle_atividades');


if(isset($_POST['cpf_entrada'])){

    $cpf_entrada = $_POST['cpf_entrada'];
    $senha_entrada = $_POST['senha_entrada'];

    $sql = "SELECT * FROM login WHERE cpf = '$cpf_entrada'";

    $resultado_entrada = mysqli_query($conexao, $sql);
                           
    $rows_user = mysqli_fetch_assoc($resultado_entrada);

    if(password_verify($senha_entrada, $rows_user['senha'])){
        $_SESSION['UsuarioLog'] = true;
        $_SESSION['nome'] = $rows_user['nome'];
        header("location:cadastro_atividades.php");
       
    }else{
        echo '<script type="text/javascript"> alert("CPF ou senha incorretos");</script>';
        header("Location:index.php ");
    }
}

?>