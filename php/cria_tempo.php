<?php 

require_once "conexao.php";


$nome_tempo = $_POST["tempo_solucao"];
$segundos = $_POST["tempo_segundo"];

$query = "INSERT INTO tempo_solucoes( tempo_solucao, tempo_numero) VALUES ('$nome_tempo', '$segundos')";
$tempo = mysqli_query($conexao,$query);


if ($tempo == 0) {
	echo "<script> alert('Deu ruim');</script>";
}

if ($tempo == 1) {
	echo "<script> location.href= '../gerenciaRusuarios.php'; </script>";
}



?>