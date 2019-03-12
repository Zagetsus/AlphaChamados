<?php 
require_once "conexao.php";
$id=$_POST["id"];
$unidade=$_POST["unidade"];
$nivel=$_POST["nivel"];


$query="UPDATE usuarios SET area = '$unidade', nivel = '$nivel' WHERE id_usuario = $id";
$atualiza=mysqli_query($conexao,$query);

if($atualiza==1){
	echo "<script>alert('Atualizado com sucesso!'); location.href='../gerenciarusuarios.php'</script>";
}else{
	echo "<script>alert('DEU RUIMMMM').href='../gerenciarusuarios.php';";
}

?>