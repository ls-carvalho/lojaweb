<?php
    require_once 'includes/cabecalho.inc.php';
    require_once '../classes/produto.inc.php';
    session_start();
    $produtos = $_SESSION['produtos'];
    $fabricantes = $_SESSION['fabricantes'];
?>
<div class="corpo" align="center" style="line-height: 3em;">
    <h1>Produtos cadastrados</h1>
    <p>
<?php
    function formatarData($data) {
        return date('d/m/Y',$data);
    }
?>
    <font face="Tahoma">
        <table border="1" cellspacing="2" cellpadding="1" width="50%">
            <tr>
                <th witdh="10%">ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Data de Fabricação</th>
                <th>Preço unitário</th>
                <th>Em Estoque</th>
                <th>Fabricante</th>
                <th>Operação</th>
            </tr>
<?php
        foreach($produtos as $produto){
            //MONTAGEM DA TABELA
            echo "<tr>";
                echo "<td>". $produto->get_produto_id() ."</td>";
                echo "<td>". $produto->get_nome() ."</td>";
                echo "<td>". $produto->get_descricao() ."</td>";
                echo "<td>". formatarData($produto->get_data_fabricacao()) ."</td>";
                echo "<td>". $produto->get_preco() ."</td>";
                echo "<td>". $produto->get_estoque() ."</td>";
                foreach($fabricantes as $fabricante){
                    if($produto->get_cod_fabricante() == $fabricante->codigo){
                        echo "<td>". $fabricante->codigo . " - " . $fabricante->nome ."</td>";
                    }
                }
            // ultima célula da tabela
                echo "<td><a href='../controlers/controlerProduto.php?opcao=3&id=" . $produto->get_produto_id() . "'>Alterar</a>&nbsp;" ;
                echo "<a href='../controlers/controlerProduto.php?opcao=4&id=" . $produto->get_produto_id() . "'>Excluir</a></td>";
            echo "</tr>";
        }
?>
        </table>
    </font>
</div>       
<?php
    require_once 'includes/rodape.inc.php';
?>