<?php 
/* inicia a sessão na pagina. caso o usuário já esteja logado impede que ele volte para pagina de login*/

 session_start();
      if (isset($_SESSION['UsuarioLog'])){
            header("Location: cadastro_atividades.php");
            die();
      }
  ?>

  <!DOCTYPE html>
  <html lang="pt-br">

      <!-- Cabeçalho da página -->
  <head>

      <!-- link para o boostrap -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            
      <!-- link para o css -->
            <link rel="stylesheet" href="estilo.css" type="text/css">

      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Controle de atividades - Login</title>
  </head>
  <body>

 
    

                   
<main>
            <h1 class="titulo">A revolução criada no agronegócio</h1>

            <p class="descricao">Grupo Via Máquinas, 10 anos no campo da evolução.</p>


   </main>
            <div class="container">
  
                        <div class="logo_vm">
                                <img src="vm.png" alt="Logo do Grupo">
                        </div>       

         <!-- Formulário para envio de informações de login(CPF) e senha -->
        <form class="form" name="form_entrada" action="entrada_sistema.php" method="POST">

        <div class="pad">
                  <input name="cpf_entrada" for="cpf_index" id="cpf_index" type="text" class="form-control mb-2 mr-sm-2 bord" placeholder="Digite seu CPF:">
        </div>

            <div class="input-group mb-2 pad">
                    <input name="senha_entrada" for="senha_index" id="senha_index" autocomplete="off" type="password" class="form-control bord" placeholder="Digite sua senha:">
            </div>
                
                 
                  <input type="submit" onclick="return validar_index()" class="btn botao" value="Acessar">
               
        </form>
<!--  Link para cadastro de novos usuários  -->
        <a href="cadastro_user.php" class="a">Não é cadastrado? Clique aqui!</a>

  </div>
                               
                       

 

<script>
      function validar_index(){

            var cpf_index = form_entrada.cpf_index.value;
            var senha_index = form_entrada.senha_index.value;

            if(cpf_index == ""){
                  alert('Preencha o campo CPF.');
                  form_entrada.cpf_index.focus();
                  return false;
            }
            if(senha_index == ""){
                  alert('Preencha o campo Senha.');
                  form_entrada.senha_index.focus();
                  return false;
            }

      }

</script>





        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
  </html>