<?php 
require_once "conexao.php";

	$id = $_POST["id"];

	$query = "UPDATE chamados SET situacao_chamado = 2 WHERE id_chamado=$id;";

	$finalizachamado = mysqli_query($conexao,$query);

	if ($finalizachamado == 0) {
		echo "<script> alert('Deu ruim');</script>";
	}

	if ($finalizachamado == 1) {
		echo "<script> alert('Chamado Finalizado com Sucesso'); location.href='../index.php'; </script>";


	}


 ?>