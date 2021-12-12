<?php

/* inicia a sessão na pagina.*/
session_start();

// faz a conexão com o banco de dados
$conexao = mysqli_connect('localhost', 'root', '12345', 'controle_atividades');

//verifica se o cpf existe e recupera os dados enviados pelo formulário da pág index.php
if(isset($_POST['cpf_entrada'])){

    $cpf_entrada = $_POST['cpf_entrada'];
    $senha_entrada = $_POST['senha_entrada'];

    $sql = "SELECT * FROM login WHERE cpf = '$cpf_entrada'";

    $resultado_entrada = mysqli_query($conexao, $sql);
                           
    $rows_user = mysqli_fetch_assoc($resultado_entrada);
// verifica a senha do formulário com a do banco de dados, caso seja verdade, redireciona para a pág de cadastro de atividades.
    if(password_verify($senha_entrada, $rows_user['senha'])){
        $_SESSION['UsuarioLog'] = true;
        $_SESSION['nome'] = $rows_user['nome'];
        header("location:cadastro_atividades.php");
// caso seja falso, emite um alerta falando sobre o erro e retorna para o index.php       
    }else{
        echo '<script type="text/javascript"> alert("CPF ou senha incorretos");</script>';
        echo '<script type="text/javascript"> window.location = "index.php";</script>';
    }
}

?>