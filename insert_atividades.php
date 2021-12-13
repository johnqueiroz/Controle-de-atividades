<?php

/* inicia a sessão na página. Caso o usuário não esteja logado retorna ele para pagina de index.php.*/
session_start();

if (!isset($_SESSION['UsuarioLog'])){
    header("Location: index.php");
    die();
}

//Cria a conexão com o banco
$conexao = mysqli_connect('localhost', 'root', '12345', 'controle_atividades');

//variáveis que recebem os dados enviados pelo formulário.
    $titulo = $_POST['titulo'];
    $tipo_atividade = $_POST['tipo_atividade'];
    $descricao = $_POST['descricao'];
    $listagem = 1;


date_default_timezone_set('America/Sao_Paulo'); //seta o horário com o de São Paulo.
$agora = new DateTime(); // Pega o momento atual
//echo $agora->format('d/m/Y H:i'); // Exibe no formato desejado

//echo date('w');
//echo date('G');

/*caso o dia seja sábado = 6 ou domingo = 0 e o tipo de atividade for 4 = manutenção urgente, vai impedir de criar a manutenção
 nos fins de semana. Caso não esteja nessas condições, o sistema vai inserir a atividade no banco de dados.*/
if(date('N H:i') > '5 13:00') { 
    if($tipo_atividade == 4){

        echo '<script type="text/javascript"> alert("Não pode criar manutenção urgente nos fins de semana"); window.location = "cadastro_atividades.php"</script></script>';

    }else{

        $sql = "INSERT INTO atividades (titulo, tipo, descricao, listagem) VALUES ('$titulo','$tipo_atividade', '$descricao', '$listagem')";
    
        $cadastro_atividade = mysqli_query($conexao, $sql);
        $linha = mysqli_affected_rows($conexao);
        
        if($linha == 1){
            echo'<script type="text/javascript"> alert("Atividade criada!"); window.location = "cadastro_atividades.php"</script>';
        }else{
        
            echo '<script type="text/javascript"> alert("Dados incorretos, repita o processo") window.location = "cadastro_atividades.php"</script>;</script>';
         
        
        }

    

    }   
}else{

    $sql = "INSERT INTO atividades (titulo, tipo, descricao, listagem) VALUES ('$titulo','$tipo_atividade', '$descricao', '$listagem')";

    $cadastro_atividade = mysqli_query($conexao, $sql);
    $linha = mysqli_affected_rows($conexao);
    
    if($linha == 1){
        echo'<script type="text/javascript"> alert("Atividade criada!"); window.location = "cadastro_atividades.php"</script>';
    }else{
    
        echo '<script type="text/javascript"> alert("Dados incorretos, repita o processo") window.location = "cadastro_atividades.php"</script>;</script>';
     
    
    }



} 





?>