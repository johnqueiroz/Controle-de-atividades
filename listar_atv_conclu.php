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

		 <!-- script que traz o link para mostrar o símbolo do lápis no coluna de "Editar" -->
        <script src="https://kit.fontawesome.com/e42d0736e1.js" crossorigin="anonymous"></script>

        <!-- link para o boostrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

         <!-- link para o css -->
        <link rel="stylesheet" href="estilo2.css" type="text/css">

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Controle de atividades concluídas</title>

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

  body{
      background-image: none;
  }
.titulo_lista_aberta{
    text-align: center;
    margin-left: 0%;
    margin-bottom: 40px;
    margin-top: 30px;
}
        </style>
    </head>

<body>

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







    <?php
        // cria a conexão com o banco e seleciona as atividades as atividades abertas
            $conexao = mysqli_connect('localhost', 'root', '12345', 'controle_atividades');
                    $sql = "SELECT * FROM atividades WHERE listagem = '0'";
                        $atividade_conc = mysqli_query($conexao, $sql);

?>


            <div class=titulo_lista_aberta><h2>Atividades concluídas</h2></div>

            <div class="container theme-showcase" role="main">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <thead>
                                        <tr><!-- tabela das atividades abertas -->
                                            <th style= 'text-align: center' >Título</th>
                                            <th style= 'text-align: center'>Descrição</th>
                                            <th  style= 'text-align: center'>Ultimo tipo</th>
                                            <th  style= 'text-align: center'>Listagem</th>
                                            <th style= 'text-align: center'>ID</th>
                                            <th style= 'text-align: center'>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
            <?php while($rows_atv_conc = mysqli_fetch_assoc($atividade_conc)){ ?> <!-- laço de repetição para mostrar todas as atividades
            com seus respectivos valores -->
                                        <tr>
                                            <td align=center><?php echo $rows_atv_conc['titulo'];?></td>
                                            <td align=center><?php echo $rows_atv_conc['descricao'];?></td>
                                            <td align=center><?php $tipo = $rows_atv_conc['tipo']; 
                    
                       //convertendo o valor trazido pelo banco para os nomes dos tipos
                                                if($tipo == "1"){
                                                    echo("Desenvolvimento");
                                                }elseif($tipo == "2"){ 
                                                    echo ("Atendimento"); 
                                                } elseif($tipo == "3"){ 
                                                    echo ("Manutenção"); 
                                                } elseif($tipo == "4"){ 
                                                    echo ("Manutenção Urgente"); 
                                                } else{ 
                                                    echo ("Con"); 
                                                } 
                                                
                                                ?> 
                                            </td>
                                            <td align=center><?php $listagem = $rows_atv_conc['listagem'];

                                                //convertendo o valor trazido pelo banco para os nomes das listagens e imagem no caso de listagem = 0 (concluída);
                                                if($listagem == "0"){
                                                    echo"<img src='checked.png' width='30' height='30'>";
                                                }else{ echo "Atividade Aberta"; 
                                                
                                                } ?>
                                                
                                                </a></td>
                                                <td align=center><?php echo $rows_atv_conc['id']; ?></td>
                                            

                                                <!-- quando clicado nesse botão, ele envia pela URL o id do item selecionado
                                                para edição e na outra pág é possível fazer um select para todas as outras informações da atividade -->
                                                <td align="center"><a class="btn btn-outline-dark" href="editaAtividade.php?id=<?php echo $rows_atv_conc['id']; ?>"><i class="fas fa-edit"></i></a></td>  <!--recupera as informações na funcao-->
                                        </tr>
            <?php  } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>		

            </div>

<!-- bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>