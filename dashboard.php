<?php 
// inicia a sessao na pagina e é preciso ter em todas as outras para continuar na mesma sessao
 session_start();
      if (!isset($_SESSION['UsuarioLog'])){
            header("Location: index.php");
            session_destroy();
      }

      if(isset($_GET['deslogar'])){
          session_destroy();
          header("Location: index.php");
      }

  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>
<body>
    <a href="?deslogar">Sair</a>
</body>
</html>