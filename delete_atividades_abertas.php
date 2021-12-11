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

      $id = $_POST['id'];

      $sql = "DELETE FROM atividades WHERE id = '$id'";
      
      $result_delete = mysqli_query($conexao, $sql);
      $linha = mysqli_affected_rows($conexao);
      
      if($linha == 1){
        
        header("Location:listar_atv_abertas.php");
         
        
      }else{
      
        header("Location:update_atv_aberta.php");
       
      
      }


      ?>