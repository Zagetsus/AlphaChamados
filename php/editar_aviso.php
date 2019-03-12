<?php 
require_once "conexao.php";
$id=$_POST["id"];
$aviso=$_POST["aviso"];
$descaviso=$_POST["desca"];



$query="UPDATE mural_avisos SET nome_aviso='$aviso', desc_aviso='$descaviso' WHERE id_aviso= $id;";
$atualiza=mysqli_query($conexao,$query);

if($atualiza==1){
	echo "<script>alert('Atualizado com sucesso!'); location.href='../gerenciarusuarios.php'</script>";
}else{
	echo "<script>alert('DEU RUIMMMM').href='../gerenciarusuarios.php';";
}



?>