<?php
class Produto{
    private $produto_id; //mudar pra produto_id
    private $nome;
    private $data_fabricacao;
    private $preco;
    private $estoque;
    private $descricao;
    private $referencia;
    private $cod_fabricante;

    //metodo para setar todos os valores
    function setAll(
        $novo_nome,
        $novo_data_fabricacao,
        $novo_preco,
        $novo_estoque,
        $novo_descricao,
        $novo_referencia,
        $novo_cod_fabricante)
    {
        ($this)->nome = $novo_nome;
        ($this)->data_fabricacao = strtotime(str_replace('/','-',$novo_data_fabricacao)); //transformando em timestamp
        ($this)->preco = $novo_preco;
        ($this)->estoque = $novo_estoque;
        ($this)->descricao = $novo_descricao;
        ($this)->referencia = $novo_referencia;
        ($this)->cod_fabricante = $novo_cod_fabricante;
    }

    //getters and setters
    function get_produto_id(){
        return ($this)->produto_id;
    }

    function set_produto_id($novo_produto_id){
        ($this)->produto_id = $novo_produto_id;
    }

    function get_nome(){
        return ($this)->nome;
    }

    function set_nome($novo_nome){
        ($this)->nome = $novo_nome;
    }

    function get_data_fabricacao(){
        return ($this)->data_fabricacao;
    }

    function set_data_fabricacao($novo_data_fabricacao){
        ($this)->data_fabricacao = strtotime($novo_data_fabricacao); //com alteração para timestamp
    }

    function get_preco(){
        return ($this)->preco;
    }

    function set_preco($novo_preco){
        ($this)->preco = $novo_preco;
    }

    function get_estoque(){
        return ($this)->estoque;
    }

    function set_estoque($novo_estoque){
        ($this)->estoque = $novo_estoque;
    }

    function get_descricao(){
        return ($this)->descricao;
    }

    function set_descricao($novo_descricao){
        ($this)->descricao = $novo_descricao;
    }

    function get_referencia(){
        return ($this)->referencia;
    }

    function set_referencia($novo_referencia){
        ($this)->referencia = $novo_referencia;
    }

    function get_cod_fabricante(){
        return ($this)->cod_fabricante;
    }

    function set_cod_fabricante($novo_cod_fabricante){
        ($this)->cod_fabricante = $novo_cod_fabricante;
    }
}
?>