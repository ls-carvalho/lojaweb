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
    foreach($produtos as $produto){
?>
        <table border="0" width="30%" cellspacing="10">
            <tr>
                <td rowspan="5" align="center"><img src="imagens/produtos/<?php echo $produto->get_referencia();?>.jpg" width="200"></td>
            </tr>
            <tr align="left">
                <td colspan="2"><?php echo $produto->get_nome();?></td>
            </tr>
            <tr>
                <td style="text-align:justify" colspan="2"><?php echo $produto->get_descricao();?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php
                        foreach($fabricantes as $fabricante){
                            if($produto->get_cod_fabricante() == $fabricante->codigo){
                                echo $fabricante->nome;
                            }
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $produto->get_preco();?></td>
                <td colspan="2"><img src="imagens/botao_comprar2.png"></td>
            </tr>
        </table>
<?php
    }
?>
    </div>
<?php
    require_once 'includes/rodape.inc.php';
?>