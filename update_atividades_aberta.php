<?php 

/* inicia a sessão na pagina. caso o usuário não esteja logado retorna ele para pagina de index.php.*/
    session_start();
      if (!isset($_SESSION['UsuarioLog'])){
            header("Location: index.php");
            session_destroy();
      }
// Cria a conexao com o banco
      $conexao = mysqli_connect('localhost', 'root', '12345', 'controle_atividades');

// Variáveis recebem os dados enviados pelo formulário de edição
      $titulo = $_POST['titulo'];
      $tipo_atividade = $_POST['tipo_atividade'];
      $descricao = $_POST['descricao'];
      $listagem = $_POST['listagem'];
      $id = $_POST['id'];
 

// tratamento de conversão de dado enviado para dado aceito no banco.
    if($listagem == "Atividade aberta"){
        $listagem = 1;
    }else{
        $listagem = 0;
    }


// tratamento de conversão de dado enviado para dado aceito no banco.
    if($tipo_atividade == "Desenvolvimento"){
        $tipo_atividade = '1';
    }elseif($tipo_atividade == "Atendimento"){
        $tipo_atividade = '2';
    }elseif($tipo_atividade == "Manutenção"){
        $tipo_atividade = '3';
    }elseif($tipo_atividade == "Manutenção Urgente"){
        $tipo_atividade = '4';
    }


    date_default_timezone_set('America/Sao_Paulo'); //seta o horário com o de São Paulo.
    $agora = new DateTime(); // Pega o momento atual

if(($tipo_atividade == 4) and date('N H:i') >'5 13:00'){
    echo '<script type="text/javascript"> alert("Não pode criar manutenção urgente essa hora.");</script>';
    echo'<script type="text/javascript">window.location = "listar_atv_abertas.php"</script>';
}

    //Função que vê o tamanho da string enviada na descrição
    $contString = strlen($descricao);

    //condição que verifica se a quantidade de caracteres na descrição é menor que 50 e se a listagem é igual a 0 (Atividade concluída)
if (($contString <= 50) and ($listagem == 0)) {
    
    /* caso a condição acima seja verdadeira e o tipo de atividade for 2 ou 4 (atendimento e manutenção urgente respectivamente) o sistema pede para
       que sejam inseridos mais caracteres na sua descrição e retorna para a página de listar as atividades abertas. */
        if($tipo_atividade == 2 or $tipo_atividade == 4){

            echo '<script type="text/javascript"> alert("Insira mais caracteres na descrição.");</script>';
            echo'<script type="text/javascript">window.location = "listar_atv_abertas.php"</script>';
        }else{

            $sql = "UPDATE atividades SET titulo = '$titulo', tipo = '$tipo_atividade', descricao = '$descricao', listagem = '$listagem' WHERE id = '$id'";
      
            $result_update_aberta = mysqli_query($conexao, $sql)  or (' Erro na query:' . $sql . ' ' . mysqli_error($conexao));
            $linha = mysqli_affected_rows($conexao);
        
             //se alguma linha do banco for afetada, a atualização ocorreu e encaminha para as listas abertas.
            if($linha == 1){
              
              header("Location:listar_atv_abertas.php");
               
            //caso não seja alterado por algum motivo, vai ser emitido o alerta justificando a não alteração e depois encaminha para a pág de listas abertas
            }else{
            
                echo '<script type="text/javascript"> alert("Dados incorretos ou iguais, repita o processo");</script>';
                echo'<script type="text/javascript">window.location = "listar_atv_abertas.php"</script>';
             
            
            }
        }

        
}else{
      //caso a condição seja falsa, a atividade será atualizada.
    $sql = "UPDATE atividades SET titulo = '$titulo', tipo = '$tipo_atividade', descricao = '$descricao', listagem = '$listagem' WHERE id = '$id'";
      
    $result_update_aberta = mysqli_query($conexao, $sql)  or (' Erro na query:' . $sql . ' ' . mysqli_error($conexao));
    $linha = mysqli_affected_rows($conexao);

     //se alguma linha do banco for afetada, a atualização ocorreu e encaminha para as listas abertas.
    if($linha == 1){
      
      header("Location:listar_atv_abertas.php");
       
    //caso não seja alterado por algum motivo, vai ser emitido o alerta justificando a não alteração e depois encaminha para a pág de listas abertas
    }else{
    
        echo '<script type="text/javascript"> alert("Dados incorretos ou iguais, repita o processo");</script>';
        echo'<script type="text/javascript">window.location = "listar_atv_abertas.php"</script>';
     
    
    }


}
 
      ?>