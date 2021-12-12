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
      $tipo = $_POST['tipo'];


      
      if($tipo == 4){

        echo '<script type="text/javascript"> alert("Tarefa de manutenção urgente não pode ser deletada.");</script>';
        echo'<script type="text/javascript">window.location = "listar_atv_abertas.php"</script>';
     
      }else{
        $sql = "DELETE FROM atividades WHERE id = '$id'";
      
        $result_delete = mysqli_query($conexao, $sql);
        $linha = mysqli_affected_rows($conexao);
        
        if($linha == 1){
          
          header("Location:listar_atv_abertas.php");
           
          
        }else{
        
          header("Location:update_atv_aberta.php");
         
        
        }
      }

 


      ?>