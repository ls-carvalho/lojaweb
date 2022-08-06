<?php
require_once 'includes/autenticar.inc.php';
require_once 'includes/autenticarRestrito.inc.php';
require_once '../classes/fabricante.inc.php';
require_once '../utils/dataUtil.inc.php';
require_once '../dao/fabricanteDAO.inc.php';
$fabricantes = $_SESSION['fabricantesObj'];
?>
<div class="corpo" align="center" style="line-height: 3em;">
    <h1>Fabricantes cadastrados</h1>
    <p>
        <font face="Tahoma">
            <table border="1" cellspacing="2" cellpadding="1" width="50%">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Logradouro</th>
                    <th>CEP</th>
                    <th>Cidade</th>
                    <th>E-mail</th>
                    <th>Ramo</th>
                    <th>Operação</th>
                </tr>
                <?php
                foreach ($fabricantes as $fabricante) {
                    //MONTAGEM DA TABELA
                    echo "<tr>";
                    echo "<td>" . $fabricante->get_codigo() . "</td>";
                    echo "<td>" . $fabricante->get_nome() . "</td>";
                    echo "<td>" . $fabricante->get_logradouro() . "</td>";
                    echo "<td>" . $fabricante->get_cep() . "</td>";
                    echo "<td>" . $fabricante->get_cidade() . "</td>";
                    echo "<td>" . $fabricante->get_email() . "</td>";
                    echo "<td>" . $fabricante->get_ramo() . "</td>";
                    // ultima célula da tabela
                    echo "<td><a href='../controlers/controlerFabricante.php?opcao=7&id=" . $fabricante->get_codigo() . "'>Alterar</a>&nbsp;";
                    echo "<a href='../controlers/controlerFabricante.php?opcao=8&id=" . $fabricante->get_codigo() . "'>Excluir</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </font>
</div>
<?php
require_once 'includes/rodape.inc.php';
?>