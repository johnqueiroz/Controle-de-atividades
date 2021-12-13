<?php 

/* inicia a sessão na pagina. caso o usuário não esteja logado retorna ele para pagina de index.php.*/
    session_start();
      if (!isset($_SESSION['UsuarioLog'])){
            header("Location: index.php");
            session_destroy();
      }
// caso receba o deslogar, o sistema vai desrtuir a sessão do usuário e retornar ele para o index.php.
      if(isset($_GET['deslogar'])){
          session_destroy();
          header("Location: index.php");
      }

  ?>


<!DOCTYPE html>
<html lang="pt-br">
    <!-- Cabeçalho da página -->

  <head>
    <!-- link para o boostrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- link para o css -->
        <link rel="stylesheet" href="estilo2.css" type="text/css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de atividades - Cadastro de atividades</title>

    <style>
  .dropdown {
	position: relative;

  }
  
  .dropdown-content {
	display: none;
	position: absolute;
	background-color: #f9f9f9;
	min-width: 80px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	padding: 12px;
	z-index: 1;
  }
  
  .dropdown:hover .dropdown-content {
	display: block;
  }

    </style>
</head>

<body>

<!--Nav onde vai estar o menu superior-->

  <nav>

	    <a  href="cadastro_atividades.php">	<img class="logo" src="vm.png" alt="Logo do Grupo"></a>

		    <ul>
		  	    <li style="color:azure;"><?php echo "Bem-vindo(a), " . $_SESSION['nome'] . '!'; ?></li> <!--recupera o nome do usuário para mostrar no menu-->
		  	    <li><a style="color:azure; text-transform:capitalize;" href="cadastro_atividades.php">Cadastrar</a></li>
		  	    <li><div class="dropdown">
                <span style="color:azure;">Listar atividades</span>
                   <div class="dropdown-content">
                       <ul>
                          <li><a href="listar_atv_abertas.php">Abertas</a></li>
                          <li><a href="listar_atv_conclu.php">Concluídas</a></li>
                       </ul>
                  </div>
                </div></li>
		  	    <li><a style="color:azure; text-transform:capitalize;" href="?deslogar">Sair</a></li>
		    </ul>
    </nav>

<!-- Espaço onde será feito o formulário -->

<main>

    <div>

      <div><h2 style="padding-bottom:30px;">Cadastro de novas atividades</h2></div>
      
<!-- Formulário para criação de atividades. -->

        <form name="form_atividades" action="insert_atividades.php" method="POST">

             <div class="form-row">

                 <div class="form-group col-md-6">

                    <label for="inputTitulo"><b>Título da atividade</b></label>
                    <input name="titulo" autocomplete="off" type="text" class="form-control"  placeholder="Ex.: Um título qualquer">
                 </div>

                <div class="form-group col-md-6">


                     <label for="inputTipo_atividade"><b>Tipo de atividade</b></label>
   
                           <select name="tipo_atividade" class="form-control">
                              <option selected>Escolher</option>
                              <option value="1">Desenvolvimento</option>
                              <option value="2">Atendimento</option>
                              <option value="3">Manutenção</option>
                              <option value="4">Manutenção Urgente</option>
                           </select>
       
    

                </div>

             </div>


              <div class="mb-4">
                        <label for="descricao_atividade" class="form-label"><b>Descrição da atividade</b></label>
                        <textarea class="form-control" name="descricao" rows="4"></textarea>
              </div>
                    <input type="submit" class="btn btn-primary" value="Enviar">
      </form>

    </div>

  
</main>
        



<!-- bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>