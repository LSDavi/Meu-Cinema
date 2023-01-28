
<?php
   include_once("../banco/conexao.php");
   $conectar = getConnection();
?>

<?php
  //cria consulta SQL
  //$listagem = "SELECT * FROM relatorio order by created";

  $lista_generos = "SELECT id_genero, genero FROM genero ORDER BY genero";
  $listando_generos = $conectar->prepare($lista_generos);
  $listando_generos->execute();

  if (!$listando_generos) {
    die("Erro na Listagem de Gêneros Cinematográficos.");
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

    #tituloGenero{
      margin-left: 30px;
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

<button onclick="document.location='tela_cadastro.php'">HTML Tutorial</button>

<br><br><br><br>

<div id='tituloGenero'>
<?php  
  while ( $g = $listando_generos->fetch(PDO::FETCH_ASSOC) ) {
    echo "<br><h3>".$g['genero']."</h3>";
?>    
</div>

  <?php

  // LISTAGEM DE FILMES
    $listagem = "SELECT f.id_filme , f.filme, f.descricao, f.id_genero, g.genero, g.pasta ";
    $listagem .= "FROM filme f INNER JOIN genero g on f.id_genero=g.id_genero ";
    if ( isset($_GET["buscar"]) ) {
        $procurar = $_GET["buscar"];
        $listagem .= "WHERE filme LIKE '%{$procurar}%'";
    }

  $consulta = $conectar->prepare ($listagem);
  $consulta->execute();

  if (!$consulta) {
    die("Erro no Banco");
  }


    while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
      if ($linha['id_genero'] == $g['id_genero']) {
        //echo $linha['id_genero']."<br>".$linha['filme'];
?>
 

<div class="listagem">
  <div class="listando" style="width: 340px;"> 

      <video controls width='300px' height='200px'> 
          <source src="<?php echo $linha['pasta'].$linha['filme']; ?>" type="video/mp4"> 
      </video>
      <br>
      <?php echo $linha['filme']; ?>
      <!--
        <a href="detalhe.php?id=<?php echo $linha['id_filme'] ?>">
            <img src="../img/play_red.png" style="width: 30px;">
        </a>
       
        <a type="button" onclick="window.print()" name="btn_imprimir">
            <img src="../img/imprimir.png" style="width: 30px;">
        </a>
      -->
</div>
</div>

    <?php
      }
    ?>


<?php
  
  }
?> 
  <!-- Botão Remover -->
  <!-- Botão Editar-->
  <!-- Relatório -->




<br><br><br><br><br><br><br><br><br><br><br><br>

<?php    
  }
?>




</body>


</html>