


<?php
  include '../banco/conexao.php';
  $conectar = getConnection();
?>

<?php
function data($data){
    return date("d/m/Y",strtotime($data));
    // Y = Ano inteiro (ex: 2020)
    // y = Ano pelo metade (ex: 20) 
}

date_default_timezone_set('America/Sao_Paulo');
    setlocale(LC_TIME, "pt_BR");
            
    $agora = getdate();

    $a = $agora["year"];
    $m = $agora["mon"];//utf8_encode(strftime("%B"));
    $d = $agora["mday"];

/* AQUI SE REALIZA O CADASTRO */    
if ($_POST['enviar']) {

    //Receber os dados do formulário
    $nomeFilme = $_FILES['enviar_filme']['name'];
    // $endereco = $_POST['endereco'];     
    $genero = $_POST['genero']; 
    $sinopse = $_POST['sinopse']; 
    $dataRegistro = $d . "/" . $m . "/" . $a;


    //Inserir no BD
    $sql = "INSERT INTO filme (id_genero,filme, descricao, data_registro) VALUES (:id_genero,:filme, :descricao, :data_registro)";

    $consulta = $conectar->prepare($sql);
    $consulta->bindParam(':filme', $nomeFilme);
    $consulta->bindParam(':id_genero', $genero);
    $consulta->bindParam(':descricao', $sinopse);
    $consulta->bindParam(':data_registro', $dataRegistro);  

    //Verificar se os dados foram inseridos com sucesso
    if ($consulta->execute()) {
        header("Location: ../view/principal.php");               
    } else {
        header("Location: ../view/principal.php");
    }

}

?>
