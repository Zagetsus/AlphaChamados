<?php
	require_once "conexao.php";
	$id=$_POST["id"];
	$problema=$_POST["problema"];
	$descricao=$_POST["descricao"];
	$tempo_solucao=$_POST["tempo_solucao"];
	$prioridade=$_POST["prioridade"];
	
	$query="UPDATE problemas SET nome_problema='$problema', desc_problema='$descricao', tempo_solucao ='$tempo_solucao', prioridade = '$prioridade' WHERE id_problema='$id';";
	$atualiza=mysqli_query($conexao,$query);

	if($atualiza==1){
		echo "<script>alert('Atualizado com sucesso!'); location.href='../gerenciarusuarios.php'</script>";
	}else{
		echo "<script>alert('DEU RUIMMMM').href='../gerenciarusuarios.php';";
	}
?>