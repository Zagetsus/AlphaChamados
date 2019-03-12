<?php

    require_once "conexao.php";

    if (empty($_POST["nome-user"]) || empty($_POST["login"]) || empty($_POST["e-mail"]) || empty($_POST["telefone"]) || empty($_POST["area"]) || empty($_POST["nivel"]) || empty($_POST["senha"]) || empty($_POST["senhac"])) {
        echo "Preencha todos os campos";
    } else {
        $nome = $_POST["nome-user"];
        $login = $_POST["login"];
        $email = $_POST["e-mail"];
        $telefone = $_POST["telefone"];
        $area = $_POST["area"];
        $nivel = $_POST["nivel"];
        $senha = $_POST["senha"];
        $senhac = $_POST["senhac"];



        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if (!is_numeric($telefone)) {
                echo "Digite apenas numeros para o telefone";
            }else{

                if ($senha == $senhac) {    
                    

                        $query = "INSERT INTO Usuarios(nome,login_usuario,email,telefone,area,nivel,senha,data_cadastro,data_contratacao)
                        VALUES('$nome','$login','$email','$telefone','$area','$nivel','$senha',CURDATE(),CURDATE())";       

                        $insert = mysqli_query($conexao,$query);

                        if($insert==0){
                            echo "N";
                        }
                        else{
                            echo "foi";
                        }
                }else{
                    echo "Senhas não correspondem";
                }
            }
        }else {
         echo "Email invalido";
        }
    } 

?>