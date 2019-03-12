<?php
require_once "php/conexao.php";

SESSION_START();

$logado = $_SESSION['login'];
$nivel = $_SESSION['nivel'];

if (isset($_SESSION['login']) && $nivel == 1) {

	$usuario = $_SESSION["login"];




	?>

	<!DOCTYPE html>
	<html lang="pt-br">

	<head>

		<?php require_once "head.php"; ?>

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
							<img src="imagens/usuario.png" alt="imagem usuario" />
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
							<li class = "">
								<a href="index.php">
									<i class="fas fa-folder"></i>Chamados
								</a>
							</li>
							<li>
								<a href = "abrirchamados.php">
									<i class="fas fa-clone"></i>Abrir Chamados</a>
								</li>
								<li class="has-sub">
									<a class="js-arrow" href="relatorio/relatorio.php">
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
							</ul>
						</nav>
					</div>
				</aside>
				<!-- FIM MENU BARRA --->

				<div class = "page-container2">
					<div class = "box-gerar-relatorio">
						<div class = "title-chamado-aberto">
							<div class = "botao-voltar">
								<a href = "gerenciarusuarios.php"  class = "btn-voltar"><img width = "40px" height = "40px" src = "imagens/voltar.png"/></a>
							</div>
							<div class = "icone-chamado-aberto">
								<img src = "imagens/lupa-user.png" width = "60px" height = "60px"/>
							</div>
						</div>
						<div class = "box-form-relatorio">
							<form action="" method="POST">

								<?php 

								$id= $_POST["id"];

								$query="SELECT 
								u.id_usuario id,
								u.nome AS Nome,
								u.login_usuario AS Login,
								u.senha AS Senha,
								u.email AS Email,
								u.telefone AS Telefone,
								ud.id_unidade as id_unidade,
								ud.nome_unidade AS Unidade,
								n.id_nivel as id_nivel,
								n.nome_nivel AS Nivel
								FROM
								usuarios u
								INNER JOIN
								unidades ud ON u.area = ud.id_unidade
								INNER JOIN
								nivel n ON u.nivel = n.id_nivel
								WHERE
								id_usuario = $id";

								$usuario = mysqli_query($conexao,$query);

								$dados=mysqli_fetch_array($usuario);

								?>
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">ID:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dados['id']; ?>" readonly="true" required />
									</div>
								</div>
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">Nome Usuário:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dados['Nome']; ?>" readonly="true" required />
									</div>
								</div>
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">Login:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dados['Login']; ?>" readonly="true" required />
									</div>
								</div>
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">E-Mail:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dados['Email']; ?>" readonly="true" required />
									</div>
								</div>
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">Telefone:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dados['Telefone']; ?>" readonly="true" required />
									</div>
								</div>
							</form>
							<div class = "box-atualizar-usuario">
								<div class = "title-atualizar-usuario corB">
									<p>Atualizar Usuário</p>
								</div>
								<form action = "php/atualiza_usuario.php" method = "post">
									<div class = "box-inputs-relatorio box-inputs-h-50px">
										<div class = "label-30 corB">Unidade:</div>
										<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
										<div class = "select-style select-70">
											<select name = "unidade" >
												<option value="<?php echo $dados['id_unidade']; ?>"><?php echo $dados['Unidade']; ?></option>

												<?php 
												$queryuni="SELECT * FROM unidades;";

												$area=mysqli_query($conexao,$queryuni);

												while ($dadosuni=mysqli_fetch_array($area)) {



													?>
													<option value="<?php echo $dadosuni['id_unidade']; ?>"><?php echo $dadosuni['nome_unidade']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class = "box-inputs-relatorio box-inputs-h-50px">
										<div class = "label-30 corB">Nivel:</div>
										<div class = "select-style select-70">
											<select name = "nivel" >
												<option value="<?php echo $dados['id_nivel']; ?>"><?php echo $dados['Nivel']; ?></option>
												<?php 
												$querynivel="SELECT * FROM nivel";

												$nivel=mysqli_query($conexao,$querynivel);

												while ($dadosnivel=mysqli_fetch_array($nivel)) {
													

													?>
													<option value="<?php echo $dadosnivel['id_nivel'] ?>"><?php echo $dadosnivel['nome_nivel'];  ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class = "box-btn-atualizar-usuario">
										<input type = "submit" value = "Atualizar" class = "corB"/>
									</div>
								</form>
							</form>
						</div>
					</div>
				</div>

				<script src="js/jquery.js"></script>
			</body>
			</html>
			<?php
		} else{
			header("location: login.php");
		}
		?>
<!-- end document-->