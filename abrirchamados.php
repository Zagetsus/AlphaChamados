<?php 
require_once "php/conexao.php";



SESSION_START();

$logado = $_SESSION['login'];
$nivel = $_SESSION['nivel'];
$unidade = $_SESSION['unidade'];

$descobreuni = "SELECT nome_unidade FROM unidades WHERE id_unidade = $unidade";
$unidadef = mysqli_query($conexao,$descobreuni);
$unidadeuser = mysqli_fetch_array($unidadef);

if (isset($_SESSION['login'])) {

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
							<?php
							if($nivel == 1 || $nivel == 2){?>
								<li class = "has-sub">
									<a href="index.php">
										<i class="fas fa-folder"></i>Chamados
									</a>
								</li>
							<?php } ?>
							<li class = "active has-sub">
								<a href = "#">
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


			<!-- CONTEUDO -- 000F4FF --> 


			<div class="page-container2">
				<div class = "box-abrir-chamados">
					<div class = "title-abrir-chamados corB">
						<p>Abrir Chamados</p>
						<p><img src = "imagens/abrir-chamado.png" width = "60px" height = "60px"/></p>
					</div>
					<div class = "box-form-abrir-chamado">
						<form action="" method="POST" class="form-abrirchamados">
							<div class = "box-inputs-relatorio box-inputs-h-50px">
								<div class = "label-30 corB">Área Responsavel:</div>
								<div class = "select-style select-70">
									<select name = "area_resposavel" required>

										<?php 


										$queryarea = "SELECT * FROM area_responsavel";

										$listararea=mysqli_query($conexao,$queryarea);

										while($dadosarea=mysqli_fetch_array($listararea)){ 



											?>
											<option value="<?php echo $dadosarea['id_area']; ?>"><?php echo $dadosarea['nome_area']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class = "box-inputs-relatorio box-inputs-h-100px">
								<div class = "label-30 labelh-100 corB">Descrição do Problema:</div>
								<div class = "textarea-style select-70"><textarea width = "70%" height = "100px" name = "desc_problema" placeholder="Especifique o problema (Opcional)"></textarea></div>
							</div>
							<div class = "box-inputs-relatorio box-inputs-h-50px">
								<div class = "label-30 corB">Unidade:</div>
								<div class = "select-style select-70">
									<select name = "unidade" >
										<?php 

										//$queryuni = "SELECT * FROM unidades ";

										//$listaruni=mysqli_query($conexao,$queryuni);

										//while($dadosuni=mysqli_fetch_array($listaruni)){ 

											//?>
											<option value="<?php echo $unidade;?>"><?php echo $unidadeuser['nome_unidade']; ?></option>
										<?php //} ?>
									</select>
								</div>
							</div>
							<div class = "box-inputs-relatorio box-inputs-h-50px">
								<div class = "label-30 corB">Contato:</div>
								<div class = "input-text-style input-text-70">
									<input type = "text" name = "contato" value="<?php echo $usuario;  ?>" readonly = "true"/>
								</div>
							</div>


							<div class = "box-inputs-relatorio box-inputs-h-50px">
								<div class = "label-30 corB">Tipo do Problema:</div>
								<div class = "select-style select-70">
									<select name = "problema" >
										<?php 
										$queryprob = "SELECT * FROM Problemas";

										$listarprob=mysqli_query($conexao,$queryprob);

										while($dadosprob=mysqli_fetch_array($listarprob)){ 
											?>
											<option value="<?php echo $dadosprob['id_problema']; ?>"><?php echo $dadosprob['nome_problema']; ?></option>

										<?php }  ?>
									</select>
								</div>
							</div>
							<div class = "box-inputs-relatorio box-inputs-h-50px">
								<div class = "label-30 corB">Prioridade:</div>
								<div class = "select-style select-70">
									<select name = "prioridade" >
										<?php 

										$queryprio = "SELECT * FROM prioridades ";

										$listarprio=mysqli_query($conexao,$queryprio);

										while($dadosprio=mysqli_fetch_array($listarprio)){ 


											?>
											<option value="<?php echo $dadosprio['id_prioridade'];?>"><?php echo $dadosprio['nome_prioridade']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class = "box-inputs-relatorio box-inputs-h-50px">
								<div class = "label-30 corB">Agendar Chamado:</div>
								<div class = "input-text-style input-text-70">
									<input type = "date" name = "agendar_chamado"  />
								</div>
							</div>
							<div class = "box-inputs-relatorio box-inputs-h-50px">
								<div class = "label-30 corB">Ramal:</div>
								<div class = "input-text-style input-text-70">
									<input type = "number" name = "ramal" placeholder="EX: 10" />
								</div>
							</div>
							<div class = "box-inputs-relatorio box-inputs-h-50px">
								<div class = "label-30 corB">Encaminhar para:</div>
								<div class = "select-style select-70">
									<select name = "encaminhar_para" >
										<?php 
										$queryuser= "SELECT * FROM usuarios where nivel=2";
										$listaruser = mysqli_query($conexao,$queryuser);

										while ($dadosuser=mysqli_fetch_array($listaruser)) {


											?>
											<option value="<?php echo $dadosuser['id_usuario'];?>"><?php echo $dadosuser['nome']; ?></option>
										<?php } ?>
									</select>

								</div>

							</div>
							<div class = "box-inputs-relatorio box-inputs-h-50px">
								<div class = "box-recebedados"><div class="recebedados"></div></div>
								<input class = "botao-submit corB" type = "submit" value = "Abrir"/>
							</div>

						</form>


						<script src="js/jquery.js"></script>
						<script>
							$('.form-abrirchamados').submit(function () {

								$.ajax({
									url: "php/valida_chamado.php",
									type: "POST",
									data: $('.form-abrirchamados').serialize(),
									success: function (data)
									{
										if (data == "foi") {
											alert('Chamado Aberto com Sucesso!');
											location.href= 'abrirchamados.php';
										}else{
											$('.recebedados').html(data);
										}
									}
								})
								return false;
							});

						</script>
					</div>
				</div>
			</div>		

			<!-- FIM DO CONTEUDO-->


		</div>

	</body>

	</html>
	<?php
}else
header("location: login.php");
?>
<!-- end document-->
