<?php 
require_once "php/conexao.php";

SESSION_START();

$logado = $_SESSION['login'];
$querysessao = $_SESSION['querychamados'];
$titulo = $_SESSION['titulo'];


$total =$_SESSION["total"];
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
							<?php 
							if($nivel == 1 || $nivel == 2){?>
							<li class = "active has-sub">
								<a href="#">
									<i class="fas fa-folder"></i>Chamados
								</a>
							</li>
							<?php } ?>
								<li>
									<a href = "abrirchamados.php">
										<i class="fas fa-clone"></i>Abrir Chamados</a>
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
						<div class="box-chamados">
							<div class="colunas corB">
								<label><?php echo $titulo;?></label>
								<h1 class = "num"><?php echo "$total";?></h1>
								<div class = "iconechamados">
									<img src = "imagens/pendente.png"/>
								</div>
							</div>
							<div class = "conteudo">
								<div style="overflow: auto; width: 100%; height: 100%;">

									<table class="tabela" style="width:100%">
										<tr id = "linha1" class = "corB">
											<td width = "3%">ID</td>
											<td width = "10%">Unidade</td>
											<td width = "22%">Problema</td>
											<td width = "22%">Descrição Problema</td>
											<td width = "10%">Contato</td>
											<td width = "10%">Data Abertura</td>
											<td width = "10%">Status</td>
											<td width = "8%">Ramal</td>
											<td width = "5%"></td>
										</tr>
										<?php
										
										

										$listar=mysqli_query($conexao,$querysessao);
										while($dados=mysqli_fetch_assoc($listar)){

											?>
											<tr>
												<td width = "3%"> <?php echo $dados['ID'];?> </td>								
												<form action="chamado.php" method="post"/>
												<td width = "10%" class = "tabela"><?php echo $dados['Unidade'];?></td>
												<td width = "22%" class = "tabela"><?php echo $dados['Problema'];?></td>
												<td width = "22%" class = "tabela"><?php echo $dados['Descrição'];?></td>
												<td width = "10%" class = "tabela"><?php echo $dados['Contato'];?></td>		
												<td width = "10%"class = "tabela"><?php echo $dados['Abertura'];?></td>		
												<td width = "10%" class = "tabela"><?php echo $dados['Situação'];?></td>		
												<td width = "10%" class = "tabela"><?php echo $dados['Ramal'];?></td>		
											</form>
											<form action="chamados.php" method="post"/>
											<input type="hidden" name="id" value="<?php echo $dados['ID'];?>"/>
											<td id = "visualizar"><input type="image" src = "imagens/lupa.png" width = "30px" height = "30px" class = "visulizar corB"/></td>
										</form>
									</tr>
									
								<?php } ?>
								
							</table>
						</div>	
					</div>
					<div class = "box-btn-chamados">
						<form method = "post" action = "" id = "form-mudar-query">
							<div class = "box-btn-submit">
								<select name = "query_table" required>
									<option value="todos">Todos os Chamados</option>
									<option value="pendentes">Chamados Pendentes</option>
									<option value="finalizados">Chamados Finalizados</option>
								</select>
								<div class = "btn-submit-query"><input type = "submit" value = "Enviar" name="botao"/></div>
							</div>
						</form>
						
						
						<?php 
						
						
						if(isset($_POST["botao"])){
							if($_POST["query_table"]=="todos"){
								$_SESSION['querychamados']="SELECT c.id_chamado as ID, u.nome_unidade as 'Unidade', p.nome_problema as 'Problema', c.desc_problema as 'Descrição', c.nome_contato as 'Contato', c.ramal as 'Ramal', c.data_abertura as 'Abertura', s.nome_situacao as 'Situação' from chamados c
								inner join unidades u on c.unidade = u.id_unidade 
								inner join situacoes s on c.situacao_chamado = s.id_situacao
								inner join problemas p on c.tipo_problema = p.id_problema ORDER BY Situação desc ;";

								$querysessao=$_SESSION['querychamados'];


								$todos = "Todos os Chamados";
								$_SESSION['titulo']=$todos;
								$titulo= $_SESSION['titulo'];

								$querycount = "SELECT * FROM Chamados";
								$sql = mysqli_query($conexao,$querycount);
								$_SESSION["total"]= mysqli_num_rows($sql);
								$total =$_SESSION["total"];

								echo "<script>  location.href= 'index.php'; </script>";


							}else if($_POST["query_table"]=="pendentes"){

								$_SESSION['querychamados']="SELECT c.id_chamado as ID, u.nome_unidade as 'Unidade', p.nome_problema as 'Problema', c.desc_problema as 'Descrição', c.nome_contato as 'Contato', c.ramal as 'Ramal', c.data_abertura as 'Abertura', s.nome_situacao as 'Situação' from chamados c
								inner join unidades u on c.unidade = u.id_unidade 
								inner join situacoes s on c.situacao_chamado = s.id_situacao
								inner join problemas p on c.tipo_problema = p.id_problema where situacao_chamado=1;";

								$querysessao=$_SESSION['querychamados'];


								$pendentes = "Chamados Pendentes";
								$_SESSION['titulo']=$pendentes;
								$titulo= $_SESSION['titulo'];

								$querycount = "SELECT * FROM Chamados where situacao_chamado=1";
								$sql = mysqli_query($conexao,$querycount);
								$_SESSION["total"]= mysqli_num_rows($sql);
								$total =$_SESSION["total"];

								echo "<script>  location.href= 'index.php'; </script>";


							}else if ($_POST["query_table"]=="finalizados") {

								$_SESSION['querychamados']="SELECT c.id_chamado as ID, u.nome_unidade as 'Unidade', p.nome_problema as 'Problema', c.desc_problema as 'Descrição', c.nome_contato as 'Contato', c.ramal as 'Ramal', c.data_abertura as 'Abertura', s.nome_situacao as 'Situação' from chamados c
								inner join unidades u on c.unidade = u.id_unidade 
								inner join situacoes s on c.situacao_chamado = s.id_situacao
								inner join problemas p on c.tipo_problema = p.id_problema where situacao_chamado=2;";
								$querysessao=$_SESSION['querychamados'];


								$finalizados = "Chamados Finalizados";
								$_SESSION['titulo']=$finalizados;
								$titulo= $_SESSION['titulo'];

								$querycount = "SELECT * FROM Chamados where situacao_chamado=2";
								$sql = mysqli_query($conexao,$querycount);
								$_SESSION["total"]= mysqli_num_rows($sql);
								$total =$_SESSION["total"];


								echo "<script>  location.href= 'index.php'; </script>";


							}
						}


						?>
					</div>
				</div>
			</div>		

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