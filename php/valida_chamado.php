<?php

if (empty($_POST["area_resposavel"]) || empty($_POST["desc_problema"]) || empty($_POST["unidade"]) || empty($_POST["contato"]) || empty($_POST["agendar_chamado"]) || empty($_POST["prioridade"]) || empty($_POST["problema"]) || empty($_POST["ramal"])|| empty($_POST["encaminhar_para"])) {

    echo "preencha todos os campos";
}else{

    require_once "conexao.php";

    $area_responsavel = $_POST["area_resposavel"];
    $desc_problema = $_POST["desc_problema"];
    $unidade = $_POST["unidade"];
    $contato = $_POST["contato"];
    $agendar_chamado = $_POST["agendar_chamado"];
    $prioridade = $_POST["prioridade"];
    $problema = $_POST["problema"];
    $ramal = $_POST["ramal"];
    $encaminhar_para = $_POST["encaminhar_para"];
    

    $query5 = "INSERT INTO Chamados(area_responsavel,desc_problema,unidade,nome_contato,data_agendar,prioridade,tipo_problema,ramal,encaminhar,data_abertura,tempo_solucao,situacao_chamado)
    VALUES('$area_responsavel','$desc_problema','$unidade','$contato','$agendar_chamado','$prioridade','$problema','$ramal','$encaminhar_para',now(),1,1)";

    $insert = mysqli_query($conexao, $query5);

    if ($insert == 0) {
        echo "deu ruim";
        //echo "<script> alert('Deu ruim');</script>";
    }
    if ($insert == 1) {
        echo "foi";
            //echo "<script> alert('Chamado aberto com Sucesso!');</script>";
            //header('location: ../abrirchamados.php');
    }
}
?>