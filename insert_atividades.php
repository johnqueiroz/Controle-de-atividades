<?php

// inicia a sessao na pagina e é preciso ter em todas as outras para continuar na mesma sessao
session_start();

if (!isset($_SESSION['UsuarioLog'])){
    header("Location: index.php");
    die();
}

$conexao = mysqli_connect('localhost', 'root', '12345', 'controle_atividades');

$titulo = $_POST['titulo'];
$tipo_atividade = $_POST['tipo_atividade'];
$descricao = $_POST['descricao'];
$listagem = 1;


date_default_timezone_set('America/Sao_Paulo');
$agora = new DateTime(); // Pega o momento atual
//echo $agora->format('d/m/Y H:i'); // Exibe no formato desejado

//echo date('w');
//echo date('G');



if(date('w') == 0 or date('w') == 6) { 
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
}





?>