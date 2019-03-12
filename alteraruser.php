<?php 
require_once "php/conexao.php";

SESSION_START();

$logado = $_SESSION['login'];
$nivel = $_SESSION['nivel'];
$id = $_SESSION['id'];


if (isset($_SESSION['login'])) {

	$usuario = $_SESSION["login"];

	$query= "SELECT * FROM usuarios where login_usuario = '$usuario'";

	$usuarios = mysqli_query($conexao,$query);

	$dados=mysqli_fetch_array($usuarios);


	
	?>

	<!DOCTYPE html>
	<html lang="pt-br">

	<head>
		<?php require_once "head.php";?>
	</head>

	<body class="animsition">
		<div class="page-wrapper">
			<!-- MENU BARRA --->
			<aside class="menu-sidebar2">
				<div class="logo">
					<img src = "imagens/logo.png"/>
				</div>

				<div class="menu-sidebar2__content js-scrollbar1">
					<div class="account2">
						<div class="image img-cir img-120">
							<img src="imagens/usuario.png" alt="" />
						</div>
						<div class = "box-name name"><?php echo "$logado";?> <a class="js-arrow " href="alteraruser.php"><i class="far fa-edit"></i></a></div>
						<a href="php/quebra_sessao.php">Sair</a>
					</div>
					<nav class="navbar-sidebar2">
						<ul class="list-unstyled navbar__list">
							<li class="has-sub">
								<a class="js-arrow" href="home.php">
									<i class="fa fa-home"></i>Home
								</a>
							</li>
							<?php
							if($nivel == 1 || $nivel == 2){?>
								<li class = "has-sub">
									<a href="index.php">
										<i class="fas fa-folder"></i>Chamados
									</a>
								</li>
							<?php } ?>
								<li>
									<a href = "abrirchamados.php">
										<i class="fas fa-clone"></i>Abrir Chamados
									</a>
								</li>
							<?php
							if($nivel == 1){?>
								<li class="has-sub">
									<a class="js-arrow" href="relatorio.php">
										<i class="fas fa-chart-bar"></i>Relatório
									</a>
								</li>
								<li class="has-sub">
									<a class="js-arrow" href="novousuario.php">
										<i class="fa fa-address-book"></i>Novo Usuário
									</a>
								</li>
									<li class="has-sub">
										<a class="js-arrow" href="gerenciarusuarios.php">
											<i class="fa fa-cogs"></i>Gerenciar Sistema
										</a>
									</li>
							<?php } ?>
								</ul>
							</nav>
						</div>
					</aside>
					<!-- FIM MENU BARRA --->
					
					<div class = "page-container2">
						<div class = "box-alterar-user">
							<div class = "title-alterar-user corB">
								<p>Alterar Dados</p>
								<p><img src = "imagens/alterardados.png" width = "50px" height = "50px"/></p>
							</div>
							<div class = "box-form-alterar-user">
								<form action = "php/alterarusuario.php" method = "post">
									<div class = "box-inputs-senha">
										<p>Nome:</p>

										<input type = "text" name = "nome_usuario" value = "<?php echo $dados['nome']; ?>" required/>
									</div>
									<div class = "box-inputs-senha">
										<p>Login:</p>
										<input type = "text" name = "login_usuario" value = "<?php echo $dados['login_usuario']; ?>" readonly = "true" required/>
									</div>
									<div class = "box-inputs-senha">
										<p>E-Mail:</p>
										<input type = "text" name = "e_mail" value = "<?php echo $dados['email']; ?>" required/>
									</div>
									<div class = "box-inputs-senha">
										<p>Telefone:</p>
										<input type = "text" name = "telefone" value = "<?php echo $dados['telefone']; ?>" required/>
									</div>
									<div class = "txt-alterar-senha">
										<a href = "alterarsenha.php">Alterar senha <i class="fa fa-key"></i></a>
									</div>
									<div class = "box-btn-alterar-senha">
										<p><input type = "submit" href = "home.php" name = "cancel" value = "Cancelar" id = "btn-float-right"/></p>
										<p><input type = "submit" name = "confirmar" value = "Alterar"/></p>
										<input type="hidden" name="id" value="<?php echo $id; ?>">
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- CONTEUDO -- 000F4FF --> 

			<!-- FIM DO CONTEUDO-->


		</div>

	</body>

	</html>

	<?php
}else{
	header("location: login.php");
}
?>

<!-- end document-->