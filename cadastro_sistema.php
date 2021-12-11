<?php

// inicia a sessao na pagina e é preciso ter em todas as outras para continuar na mesma sessao
session_start();

if (isset($_SESSION['UsuarioLog'])){
    header("Location: dashboard.php");
    die();
}


$conexao = mysqli_connect('localhost', 'root', '12345', 'controle_atividades');

$nome_cadastro = $_POST['nome_cadastro'];
$cpf_cadastro = $_POST['cpf_cadastro'];
$senha_cadastro = $_POST['senha_cadastro'];
$senha_confirmacao = $_POST['senha_confirmacao'];

if($senha_cadastro == $senha_confirmacao){

    $senha_segura = password_hash($senha_cadastro, PASSWORD_BCRYPT );

}

$verify = password_verify($senha_cadastro, $senha_segura);



$sql = "INSERT INTO login (nome, cpf, senha) VALUES ('$nome_cadastro','$cpf_cadastro', '$senha_segura')";

$result_cadastro = mysqli_query($conexao, $sql);
$linha = mysqli_affected_rows($conexao);

if($linha == 1){
    echo'<script type="text/javascript">window.location = "index.php"</script>';
}else{

    echo '<script type="text/javascript"> alert("Dados incorretos, repita o processo");</script>';
 

}

?>