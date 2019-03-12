<?php 
	require_once "conexao.php";

	//echo $_POST["unidade"];

	if(empty($_POST["nome_problema"]) || empty($_POST["desc_problema"]) || empty($_POST["tempo"]) || empty($_POST["prioridade"])){
		echo "Preencha todos os campos";
	}else {
		

		$problema = $_POST["nome_problema"];
		$descproblema = $_POST["desc_problema"];
		$tempoproblema = $_POST["tempo"];
		$prioproblema = $_POST["prioridade"];


		$query5 = "INSERT INTO problemas(nome_problema,desc_problema,tempo_solucao,prioridade) VALUES ('$problema', '$descproblema', '$tempoproblema', '$prioproblema');
";

        $insert = mysqli_query($conexao,$query5);

        if ($insert == 0) {
            echo "<script> alert('Deu ruim');</script>";
        }

        if ($insert == 1) {
        	echo "<script> location.href= '../gerenciaRusuarios.php'; </script>";

            //echo "<script> alert('unidade inserida com Sucesso!');</script>";
            //header('location: ../gerenciarusuarios.php');
        }
	}



 ?>