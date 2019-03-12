<?php 
	
	require_once "conexao.php";
	$id=$_POST["id"];
	
	$query = "DELETE FROM problemas WHERE id_problema = $id;";
	$deletar = mysqli_query($conexao,$query);
	if ($deletar == 1)
	{
		echo "<script>alert('DELETADO COM SUCESSO !'); location.href='../gerenciarusuarios.php';</script>";
	}

 ?>