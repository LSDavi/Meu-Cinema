

<?php
   include_once("../banco/conexao.php");
   $conectar = getConnection();
?>

<?php
  // pega o ID da URL
  $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
?>

<?php
  //cria consulta SQL
  $listagem = "SELECT f.id_filme , f.filme, f.descricao, g.genero, g.pasta FROM filme f INNER JOIN genero g on f.id_genero=g.id_genero WHERE id_filme = $id";

  $consulta = $conectar->prepare ($listagem);
  $consulta->execute();

  if (!$consulta) {
    die("Erro no Banco");
  }

  $linha = $consulta->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<title> Detalhe </title>

	<!-- Chamar arquivo externo css	-->
	<link rel="stylesheet" type="text/css" href="../css/listagem.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<style> /*
	video{
		width: 900px;
		height: 900px;
	} */	
</style>

</head>





<body>


<div class="listando">  
<br><br><br>


<div style="margin-left: 50px;margin-right: -200px;">
       <?php 
          echo "<b> ID: </b> <i>" .  $linha["id_filme"] . "</i> <br> <b>" . $linha["filme"] . "</b> <br> <b>Gênero: </b>" . $linha["genero"]; 
       ?>

    <br>

    <?php
      echo "<b>Sinopse:  </b>" .$linha["descricao"];
    ?>
</div>    

    <center>
      <br><br>
	    <video controls width='1510px' height='850px' style="border: 1px solid black; margin-left: 50px;"> 
	          <source src="<?php echo $linha['pasta'].$linha['filme']; ?>" type="video/mp4"> 
	    </video>

      <p> <br> <a href="principal.php" class="btn btn-primary">VOLTAR</a> </p>

      <br><br><br><br>
    </center>
    


</div> <!-- FIM da class Listando -->



</body>





</html>