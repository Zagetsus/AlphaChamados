<?php 

	require_once "conexao.php";
	$id=$_POST["id_tempo"];
	
	$query = "DELETE FROM tempo_solucoes WHERE id_tempo_solucao = $id;";
	$deletar = mysqli_query($conexao,$query);
	if ($deletar == 1)
	{
		echo "<script>alert('DELETADO COM SUCESSO !'); location.href='../gerenciarusuarios.php';</script>";
	}


?>