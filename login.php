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
    <form class="form-signin" method = "post" action = "">
        <img class="mb-4" src="imagens/logo.png" alt="" width="200" height="200">

        <h1 class="h3 mb-3 font-weight-normal">Faça o login</h1>

        <label for="inputUsuario" class="sr-only"></label>
        <input name = "usuario" type="text" id="inputUsuario" class="form-control" placeholder="Nome usuario" required autofocus>
		
		<label for="inputPassword" class="sr-only"></label>
		<input name = "senha" type="password" id="password" class="form-control" placeholder="Senha" required>
			
        <div class="checkbox mb-3">
			<p><a href = "lembrarsenha.php">Esqueci minha senha</a></p>
            <p><div class="recebedados"></div></p>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name = "entrar">Entrar</button>



        <p class="mt-5 mb-3 text-muted">&copy;AlphaChamados-2018</p>
    </form>

    <script src="js/jquery.js"></script>
    <script>
        $('.form-signin').submit(function () {

            $.ajax({
                url: "php/validalogin.php",
                type: "post",
                data: $('.form-signin').serialize(),
                success: function (data)
                {
                    if (data == "foi") {
                        location.href= 'home.php';
                    }else{

                       $('.recebedados').html(data);
                    }
                }
            })
            return false;
        });

    </script>
	

</body>
</html>
