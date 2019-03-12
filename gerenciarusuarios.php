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
									<i class="fas fa-clone"></i>Abrir Chamados
								</a>
							</li>
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
							<li class="active has-sub">
								<a class="js-arrow" href="#">
									<i class="fa fa-cogs"></i>Gerenciar Sistema
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</aside>
			<!-- FIM MENU BARRA --->

			<div class="page-container2">
				<div class = "box-gerenciar-usuarios">
					<div class = "title-usuarios">
						<p>Todos Usuarios</p>
						<div class = "icone-geren-user">
							<img src = "imagens/geren-user.png"/>
						</div>

						<div class = "conteudo-users">
							<div class = "tabela-users">
								<div style="overflow: auto; width: 100%; height: 500px;"> 
									<table class="tabela" style="width:100%">
										<tr id = "linha1" class = "corB">
											<td width = "1%">ID</td>
											<td width = "5%">Usuarios</td>
											<td width = "10%">Login</td>
											<td width = "5%">Email</td>
											<td width = "5%">Telefone</td>
											<td width = "5%">Unidade</td>
											<td width = "10%">Nivel</td>
											<td width = "1%"></td>
										</tr>
										<?php
										$query = "SELECT 
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
										nivel n ON u.nivel = n.id_nivel";

										$listar=mysqli_query($conexao,$query);

										while($dados=mysqli_fetch_array($listar)){ 

											?>
											<tr>		
												<td width = "1%"> <?php echo $dados['id'];?> </td>	
												<form action="chamado.php" method="post"/>
												<td width = "5%" class = "tabela"><?php echo $dados['Nome'];?></td>
												<td width = "10%" class = "tabela"><?php echo $dados['Login'];?></td>
												<td width = "5%" class = "tabela"><?php echo $dados['Email'];?></td>
												<td width = "5%" class = "tabela"><?php echo $dados['Telefone'];?></td>		
												<td width = "5%"class = "tabela"><?php echo $dados['Unidade'];?></td>		
												<td width = "10%" class = "tabela"><?php echo $dados['Nivel'];?></td>		
											</form>
											<form action="usuarios.php" method="post"/>
											<input type="hidden" name="id" value="<?php echo $dados['id'];?>"/>
											<td id = "visualizar"><input type="image" src = "imagens/lupa.png" width = "30px" height = "30px" class = "visulizar corB"/></td>
										</form>
									</tr>
								<?php }?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class = "box-geren-departamentos">
			<div class = "title-cadastrar-chamados">
				<p>Gerenciar Chamados</p>
				<div class = "icone-cadastrar-chamados">
					<img src = "imagens/config.png"/>
				</div>
			</div>
			<div class = "cadastrar-chamados-left">
				<div class = "title-unidades corB">
					Unidades Cadastradas
				</div>
				<div class = "box-tabela"> 
					<div style="overflow: auto; width: 100%; height: 250px;"> 
						<table class="tabela" style="width:100%">
							<tr id = "linha1" class = "corB">
								<td width = "20%">ID</td>
								<td width = "50">Unidade</td>
								<td width = "15%">Editar</td>
								<td width = "15%">Apagar</td>
							</tr>
							<?php
							$query2 = "SELECT id_unidade,nome_unidade FROM Unidades ORDER BY nome_unidade asc";
							$listar2=mysqli_query($conexao,$query2);
							while($dados2=mysqli_fetch_array($listar2)){ 
								?>
								<tr>		
									<td width = "15%"> <?php echo $dados2['id_unidade'];?> </td>	
									<form action="php/editar_unidade.php" method="post"/>
									<input type="hidden" name="id" value="<?php echo $dados2['id_unidade'];?>"/>
									<td width = "40%" class = "tabela"><input type="text" name="nomeu" value="<?php echo $dados2['nome_unidade'];?>" /></td>
									<td id = "visualizar"><input type="image" src = "imagens/Editar.png" width = "30px" height = "30px" class = "visulizar corB"/></td>
								</form>
								<form action="php/excluir_unidade.php" method="post"/>
								<input type="hidden" name="id" value="<?php echo $dados2['id_unidade'];?>"/>
								<td id = "visualizar"><input type="image" src = "imagens/excluir.png" width = "30px" height = "30px" class = "visulizar corB"/></td>
							</form>
						</tr>
					<?php }?>
				</table>
			</div>
		</div>
		<div class = "box-inserir-unidade">
			<div class = "title-inserir-unidade corB">
				Inserir Nova Unidade
			</div>
			<div class = "form-inserir-unidade">
				<form class="form-inserir-unidade" action = "" method = "POST">
					<div class = "inputs-unidades">
						<input type = "text" name = "unidade" placeholder = "Digite a nova unidade..."/>
						<input type = "submit" name = "botao" value = "Enviar"/>
					</div>
					<p><div class="recebedados1"></div></p>
				</form>
			</div>
			<script src="js/jquery.js"></script>
			<script>
				$('.form-inserir-unidade').submit(function () {

					$.ajax({
						url: "php/cria_unidade.php",
						type: "post",
						data: $('.form-inserir-unidade').serialize(),
						success: function (data)
						{
							if (data == "foi1") {
								location.href= 'gerenciarusuarios.php';
							}else{
								$('.recebedados1').html(data);
							}
						}
					})
					return false;
				});

			</script>
		</div>
	</div>
	<div class = "cadastrar-chamados-left">
		<div class = "title-unidades corB">
			Novo Aviso
		</div>
		<div class = "box-tabela">
			<div style="overflow: auto; width: 100%; height: 250px;"> 
				<table class="tabela" style="width:100%">
					<tr id = "linha1" class = "corB">
						<td width = "10%">ID</td>
						<td width = "15%">Aviso</td>
						<td width = "20%">Descrição</td>
						<td width = "10%">Editar</td>
						<td width = "10%">Apagar</td>
					</tr>
					<?php
					$query3 = "SELECT * FROM mural_avisos";
					$listar3=mysqli_query($conexao,$query3);
					while($dados3=mysqli_fetch_array($listar3)){ 
						?>
						<tr>		
							<td width = "15%"> <?php echo $dados3['id_aviso'];?> </td>	
							<form action="php/editar_aviso.php" method="post"/>
							<input type="hidden" name="id" value="<?php echo $dados3['id_aviso'];?>"/>
							<td width = "40%" class = "tabela"><input type="text" name="aviso" value="<?php echo $dados3['nome_aviso'];?>" /></td>	
							<td width = "40%" class = "tabela"><input type="text" name="desca" value="<?php echo $dados3['desc_aviso'];?>" /></td>	
							<td id = "visualizar"><input type="image" src = "imagens/Editar.png" width = "30px" height = "30px" class = "visulizar corB"/></td>
						</form>
						<form action="php/exclui_aviso.php" method="post">
							<input type="hidden" name="id" value="<?php echo $dados3['id_aviso'];?>"/>
							<td id = "visualizar"><input type="image" src = "imagens/excluir.png" width = "30px" height = "30px" class = "visulizar corB"/></td>
						</form>
					</tr>
				<?php }?>
			</table>
		</div>
	</div>
	<div class = "box-inserir-unidade">
		<div class = "title-inserir-unidade corB">
			Inserir Novo Aviso
		</div>
		<div class = "form-inserir-unidade">
			<form class="form-inserir-local" action = "php/cria_aviso.php" method = "post">
				<div class = "inputs-unidades">
					<input type = "text" name = "aviso" placeholder = "Digite um novo aviso..."/>
				</div>
				<div class = "inputs-unidades">
					<input type = "text" name = "descaviso" placeholder = "Digite a descrição..."/>
					<input type = "submit" name = "botao" value = "Enviar"/>
				</div>
				<p><div class="recebedados" id = "recebeDados"></div></p>
			</form>	
		</div>
	</div>
	<script src="js/jquery.js"></script>
	<script>
		$('.form-inserir-local').submit(function () {

			$.ajax({
				url: "php/cria_aviso.php",
				type: "post",
				data: $('.form-inserir-local').serialize(),
				success: function (data)
				{
					if (data == "foi") {
						location.href= 'gerenciaRusuarios.php';
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

<div class = "box-geren-problemas">
	<div class = "title-gerar-relatorio">
		<p>Problemas</p>
		<p><img src = "imagens/problemas.png" width = "60px" height = "60px"/></p>
	</div>
	<div class = "box-problemas box-left-60">
		<div class = "box-tabela-problemas">
			<div style="overflow: auto; width: 100%; height: 450px;"> 
				<table class="tabela" style="width:100%">
					<tr id = "linha1" class = "corB">
						<td width = "8%">ID</td>
						<td width = "30%">Nome problema</td>
						<td width = "30%">Desc Problema</td>
						<td width = "10%">Prioridade</td>
						<td width = "10%">Tempo Solução</td>
						<td width = "6%">Editar</td>
						<td width = "6%">Apagar</td>
					</tr>
					<?php
					$query3 = "SELECT 
					p.id_problema AS 'ID',
					p.nome_problema AS 'Problema',
					p.desc_problema AS 'descrição',
					pr.id_prioridade AS 'id_prioridade',
					pr.nome_prioridade AS 'Prioridade',
					ts.tempo_solucao AS 'Tempo_solucao',
					ts.id_tempo_solucao AS 'id_tempo'
					FROM
					problemas p
					INNER JOIN
					prioridades pr ON p.prioridade = pr.id_prioridade
					INNER JOIN
					tempo_solucoes ts ON p.tempo_solucao = id_tempo_solucao;;";
					$listar3=mysqli_query($conexao,$query3);
					while($dados3=mysqli_fetch_array($listar3)){ 
						?>
						<tr>		
							<td width = "8%"> <?php echo $dados3['ID'];?> </td>	
							<form action="php/editar_problema.php" method="post"/>
							<input type="hidden" name="id" value="<?php echo $dados3['ID'];?>"/>
							<td width = "30%" class = "tabela"><input type="text" name="problema" value="<?php echo $dados3['Problema'];?>" /></td>
							<td width = "30%" class = "tabela"><input type="text" name="descricao" value="<?php echo $dados3['descrição'];?>" /></td>
							<td width = "10%" class = "tabela">
								<select name = "prioridade">



									<option value="<?php echo $dados3['id_prioridade']; ?>"><?php echo $dados3['Prioridade'];?></option>
									<option value="1">Baixa</option>
									<option value="2">Média</option>
									<option value="3">Alta</option>
								</select>
							</td>
							<td width = "10%" class = "tabela">
								<select name = "tempo_solucao">
									<option value="<?php echo $dados3['id_tempo']; ?>"><?php echo $dados3['Tempo_solucao'];?></option>
									<?php 
									$querytempo = "select * from tempo_solucoes;";

									$listartempo=mysqli_query($conexao,$querytempo);

									while($dadostempo=mysqli_fetch_array($listartempo)){ 
										?>
										<option value = "<?php echo $dadostempo['id_tempo_solucao']; ?>"><?php echo $dadostempo['tempo_solucao']; ?></option>
									<?php } ?>
								</select></td>
								<td id = "visualizar"><input type="image" src = "imagens/Editar.png" width = "30px" height = "30px" class = "visulizar corB"/></td>
							</form>
							<form action="php/exclui_problema.php" method="post"/>
							<input type="hidden" name="id" value="<?php echo $dados3['ID'];?>"/>
							<td id = "visualizar"><input type="image" src = "imagens/excluir.png" width = "30px" height = "30px" class = "visulizar corB"/></td>
						</form>
					</tr>
				<?php }?>
			</table>
		</div>
	</div>
</div>


<div class = "box-problemas box-left-60">
	<div class = "title-novo-problema corB">
		<p>Cadastrar novo problema</p>
	</div>
	<form class = "form-problemas" action="php/cria_problema.php" method="POST">
		<div class = "box-inputs-problemas">
			<p>Nome Problema:</p>
			<input type = "text" name = "nome_problema" placeholder="Titulo do Problema" required />
		</div>
		<div class = "box-inputs-problemas height-100px">
			<p class = "height-100px">Descrição Problema:</p>
			<textarea  maxlength="20" class = "height-100px text-area-problema" name = "desc_problema" placeholder="Descreva o problema (Opcional)"></textarea>
		</div>
		<div class = "box-inputs-problemas">
			<p>Tempo Solução:</p>
			<select name = "tempo">
				<?php 

				$querytempo="SELECT * FROM tempo_solucoes;";

				$queryt= mysqli_query($conexao,$querytempo);

				while($dadostempo=mysqli_fetch_array($queryt)){ 



					?>
					<option value="<?php echo $dadostempo['id_tempo_solucao']; ?>"> <?php echo $dadostempo['tempo_solucao'];   ?> </option>

				<?php } ?>

			</select>
		</div><div class = "box-inputs-problemas">
			<p>Prioridade:</p>
			<select name = "prioridade">
				<?php  
				$queryprioridades="SELECT * FROM prioridades order by id_prioridade asc;";

				$queryprio= mysqli_query($conexao,$queryprioridades);

				while($dadosprio=mysqli_fetch_array($queryprio)){ 

					?>
					<option value="<?php echo $dadosprio['id_prioridade']; ?>"> <?php echo $dadosprio['nome_prioridade']; ?> </option>
				<?php } ?>

			</select>
			<input type = "submit" value = "Cadastrar"/>
		</div>		
	</form>
</div>
</div>

<div class = "box-cadastrar-tempo">
	<div class = "title-alterar-user corB">
		<p>Tempo de solução médio</p>
		<p><img src = "imagens/tempo.png" width = "50px" height = "50px"/></p>
	</div>
	<div class = "box-tempo-solucao tempo-width-70">
		<div class = "box-tabela-tempo">
			<div style="overflow: auto; width: 100%; height: 250px;"> 
				<table class="tabela" style="width:100%">
					<tr id = "linha1" class = "corB">
						<td width = "8%">ID</td>
						<td width = "30%">Tempo de Solução</td>
						<td width = "6%">Editar</td>
						<td width = "6%">Apagar</td>
					</tr>
					<?php
					$query4 = "SELECT * FROM tempo_solucoes";
					$listar4=mysqli_query($conexao,$query4);
					while($dados4=mysqli_fetch_array($listar4)){ 
						?>
						<tr>		
							<td width = "8%"> <?php echo $dados4['id_tempo_solucao'];?> </td>	
							<form action="php/editar_tempo.php" method="post"/>
							<input type="hidden" name="id" value="<?php echo $dados4['id_tempo_solucao'];?>"/>
							<td width = "30%" class = "tabela"><input type="text" name="tempo" value="<?php echo $dados4['tempo_solucao'];?>" /></td>
							<td id = "visualizar"><input type="image" src = "imagens/Editar.png" width = "30px" height = "30px" class = "visulizar corB"/></td>
						</form>
						<form action="php/exclui_tempo.php" method="post"/>
						<input type="hidden" name="id_tempo" value="<?php echo $dados4['id_tempo_solucao'];?>"/>
						<td id = "visualizar"><input type="image" src = "imagens/excluir.png" width = "30px" height = "30px" class = "visulizar corB"/></td>
					</form>
				</tr>
			<?php }?>
		</table>
	</div>
</div>
</div>
<div class = "box-tempo-solucao tempo-width-30">
	<div class = "box-inputs-tempo">
		<div class = "title-cadastrar-tempo corB">
			<p>Cadastrar tempo de solução</p>
		</div>
		<div class = "inputs-unidades">
			<form action="php/cria_tempo.php" method="POST" >
				<input type = "text" name = "tempo_segundo" placeholder = "Digite o tempo de solução:" required />
				<input type = "submit" name = "botao" value = "Enviar"/>
			</form>
		</div>
	</div>
</div>
</div>

</body>
</html>

<?php
} else{
	header("location: home.php");
}
?>
<!-- end document-->

