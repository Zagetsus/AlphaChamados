<?php

require_once "conexao.php";
if (empty($_POST["usuario"]) || empty($_POST["senha"])) {

}else{

	$querychamados ="SELECT c.id_chamado as ID, u.nome_unidade as 'Unidade', p.nome_problema as 'Problema', c.desc_problema as 'Descrição', c.nome_contato as 'Contato', c.ramal as 'Ramal', c.data_abertura as 'Abertura', s.nome_situacao as 'Situação' from chamados c
  inner join unidades u on c.unidade = u.id_unidade 
  inner join situacoes s on c.situacao_chamado = s.id_situacao
  inner join problemas p on c.tipo_problema = p.id_problema ORDER BY Situação desc;";
  $titulo="Todos Chamados";

  $querycount = "SELECT * FROM Chamados";
  $sql = mysqli_query($conexao,$querycount);
  $total= mysqli_num_rows($sql);


  $login = $_POST["usuario"];
  $senha = $_POST["senha"];

  $query = "SELECT * FROM Usuarios WHERE login_usuario = '$login' or senha = '$senha'";
  $insert = mysqli_query($conexao, $query);


  while ($dados = mysqli_fetch_array($insert)) {
    $usuario = $dados['login_usuario'];
    $senhab = $dados['senha'];
    $nivel = $dados['nivel'];
    $unidade = $dados['area'];
    $id = $dados['id_usuario'];

  }

  $contar = mysqli_num_rows($insert);

  if ($contar != 0) { 

    if ($usuario == $login) {

      if ($senha == $senhab) {
        
        SESSION_START();
        echo "foi";
        $_SESSION["login"] = $login;
        $_SESSION["querychamados"]= $querychamados;
        $_SESSION["titulo"] = $titulo;
        $_SESSION["total"] = $total;
        $_SESSION["nivel"] = $nivel;
        $_SESSION["unidade"] = $unidade;
        $_SESSION["id"] = $id;
      } else {

        echo "Usuario ou Senha inválido";

      }

    } else {
    
      echo "Usuario ou Senha inválido";

    }

  } else {

    echo "Usuario ou Senha inválido";

  }
}
?>
