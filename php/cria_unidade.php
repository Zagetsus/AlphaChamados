<?php 
require_once "conexao.php";

	//echo $_POST["unidade"];

if(empty($_POST["unidade"])){
	echo "Preencha o campo";
}else {
		//echo "foi1";

	$unidade = $_POST["unidade"];

	$query5 = "INSERT INTO Unidades(nome_unidade) VALUES('$unidade')";

	$insert = mysqli_query($conexao,$query5);

	if ($insert == 0) {
		echo "<script> alert('Deu ruim');</script>";
	}

	if ($insert == 1) {
            //echo "<script> alert('unidade inserida com Sucesso!');</script>";
            //header('location: ../gerenciarusuarios.php');
		echo "foi1";
	}
}



?>