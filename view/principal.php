
<?php
   include_once("../banco/conexao.php");
   $conectar = getConnection();
?>

<?php
  //cria consulta SQL
  //$listagem = "SELECT * FROM relatorio order by created";

// Consulta ao banco de dados
  $listagem = "SELECT f.id_filme , f.filme, f.descricao, g.genero, g.pasta ";
  $listagem .= "FROM filme f INNER JOIN genero g on f.id_genero=g.id_genero ";
  if ( isset($_GET["buscar"]) ) {
      $procurar = $_GET["buscar"];
      $listagem .= "WHERE filme LIKE '%{$procurar}%' ";
  }/* elseif ( isset($_GET["data"])) {
      $procurar = $_GET["data"];
      $listagem .= "WHERE created = $procurar ";
  } */




  $consulta = $conectar->prepare ($listagem);
  $consulta->execute();

  if (!$consulta) {
    die("Erro no Banco");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title> Listagem de Filmes </title>

	<!-- Chamar arquivo externo css	-->
	<link rel="stylesheet" type="text/css" href="../css/listagem.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


  <style>
    
    #form_pesquisa{
       margin-left: 130px;
    }

    .form-control-plaintext{
      width: 600px;
    }

  </style>

</head>


<body>

<br><br><br>

<div id="form_pesquisa">
  <form action="principal.php" method="GET" >
  	<!-- Campo de Pesquisa -->
  	<input type="text" name="buscar" placeholder="Digite o nome de um filme" class="form-control-plaintext">
  	<input type="submit" name="botao_pesquisar" value="PESQUISAR" class="btn btn-primary">
  </form>
</div>

<br><br><br><br>

<?php
  while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
?>

<div class="listagem">
  <div class="listando" style="width: 350px; border: 1px solid black">  
    <br>
      

    <br> 
      <video controls width='300px' height='200px'> 
          <source src="<?php echo $linha['pasta'].$linha['filme']; ?>" type="video/mp4"> 
      </video>
    
    <p>    
      <b style="margin-right: -250px;">
       <?php echo $linha["filme"] ?>
      </b> 
    </p>

        <a href="detalhe.php?id=<?php echo $linha['id_filme'] ?>">
            <img src="../img/play_red.png" style="width: 30px;">
        </a>
    <!-- Botão Imprimir -->
        <a type="button" onclick="window.print()" name="btn_imprimir">
            <img src="../img/imprimir.png" style="width: 30px;">
        </a>
        

<!--    
    <a class="btn btn-link" href="../model/deletar.php?id=<?php echo $linha["id"]?>" role="button" name="deletar">
      <img class="botaoCancelar" src="../img/icon_cancelar.png">
    </a>

    <a class="btn btn-link" href="index_atualizar.php?id=<?php echo $linha["id"]?>" role="button" name="editar">
      <img class="botaoEditar" src="../img/icon_editar.png">
    </a>

    <a class="btn btn-link" href="gerar_pdf.php?id=<?php echo $linha["id"]?>" role="button" name="relatorio">
      <img class="botaoRelatorio" src="../img/icon_relatorio.png">
    </a> 
-->
  </div>     
</div>
<?php
  }
?> 
	<!-- Botão Remover -->
	<!-- Botão Editar-->
	<!-- Relatório -->


</body>


</html>