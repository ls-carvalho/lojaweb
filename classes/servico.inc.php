<?php
class Servico
{
    private $id_servico;
    private $cod_servico;
    private $nome;
    private $valor;
    private $descricao;
    private $id_tipo;


    //metodo para setar todos os valores
    function setAll(
        $novo_nome,
        $novo_cod_servico,
        $novo_valor,
        $novo_descricao,
        $novo_id_tipo
    ) {
        ($this)->nome = $novo_nome;
        ($this)->cod_servico = $novo_cod_servico;
        ($this)->valor = $novo_valor;
        ($this)->descricao = $novo_descricao;
        ($this)->id_tipo = $novo_id_tipo;
    }

    //getters and setters
    function get_id_servico()
    {
        return ($this)->id_servico;
    }

    function set_id_servico($novo_id_servico)
    {
        ($this)->id_servico = $novo_id_servico;
    }

    function get_nome()
    {
        return ($this)->nome;
    }

    function set_nome($novo_nome)
    {
        ($this)->nome = $novo_nome;
    }

    function get_valor()
    {
        return ($this)->valor;
    }

    function set_valor($novo_valor)
    {
        ($this)->valor = $novo_valor;
    }

    function get_descricao()
    {
        return ($this)->descricao;
    }

    function set_descricao($novo_descricao)
    {
        ($this)->descricao = $novo_descricao;
    }

    function get_id_tipo()
    {
        return ($this)->id_tipo;
    }

    function set_id_tipo($novo_id_tipo)
    {
        ($this)->id_tipo = $novo_id_tipo;
    }

    function get_cod_servico()
    {
        return ($this)->cod_servico;
    }

    function set_cod_servico($novo_cod_servico)
    {
        ($this)->cod_servico = $novo_cod_servico;
    }
}
