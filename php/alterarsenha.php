<?php

require_once "conexao.php";


$id= $_POST["id"];
$senhaa= $_POST["senha_atual"];
$senhan= $_POST["senha_nova"];
$senhanc= $_POST["confirme_senha"];


if ($senhan != $senhanc) {
	echo "<script> alert('senhas não correspondem'); location.href= '../alteraruser.php';</script> ";
}else{


	$query="UPDATE usuarios SET senha = '$senhan' WHERE id_usuario = '$id'";

	$update = mysqli_query($conexao,$query);
	if ($update==1) {
		echo "<script> alert('Senha alterada com sucesso!'); location.href= '../alteraruser.php';</script>";
	}
}



?>