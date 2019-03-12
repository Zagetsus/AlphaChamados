<?php 

require_once "conexao.php";
	$tempo=$_POST["tempo"];
	$tempo_numero=$_POST["tempo_numero"];
	$id=$_POST["id"];
	
	$query="UPDATE tempo_solucoes SET tempo_solucao='$tempo',tempo_numero='$tempo_numero' WHERE id_tempo_solucao=$id;";
	$atualiza=mysqli_query($conexao,$query);

	if($atualiza==1){
		echo "<script>alert('Atualizado com sucesso!'); location.href='../gerenciarusuarios.php'</script>";
	}else{
		echo "<script>alert('Tempo já Cadastrado').href='../gerenciarusuarios.php';";
	}


 ?>