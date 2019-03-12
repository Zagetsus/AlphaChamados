<?php
	$relatorio = $_POST['relatorio'];
	
	if($relatorio == "chamado_por_setor"){
		header('location: ../relatorio/chamadoporsetor.php');
	}
	else if($relatorio == "quant_problema"){
		header('location: ../relatorio/quantidadexproblemas.php');
	}
	else if($relatorio == "tec_chamados"){
		header('location: ../relatorio/tecnicochamados.php');
	}
	else if($relatorio == "users_setor"){
		header('location: ../relatorio/usuarioxsetores.php');
	}
?>