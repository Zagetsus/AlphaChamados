<?php 
require_once "../php/conexao.php";
require_once "fpdf/fpdf.php";

SESSION_START();

$logado = $_SESSION['login'];

if (isset($_SESSION['login'])) {

    $usuario = $_SESSION["login"];

    



    class PDF extends FPDF
    {
// Page header
        function Header()
        {
    // Logo
            $this->Image('fpdf/tutorial/logo.png',10,6,50);
    // Arial bold 15
            $this->SetFont('Arial','B',20);
    // Move to the right
            $this->Cell(60);
    // Title
            $this->Cell(70,10,utf8_decode('Relatório'),2,0,'C');
            $this->Ln();
            $this->SetFont('Arial','',12);
            $this->Cell(185,15, utf8_decode('Quantidade de chamados por Usuário'),2,0,'C');
    // Line break
            $this->Ln(20);
        }

// Page footer
        function Footer()
        {
    // Position at 1.5 cm from bottom
            $this->SetY(-15);
    // Arial italic 8
            $this->SetFont('Arial','I',8);
    // Page number
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
        }

        function headerTable()
        {
            $this -> SetFont('Arial','B','12');
            $this->SetX("15");
            $this -> Cell(30,7, utf8_decode('Quantidade'),1,0,'C');
            $this -> Cell(60,7, utf8_decode('Usuário'),1,0,'C');
            $this -> Cell(60,7, utf8_decode('Unidade'),1,0,'C');
            $this -> Cell(30,7, utf8_decode('Área'),1,0,'C');
            $this -> Ln();
        }

    }

// Instanciation of inherited class



    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);
    $pdf -> headerTable();

    $db = "SELECT 
    COUNT(*) AS Quantidade,
    c.nome_contato as Usuario,
    u.nome_unidade AS Setor,
    ar.nome_area AS Area
    FROM
    chamados AS c,
    unidades AS u,
    area_responsavel AS ar
    WHERE
    c.unidade = u.id_unidade
    AND c.area_responsavel = ar.id_area
    GROUP BY u.nome_unidade , ar.nome_area
    ORDER BY quantidade DESC , Area;";

    $executa = mysqli_query($conexao,$db);
    while ($dados=mysqli_fetch_array($executa)) {

        $pdf ->  SetFont('Arial','','12');
        $pdf->SetX("15");
        $pdf -> Cell(30,5,  utf8_decode($dados['Quantidade']) ,1,0,'C');
        $pdf -> Cell(60,5,  utf8_decode($dados['Usuario']),1,0,'C');
        $pdf -> Cell(60,5,  utf8_decode($dados['Setor']),1,0,'C');
        $pdf -> Cell(30,5,  utf8_decode($dados['Area']),1,0,'C');
        $pdf -> Ln();
    }

    $pdf->Output();


    ?>

    <?php
}else
header("location: login.php");
?>

