<?php 
require_once "php/conexao.php";

SESSION_START();

$logado = $_SESSION['login'];
$nivel = $_SESSION['nivel'];



if (isset($_SESSION['login'])) {

	$usuario = $_SESSION["login"];
	
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
							<li class="active has-sub">
								<a class="js-arrow" href="#">
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
				<div class = "title-pag-mural corB">
					<p>Quadro de Avisos</p>
					<p><img src = "imagens/quadro.png" width = "130px" height = "130"/></p>
				</div>
				<div class = "box-mural">
					<div class = "title-mural corB">
						<p>Mural</p>
					</div>
					<div class = "box-form-mural">
						<form action = "" method = "">
							<div class = "box-input-mural">
								<label>Título Aviso</label>
								<?php 
								
								$aviso = "SELECT * FROM mural_avisos ORDER BY id_aviso DESC";

								$query = mysqli_query($conexao,$aviso);

								$dados= mysqli_fetch_array($query);

								?>
								<input type = "text" readonly = "true" value = "<?php echo $dados['nome_aviso'] ?>"/>
							</div>
							<div class = "box-input-mural">
								<label>Descrição do Aviso</label>
								<textarea name = "desc-aviso" readonly = "true"><?php echo $dados['desc_aviso'] ?></textarea>
							</div>
							<div class = "box-buttons-mural">		
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