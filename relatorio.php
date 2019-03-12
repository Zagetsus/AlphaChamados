<?php 
require_once "php/conexao.php";

SESSION_START();

$logado = $_SESSION['login'];
$nivel = $_SESSION['nivel'];

if (isset($_SESSION['login']) && $nivel == 1) {

	$usuario = $_SESSION["login"];
	
	?>
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
							<img src="imagens/usuario.png" alt="imagem usuario"/>
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
							<li>
								<a href="index.php">
									<i class="fas fa-folder"></i>Chamados
								</a>
							</li>
							<li class = "has-sub">
								<a href = "abrirchamados.php">
									<i class="fas fa-clone"></i>Abrir Chamados
								</a>
							</li>
							<li class="active has-sub">
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
						</ul>
					</nav>
				</div>
			</aside>
			<!-- FIM MENU BARRA --->

			<!-- CONTEUDO -- 000F4FF -->

			<div class = "page-container2">
				<div class = "box-gerar-relatorio-2">
					<div class = "title-gerar-relatorio">
						<p>Gerar Relatório</p>
						<p><img src = "imagens/relatorio.png" width = "60px" height = "60px"/></p>
					</div>
					<div class = "box-form-relatorio height-menor-3">
						<form action = "php/validarelatorio.php" method = "post">
							<div class = "box-inputs-relatorio box-inputs-h-50px">
								<div class = "label-30 corB">Relatório:</div>
								<div class = "select-style select-70">
									<select name = "relatorio" required>

										<option value = "chamado_por_setor">Quantidade de chamados por setor</option>
										<option value = "quant_problema">Quantidade de chamados por Problemas</option>
										<option value = "tec_chamados">Quantidade de chamados por técnicos</option>
										<option value = "users_setor">Quantidade de chamados por Usuário</option>
									</select>
								</div>
							</div>
							<div class = "box-inputs-relatorio box-inputs-h-50px">
								<div class = "box-recebedados"><div class="recebedados"></div></div>
								<input class = "botao-submit corB" type = "submit" value = "Gerar"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</body>

	</html>
	<?php
}else
header("location: login.php");
?>
		<!-- end document-->