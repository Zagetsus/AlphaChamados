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
                           <i class="fas fa-folder"></i>Chamados</a>
                       </li>
                       <li>
                        <a href = "abrirchamados.php">
                           <i class="fas fa-clone"></i>Abrir Chamados</a>
                       </li>
                       <li class="has-sub">
                        <a class="js-arrow" href="relatorio.php">
                            <i class="fas fa-chart-bar"></i>Relatório
                        </a>
                    </li>
                    <li class="active has-sub">
                        <a class="js-arrow" href="#">
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

    <div class="page-container2">
        <div class = "box-gerar-relatorio"> 
            <div class = "title-gerar-relatorio">
                <p>Cadastrar novo Usuário</p>
                <p><img src = "imagens/novo-user.png" width = "60px" height = "60px"/></p>
            </div>
            <div class = "box-form-relatorio">
             <form class = "form-novo-usuario" action="" method = "POST">
                <div class = "box-inputs-relatorio box-inputs-h-50px">
                  <div class = "label-30 corB">Nome:</div>
                  <div class = "input-text-style input-text-70">
                      <input type = "text" name = "nome-user" placeholder="Digite o nome" />
                  </div>
              </div>
              <div class = "box-inputs-relatorio box-inputs-h-50px">
                  <div class = "label-30 corB">Login:</div>
                  <div class = "input-text-style input-text-70">
                     <input type = "text" name = "login" placeholder="Digite um login de usuario" />
                 </div>
             </div>
             <div class = "box-inputs-relatorio box-inputs-h-50px">
              <div class = "label-30 corB">Email:</div>
              <div class = "input-text-style input-text-70">
                 <input type = "text" name = "e-mail" placeholder="EX: endereco@dominio.com" />
             </div>
         </div>
         <div class = "box-inputs-relatorio box-inputs-h-50px">
          <div class = "label-30 corB">Telefone:</div>
          <div class = "input-text-style input-text-70">
             <input type = "text" name = "telefone" data-mask="(00) 0000-0000" maxlength="10" placeholder="EX: (00) 0000-0000" />
         </div>
     </div>
     <div class = "box-inputs-relatorio box-inputs-h-50px">
      <div class = "label-30 corB">Unidade:</div>
      <div class = "select-style select-70">
        <select name = "area" >
            <?php 

            $unidade = "SELECT * from unidades ORDER BY nome_unidade";

            $verunidade = mysqli_query($conexao,$unidade);

            while($dadosunidade=mysqli_fetch_array($verunidade)){ 

               ?>
               <option value="<?php echo $dadosunidade['id_unidade']; ?>"><?php echo $dadosunidade['nome_unidade'];?></option>
           <?php } ?>
       </select>
   </div>
</div>
<div class = "box-inputs-relatorio box-inputs-h-50px">
  <div class = "label-30 corB">Nível:</div>
  <div class = "select-style select-70">
     <select name = "nivel" >
        <?php  

        $nivel = "SELECT * from nivel";

        $vernivel = mysqli_query($conexao,$nivel);

        while($dadosnivel=mysqli_fetch_array($vernivel)){ 

            ?>
            <option value="<?php echo $dadosnivel['id_nivel']; ?>"> <?php echo $dadosnivel['nome_nivel']; ?></option>
        <?php } ?>
    </select>
</div>
</div>
<div class = "box-inputs-relatorio box-inputs-h-50px">
  <div class = "label-30 corB">Senha:</div>
  <div class = "input-text-style input-text-70">
     <input type = "password" name = "senha"  placeholder="Digite uma senha " />
 </div>
</div>
<div class = "box-inputs-relatorio box-inputs-h-50px">
  <div class = "label-30 corB">Confirmar Senha:</div>
  <div class = "input-text-style input-text-70">
     <input type = "password" name = "senhac"  placeholder="Confirme a senha" />
 </div>
</div>	

<p><div class="recebedados"></div></p>

<div class = "box-inputs-relatorio box-inputs-h-50px">
   <input class="botao-submit corB" type = "submit" value = "Cadastrar"/>
</div>
</form>



<script src="js/jquery.js"></script>
<script>
    $('.form-novo-usuario').submit(function () {

        $.ajax({
            url: "php/cria_usuario.php",
            type: "POST",
            data: $('.form-novo-usuario').serialize(),
            success: function (data)
            {
                if (data == "foi") {
                    alert('Usuario cadastrado com sucesso!');
                    location.href= 'novousuario.php';
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

</body>

</html>

<?php
} else
header("location: login.php");
?>

<!-- end document-->

