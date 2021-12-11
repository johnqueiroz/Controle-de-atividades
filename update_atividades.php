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



      if($tipo_atividade == "Desenvolvimento"){
        $tipo_atividade = 1;
    }elseif($tipo_atividade == "Atendimento"){ 
       $tipo_atividade = 2;
    } elseif($tipo_atividade == "Manutenção"){ 
       $tipo_atividade = 3;
    } elseif($tipo_atividade == "Manutenção Urgente"){ 
       $tipo_atividade  = 4; 
    } else{ 
        echo ("inválido"); 
    } 

    if($listagem == "Atividade concluída"){
        $listagem = 0;
    }else{
        $listagem = 1;
    }

      
    


      $sql = "UPDATE atividades SET titulo = '$titulo', tipo = '$tipo_atividade', descricao = '$descricao', listagem = '$listagem' WHERE id = '$id'";
      
      $result_update = mysqli_query($conexao, $sql);
      $linha = mysqli_affected_rows($conexao);
      
      if($linha == 1){
        
        header("Location:listar_atv_conclu.php");
         
        
      }else{
      
          echo '<script type="text/javascript"> alert("Dados incorretos, repita o processo");</script>';
       
      
      }


      ?>