<?php 


/* inicia a sessão na pagina. caso o usuário não esteja logado retorna ele para pagina de index.php.*/
    session_start();
      if (!isset($_SESSION['UsuarioLog'])){
            header("Location: index.php");
            session_destroy();
      }

      //cria a conexão com o banco
      $conexao = mysqli_connect('localhost', 'root', '12345', 'controle_atividades');

      //variável que guarda o id enviado pelo formulário.
      $id = $_POST['id'];
      
      //cria a query de deletar pelo ID
        $sql = "DELETE FROM atividades WHERE id = '$id'";
      
        $result_delete = mysqli_query($conexao, $sql);
        $linha = mysqli_affected_rows($conexao);
        
        //se alguma linha do banco for afetada, deletou do banco e encaminha para as listas abertas.
        if($linha == 1){
          
          header("Location:listar_atv_abertas.php");
           
          //caso não seja deletado por algum motivo encaminha para a pág de listas abertas
        }else{
        
          echo '<script type="text/javascript"> alert("Não foi deletado.");</script>';
          echo'<script type="text/javascript">window.location = "listar_atv_abertas.php"</script>';
        
        }
      

 


      ?>