
<?php
	include_once '../banco/conexao.php';
  	$conectar = getConnection();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Cadastro </title>
	<meta charset="utf-8">
	
	<!-- Chamar arquivo externo css	-->
	<link rel="stylesheet" type="text/css" href="">

</head>


<body>

<form action="../model/cadastro.php" method="post" enctype="multipart/form-data">

	<p>
	<label>Arquivo </label>
	<input type="file" name="enviar_filme">
	</p>

	<!--
		<p>
		<label>Pasta </label>
		<input type="text" name="endereco" placeholder="../PASTA/">
		</p>
	-->

	<p>
		<label>Gênero </label>
		<select name="genero" class="form-control form-control-sm" required>
		        <option value="">Selecione o gênero do filme</option>

		        <?php
			        $sql = $conectar->query("SELECT * FROM genero ORDER BY genero ASC");
			        $listagem = $sql->fetchAll(PDO::FETCH_ASSOC);

			        foreach($listagem as $exibir) {
		        ?>

		        <option value="<?php echo $exibir['id_genero']?>">
		        	<?php 
		        		echo $exibir['genero'];
		        		//echo utf8_encode($exibir['curso']);
		        	?>
		        </option>

		        <?php
		        	} // Fecha o FOREACH.
		        ?>

		    </select>
	</p>
	<p>
	<label>Sinopse </label>
    <textarea name="sinopse" rows="6" cols="35" class="form-control" placeholder=" Coloque aqui a sinopse do filme."></textarea>

<p>
	<input type="submit" name="enviar" value="SALVAR FILME">
	<input type="reset" name="limpar" value="LIMPAR">
</p>

</form>


</body>


</html>




