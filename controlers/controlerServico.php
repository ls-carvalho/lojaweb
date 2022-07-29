<?php
require_once '../classes/servico.inc.php';
require_once '../dao/servicoDAO.inc.php';

function uploadFotos($ref)
{
    $imagem = $_FILES["imagem"];
    $nome = $ref; // será colocado a Referência do produto como nome do arquivo
    if ($imagem != NULL) {
        $nome_temporario = $_FILES["imagem"]["tmp_name"];
        copy($nome_temporario, "../views/imagens/produtos/$nome.jpg");
    } else {
        echo "Você não realizou o upload de forma satisfatória.";
    }
}

function deletarFoto($ref)
{
    $arquivo = "../views/imagens/produtos/$ref.jpg";
    if (file_exists($arquivo)) { // verifica se o arquivo existe
        if (!unlink($arquivo)) { //aqui que se remove o arquivo retornando true, senão mostra mensagem
            echo "Não foi possível deletar o arquivo!";
        }
    }
}

$opcao = (int)$_REQUEST['opcao'];

if ($opcao == 1) { //inclusão
    $novoServico = new Servico();
    $novoServico->setAll($_REQUEST['pNome'], $_REQUEST['pCodServico'], $_REQUEST['pPreco'], $_REQUEST['pDescricao'], $_REQUEST['pCodTipo']);
    $servicoDao = new ServicoDAO();
    $servicoDao->incluirServico($novoServico);
    uploadFotos($_REQUEST['pCodServico']);
    header('Location:controlerServico.php?opcao=2');
} else if ($opcao == 2 || $opcao == 6) {
    $servicoDao = new ServicoDAO();
    session_start();
    $_SESSION['servicos'] = $servicoDao->getServicos();
    if ($opcao == 2) {
        header('Location:../views/exibirServicos.php');
    } else { //opcao == 6
        header('Location:../views/servicosVenda.php');
    }
} else if ($opcao == 3) {
    $id = (int)$_REQUEST['id'];
    $servicoDao = new ServicoDAO();
    $servico = $servicoDao->getServico($id);
    session_start();
    $_SESSION['servico'] = $servico;
    header("Location:controlerFabricante.php?opcao=3"); //Verificar se vai usar essa controler mesmo
} else if ($opcao == 4) {
    $id = (int)$_REQUEST['id'];
    $servicoDao = new ServicoDAO();
    deletarFoto($servicoDao->getServico($id)->get_cod_servico());
    $servicoDao->excluirServico($id);
    header('Location:controlerServico.php?opcao=2');
} else if ($opcao == 5) {
    $servico = new Servico();
    $servico->setAll($_REQUEST['pNome'], $_REQUEST['pCodServico'], $_REQUEST['pPreco'], $_REQUEST['pDescricao'], $_REQUEST['pIdTipo']);
    $servico->set_id_servico($_REQUEST['pId']);
    $servicoDao = new ServicoDAO();
    $servicoDao->atualizarProduto($servico);
    header('Location:controlerServico.php?opcao=2');
} else if ($opcao == 7) {
    $pagina = (int)$_REQUEST['pagina'];
    $servicoDao = new ServicoDAO();
    $lista = $servicoDao->getServicosPaginacao($pagina);
    $numPaginas = $servicoDao->getPagina();
    session_start();
    $_SESSION['servicos'] = $lista;
    header("Location:../views/exibirServicosPaginacao.php?paginas=" . $numPaginas);
} else if ($opcao == 8) {
    $servicoDao = new ServicoDAO();
    $servicoDao->incluirVariosServicos();
    header("Location:controlerServico.php?opcao=2");
}
