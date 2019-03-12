<?php
require_once "php/conexao.php";

SESSION_START();

$logado = $_SESSION['login'];
$nivel = $_SESSION['nivel'];

if (isset($_SESSION['login']) && $nivel == 1 || $nivel == 2) {

	$usuario = $_SESSION["login"];

	$ID = $_POST["id"];

	$query= "SELECT 
	c.id_chamado as 'ID',
	s.nome_situacao as 'Situacao',
	ar.nome_area as 'Area',
	p.nome_problema as 'Problema',
	u.nome_unidade as 'Unidade',
	c.ramal as Ramal,
	c.nome_contato as 'Contato',
	us.nome as 'Encaminhar',
	c.data_abertura as 'Abertura',
	pr.nome_prioridade as 'Prioridade',
	c.data_agendar as 'Agendamento',
	c.desc_problema as 'Descrição'

	from chamados c

	inner join area_responsavel ar on c.area_responsavel = ar.id_area
	inner join situacoes s on c.situacao_chamado = s.id_situacao
	inner join problemas p on c.tipo_problema = p.id_problema
	inner join unidades u on c.unidade = u.id_unidade 
	inner join usuarios us on c.encaminhar = us.id_usuario
	inner join prioridades pr on c.prioridade = pr.id_prioridade
 where id_chamado= $ID;";

	$resultado = mysqli_query($conexao,$query);

	$dadoschamado = mysqli_fetch_array($resultado);


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
					<div class = "box-gerar-relatorio height-1150">
						<div class = "title-chamado-aberto">
							<div class = "botao-voltar">
								<a href = "index.php"  class = "btn-voltar"><img width = "40px" height = "40px" src = "imagens/voltar.png"/></a>
							</div>
							<div class = "icone-chamado-aberto">
								<img src = "imagens/visualizar-chamado.png"/>
							</div>
						</div>
						<div class = "box-form-abrir-chamado height-1000">
							<form action="php/finaliza_chamado.php" method="POST">
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">ID:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dadoschamado['ID'];  ?>" readonly="true" name="id" required />
									</div>
								</div>
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">Status:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dadoschamado['Situacao'];  ?>" readonly="true" required />
									</div>
								</div>
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">Area Responsavel:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dadoschamado['Area'];  ?>" readonly="true" required />
									</div>
								</div>
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">Tipo do Problema:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dadoschamado['Problema'];  ?>" readonly="true" required />
									</div>
								</div>
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">Prioridade:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dadoschamado['Prioridade'];  ?>" readonly="true" required />
									</div>
								</div>
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">Unidade:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dadoschamado['Unidade'];  ?>" readonly="true" required />
									</div>
								</div>
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">Nome Contato:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dadoschamado['Contato'];  ?>" readonly="true" required />
									</div>
								</div>
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">Ramal:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dadoschamado['Ramal'];  ?>" readonly="true" required />
									</div>
								</div>
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">Atendido por:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dadoschamado['Encaminhar'];  ?>" readonly="true" required />
									</div>
								</div>
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">Data Abertura:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dadoschamado['Abertura'];  ?>" readonly="true" required />
									</div>
								</div>
								<div class = "box-inputs-relatorio box-inputs-h-50px">
									<div class = "label-30 corB">Data Agendar:</div>
									<div class = "input-text-style input-text-70">
										<input type = "text" value = "<?php echo $dadoschamado['Agendamento'];  ?>" readonly="true" required />
									</div>
								</div>
								<div class = "box-inputs-relatorio box-inputs-h-100px">
									<div class = "label-30 labelh-100 corB">Descrição do Problema:</div>
									<div class = "textarea-style select-70">
										<textarea value="" readonly="true" width = "70%" height = "100px" name = "desc_problema"  required> <?php echo $dadoschamado['Descrição'];  ?></textarea></div>
									</div>
									<?php
									if($dadoschamado['Situacao'] == "Pendente"){?>
										<div class = "box-inputs-relatorio box-inputs-h-50px">
											<input class = "botao-submit corB" type = "submit" value = "Finalizar"/>
										</div>
									<?php }?>
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