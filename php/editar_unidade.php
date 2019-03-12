<?php
	require_once "conexao.php";
	$nomeu=$_POST["nomeu"];
	$id=$_POST["id"];
	
	$query="UPDATE Unidades SET nome_unidade = '$nomeu' WHERE id_unidade = $id;";
	$atualiza=mysqli_query($conexao,$query);

	if($atualiza==1){
		echo "<script>alert('Atualizado com sucesso!'); location.href='../gerenciarusuarios.php'</script>";
	}else{
		echo "<script>alert('DEU RUIMMMM').href='../gerenciarusuarios.php';";
	}
?>