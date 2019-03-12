<?php 

require_once "conexao.php";


if(empty($_POST["aviso"]) || empty($_POST["descaviso"])){
	echo "Preencha o campo";
}else {


	$aviso = $_POST["aviso"];
	$avisodesc = $_POST["descaviso"];

	$query5 = "INSERT INTO mural_avisos (nome_aviso,desc_aviso) VALUES ('$aviso', '$avisodesc');";

	$insert = mysqli_query($conexao,$query5);

	if ($insert == 0) {
		echo "<script> alert('Deu ruim');</script>";
	}

	if ($insert == 1) {
		echo "foi";
 
	}
}






?>