<?php 

/* inicia a sessão na pagina. caso o usuário já esteja logado impede que ele volte para pagina de cadastro de atividades*/

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
      <title>Controle de atividades - Cadastro</title>
  </head>
<body>

                   
      <main>
            <h3 class="titulo">Sistema de controle de atividade.</h3>

                  <p class="descricao"> Para ter mais controle nas tarefas no seu trabalho!</p>


      </main>

      <!--  Container onde vão estar os campos do formulário  -->
      <div class="container">
  
        <div class="logo_vm">
            <img src="vm.png" alt="Logo do Grupo">
        </div>       

         <!-- Formulário para envio de informações do cadastro de usuário -->
        <form class="form" name="form_cadastro" action="cadastro_sistema.php" method="POST">

        <div class="pad">
                  <input name="nome_cadastro" for="nome" id="nome" type="text" class="form-control mb-2 mr-sm-2 bord" placeholder="Digite seu nome:">
        </div>

        <div class="pad">
                  <input name="cpf_cadastro" for="cpf" id="cpf" type="number" class="form-control mb-2 mr-sm-2 bord" placeholder="Digite seu CPF:">
        </div>

        <div class="input-group mb-2 pad">
                    <input name="senha_cadastro"  for="senha" id="senha"autocomplete="off" type="password" class="form-control bord" placeholder="Digite sua senha:">
        </div>

        <div class="input-group mb-2 pad">
                    <input name="senha_confirmacao" for="senha_confirm" id="senha_confirm" autocomplete="off" type="password" class="form-control bord" placeholder="Confirme sua senha:">
        </div>
                
                 
                  <input type="submit" onclick="return validar()" class="btn botao" value="Cadastrar">
               
        </form>

<!--  Link para voltar a pág de login  -->

        <a href="index.php" class="a">Voltar para login!</a>

  </div>
                               
                       

 
<script>
      // Validações feitas em javascript para os forumários de cadastramento dos usuários.
      function validar(){
            var nome = form_cadastro.nome.value;
            var cpf = form_cadastro.cpf.value;
            var senha = form_cadastro.senha.value;
            var senha_confirm = form_cadastro.senha_confirm.value;

            if(nome == ""){
                  alert('Preencha o campo Nome.');
                  form_cadastro.nome.focus();
                  return false;
            }
            if(cpf == ""){
                  alert('Preencha o campo CPF.');
                  form_cadastro.cpf.focus();
                  return false;
            }
            if(senha == ""){
                  alert('Preencha o campo Senha.');
                  form_cadastro.senha.focus();
                  return false;
            }
            if(senha_confirm == ""){
                  alert('Preencha o campo Confirmação de senha.');
                  form_cadastro.senha_confirm.focus();
                  return false;
            }
      }


</script>






        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        </body>
  </html>