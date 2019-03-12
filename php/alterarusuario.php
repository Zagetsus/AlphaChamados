<?php 

require_once "conexao.php";

if (empty($_POST["nome_usuario"]) || empty($_POST["login_usuario"]) || empty($_POST["e_mail"]) || empty($_POST["telefone"]) ) {
	echo "Preencha todos os campos";
} else {
	$nome = $_POST["nome_usuario"];
	$email = $_POST["e_mail"];
	$telefone = $_POST["telefone"];
	$id= $_POST["id"];


	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		if (!is_numeric($telefone)) {
			echo "<script> alert('Digite apenas numeros para o telefone'); location.href= '../alteraruser.php';</script>";
		}else{


			$query = "UPDATE usuarios SET nome='$nome',email='$email',telefone='$telefone' WHERE id_usuario='$id'";      

			$insert = mysqli_query($conexao,$query);

			if($insert==0){
				echo "N";
			}
			else{
				echo "<script> alert('Usuario alterado com sucesso!'); location.href= '../alteraruser.php'; </script>";
			}

		}
	}else {
		echo "<script> alert('Email Inválido'); location.href= '../alteraruser.php'; </script>";
	}
} 




?>