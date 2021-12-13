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

      // verifica se o ID vindo do formulário está vazio ou não.
      if(!empty($_GET['id'])){

      //recupera o id do formulário anterior.
       $id = $_GET['id'];

       //cria a conexão com o banco.
        $conexao = mysqli_connect('localhost', 'root', '12345', 'controle_atividades');

        //query para selecionar atividades por ID.
        $sql = "SELECT * FROM atividades WHERE id = '$id'";

        //faz a conexao do banco com a query.
        $result = $conexao->query($sql);

        //se a query retornar > 0, alguma linha foi selecionada.
        if($result->num_rows >0){

          //busca a linha do resultado com uma matriz associativa e coloca os dados dentro das variáveis respectivas.
            while($user_data = mysqli_fetch_assoc($result)){

                $titulo = $user_data['titulo'];
                $descricao = $user_data['descricao'];
                $tipo = $user_data['tipo'];
                $listagem = $user_data['listagem'];
                $id = $user_data['id'];


            }

          //se nenhuma linha for selecionada ele retorna para a listagem de atividades abertas pois não existe a atividade.
        }else{
            header("Location:listar_atv_abertas.php");
        }

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
    <title>Controle de atividades - edição</title>

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

  <nav>

      <a  href="listar_atv_abertas.php">	<img class="logo" src="vm.png" alt="Logo do Grupo"></a>

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


<main>

    <div>

      <div><h2 style="padding-bottom:30px;">Edição da atividade "<?php echo $titulo;  ?>"</h2></div> <!--recupera o nome da atividade para mostrar no topo do main-->


      <!--formulário que recebe os dados da atividade que clicada para ser editada-->
        <form name="form_update_atividades_abertas" action="update_atividades_aberta.php" method="POST">

             <div class="form-row">

                 <div class="form-group col-md-6">

                    <label for="titulo_update"><b>Título da atividade</b></label>
                    <input name="titulo" id="titulo_update" autocomplete="off" type="text" class="form-control" value="<?php echo $titulo; /*preenche o campo com o título 
                    já existente da atividade*/?>"  placeholder="Ex.: Um título qualquer">
                 </div>

                <div class="form-group col-md-6">


                     <label for="inputTipo_atividade"><b>Tipo de atividade</b></label>
   
                           <select name="tipo_atividade" class="form-control">
                              <option selected><?php
                              
                              //preenche o campo com o tipo já existente da atividade e converte o tipo do banco para melhor visualização do usuário.

                              if($tipo == "1"){
                                echo("Desenvolvimento");
                            }elseif($tipo == "2"){ 
                                echo ("Atendimento"); 
                            } elseif($tipo == "3"){ 
                                echo ("Manutenção"); 
                            } elseif($tipo == "4"){ 
                                echo ("Manutenção Urgente");
                            } else{ 
                                echo ("inválido"); 
                            } 
                              
                           

                              ?></option>
                              <option value="1">Desenvolvimento</option>
                              <option value="2">Atendimento</option>
                              <option value="3">Manutenção</option>
                              <option value="4">Manutenção Urgente</option>
                           </select>
       
    

                </div>

             </div>


              <div class="mb-4">
                        <label for="descricao_update" class="form-label"><b>Descrição da atividade</b></label>
                        <textarea type="input" id="descricao_update" class="form-control" name="descricao" rows="4"><?php echo $descricao; 
                        // preenche o textarea com as informações já disponíveis do campo no banco. OBS: precisa ser feito fora da tag, não aceita no value. 
                        ?></textarea>
              </div>


        <div class="form-row">
            <div class="form-group col-md-6">

                        <label for="inputListagem"><b>Listagem</b></label>

                            <select name="listagem" class="form-control">
                            <option selected><?php
                              
                               //preenche o campo com a listagem já existente da atividade e converte a listagem do banco para melhor visualização do usuário.

                              if($listagem == "1"){
                                echo("Atividade aberta");
                            }else{
                              echo ("Atividade concluída"); 
                            }
                              ?></option>
                              
                             
                              <option value="0">Atividade concluída</option>
                            </select>



            </div>
            <div class="form-group col-md-3">

              <input type="submit" onclick="return validacao()" style="margin-top:31px; margin-left:10px;" class="btn btn-primary" value="Editar">

            </div>
                    <!-- campo do id "hidden" que recebe o id para enviar no formulário e o usuário não alterar -->
            <input name="id" autocomplete="off"  type="hidden" class="form-control" value="<?php echo $id;  ?>">

            
        </div>    

      
                  
      </form>


        <!-- formulário que recebe os dados da atividade e deleta. -->
      <form  name="form_delete_atividades" action="delete_atividades_abertas.php" method="POST">
            <div class="form-group col-md-3">

          <?php
              // Se o tipo for = 4 (manutenção urgente) ele não pode ser deletado, então o botão de deletar é desabilitado. Caso não, o botão fica habilitado.
              if($tipo == 4){
                  echo '<input type="submit" disabled style=" margin-top: -98px; margin-left:400px;"  class="btn btn-danger"  value="Deletar">';
              }else{
                  echo '<input type="submit" style=" margin-top: -98px; margin-left:400px;"  class="btn btn-danger"  value="Deletar">';
              }


          ?>

            </div>
        
            
            <!-- campo do id "hidden" que recebe o id para enviar no formulário e o usuário não alterar -->
            <input name="id" autocomplete="off" type="hidden" class="form-control" value="<?php echo $id;  ?>"  >
            </form>

    </div>

  
</main>
        


<script>

  function validacao(){

    var titulo_update = form_update_atividades_abertas.titulo_update.value;
    var descricao_update = form_update_atividades_abertas.descricao_update.value;

    if(titulo_update == ""){
      alert('Preencha o campo Título');
      form_update_atividades_abertas.titulo_update.focus();
      return false;
    }
    if(descricao_update == ""){
      alert('Preencha o campo descrição');
      form_update_atividades_abertas.descricao_update.focus();
      return false;
    }
  }

</script>


<!-- bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>