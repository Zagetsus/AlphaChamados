<html>
<head>
    <meta charset="utf-8">
    <link rel="icon" href="favicon.ico">

    <?php require_once "head.php" ?>

    <title>Login</title>
    <!-- Bootstrap core CSS -->
    <link href="css/estilologin.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">


</head>
<body class="text-center">
    <form class="form-signin" method = "post" action = "php/redefinirsenha.php">
        <img class="mb-4" src="imagens/logo.png" alt="" width="200" height="200">

        <h1 class="h3 mb-3 font-weight-normal">Recuperar Senha</h1>

		<label for="inputUsuario" class="sr-only"></label>
        <input name = "mail" type="text" id="inputUsuario" class="form-control" placeholder="Insira seu Login..." required autofocus>
        <label for="inputUsuario" class="sr-only"></label>
        <input name = "mail" type="text" id="inputUsuario" class="form-control" placeholder="E-mail cadastrado no sistema..." required autofocus>

        <div class="checkbox mb-3">
         <p><a href = "login.php">Voltar para o login</a></p>
         <p><div class="recebedados"></div></p>
     </div>

     <button class="btn btn-lg btn-primary btn-block" type="submit" name = "entrar">Enviar</button>



     <p class="mt-5 mb-3 text-muted">&copy;AlphaChamados-2018</p>
 </form>
</body>
</html>

<?php 

    require_once "php/conexao.php";

    if (isset($_POST["entrar"])) {

       $email=$_POST["mail"];


       $verificaemail="SELECT * FROM usuarios WHERE email = '$email'";
       $executa= mysqli_query($conexao,$verificaemail);
       $total= mysqli_num_rows($executa);

       if ($total > 0) {
            echo "<script> alert('Entre em Contato com o Administrador da empresa.');</script>";
       }else if($total==0){
            echo "<script> alert('Email não cadastrado.')</script>";
       }
    }


 ?>
