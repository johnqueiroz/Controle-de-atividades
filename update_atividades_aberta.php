<?php 
    session_start();
      if (!isset($_SESSION['UsuarioLog'])){
            header("Location: index.php");
            session_destroy();
      }

      if(isset($_GET['deslogar'])){
          session_destroy();
          header("Location: index.php");
      }



      $conexao = mysqli_connect('localhost', 'root', '12345', 'controle_atividades');

      $titulo = $_POST['titulo'];
      $tipo_atividade = $_POST['tipo_atividade'];
      $descricao = $_POST['descricao'];
      $listagem = $_POST['listagem'];
      $id = $_POST['id'];
 


    if($listagem == "Atividade aberta"){
        $listagem = 1;
    }else{
        $listagem = 0;
    }

    /*if($tipo_atividade == "Desenvolvimento"){
        $tipo_atividade = '1';
    }elseif($tipo_atividade == "Atendimento"){
        $tipo_atividade = '2';
    }elseif($tipo_atividade == "Manutenção"){
        $tipo_atividade = '3';
    }elseif($tipo_atividade == "Manutenção Urgente"){
        $tipo_atividade = '4';
    }

*/

        $sql = "UPDATE atividades SET titulo = '$titulo', tipo = '$tipo_atividade', descricao = '$descricao', listagem = '$listagem' WHERE id = '$id'";
      
        $result_update_aberta = mysqli_query($conexao, $sql)  or (' Erro na query:' . $sql . ' ' . mysqli_error($conexao));
        $linha = mysqli_affected_rows($conexao);
        
        if($linha == 1){
          
          header("Location:listar_atv_abertas.php");
           
          
        }else{
        
            echo '<script type="text/javascript"> alert("Dados incorretos ou iguais, repita o processo");</script>';
            echo'<script type="text/javascript">window.location = "listar_atv_abertas.php"</script>';
         
        
        }
  
    

    
    

      ?>