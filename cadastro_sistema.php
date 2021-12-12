<?php

/* inicia a sessão na pagina. caso o usuário já esteja logado impede que ele venha para página de cadastro de usuários no banco de dados*/
session_start();

if (isset($_SESSION['UsuarioLog'])){
    header("Location: cadastro_atividades.php");
    die();
}

    //cria conexão com o banco de dados
    $conexao = mysqli_connect('localhost', 'root', '12345', 'controle_atividades');



    
    //variáveis que recebem os dados inseridos no formulário.
        $nome_cadastro = $_POST['nome_cadastro'];
        $senha_cadastro = $_POST['senha_cadastro'];
        $senha_confirmacao = $_POST['senha_confirmacao'];


        //confere se as senhas estão iguais, caso sim, criptografa, caso não retorna para a pág de cadastro
        if($senha_cadastro == $senha_confirmacao){

                $senha_segura = password_hash($senha_cadastro, PASSWORD_BCRYPT );

        }else{
            echo '<script type="text/javascript"> alert("Senha de confirmação errada, tente novamente");</script>';
            echo'<script type="text/javascript">window.location = "cadastro_user.php"</script>';
        }

//verifica se o cpf(primary key) já existe, caso sim, alerta ao usuário e retorna para pág de cadastro,
// caso não segue para inserir no banco de dados.

        if(isset($_POST['cpf_cadastro'])){
            $cpf_cadastro = $_POST['cpf_cadastro'];

            $sql_cad = "SELECT * FROM login WHERE cpf = '$cpf_cadastro'";
    
                 $check_cadastro = mysqli_query($conexao, $sql_cad) or (' Erro na query:' . $sql_cad . ' ' . mysqli_error($conexao));
                    $linha_check = mysqli_affected_rows($conexao);

            if($linha_check == 1){
                    echo '<script type="text/javascript"> alert("Usuário ja cadastrado.");</script>';
                    echo'<script type="text/javascript">window.location = "cadastro_user.php"</script>';
            }else{

                 $sql = "INSERT INTO login (nome, cpf, senha) VALUES ('$nome_cadastro','$cpf_cadastro', '$senha_segura')";
        
                    $result_cadastro = mysqli_query($conexao, $sql) or (' Erro na query:' . $sql . ' ' . mysqli_error($conexao));
                    $linha = mysqli_affected_rows($conexao);
            
            if($linha == 1){
                echo'<script type="text/javascript">window.location = "index.php"</script>';
            }else{
            
                echo '<script type="text/javascript"> alert("Dados incorretos, repita o processo");</script>';
                echo'<script type="text/javascript">window.location = "cadastro_user.php"</script>';
            
            }
        
        }

}




?>