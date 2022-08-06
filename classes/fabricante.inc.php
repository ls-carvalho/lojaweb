<?php
class Fabricante
{
    protected $codigo;
    protected $nome;
    protected $logradouro;
    protected $cidade;
    protected $ramo;
    protected $cep;
    protected $email;

    //metodo para setar todos os valores
    function setAll(
        $novo_nome,
        $novo_logradouro,
        $nova_cidade,
        $novo_ramo,
        $novo_cep,
        $novo_email,
    ) {
        ($this)->nome = $novo_nome;
        ($this)->logradouro = $novo_logradouro;
        ($this)->cidade = $nova_cidade;
        ($this)->ramo = $novo_ramo;
        ($this)->cep = $novo_cep;
        ($this)->email = $novo_email;
    }

    //getters and setters
    function get_codigo()
    {
        return ($this)->codigo;
    }

    function set_codigo($novo_codigo)
    {
        ($this)->codigo = $novo_codigo;
    }

    function get_nome()
    {
        return ($this)->nome;
    }

    function set_nome($novo_nome)
    {
        ($this)->nome = $novo_nome;
    }

    function get_logradouro()
    {
        return ($this)->logradouro;
    }

    function set_logradouro($novo_logradouro)
    {
        ($this)->logradouro = $novo_logradouro;
    }

    function get_cidade()
    {
        return ($this)->cidade;
    }

    function set_cidade($nova_cidade)
    {
        ($this)->cidade = $nova_cidade;
    }

    function get_ramo()
    {
        return ($this)->ramo;
    }

    function set_ramo($novo_ramo)
    {
        ($this)->ramo = $novo_ramo;
    }

    function get_cep()
    {
        return ($this)->cep;
    }

    function set_cep($novo_cep)
    {
        ($this)->cep = $novo_cep;
    }

    function get_email()
    {
        return ($this)->email;
    }

    function set_email($novo_email)
    {
        ($this)->email = $novo_email;
    }
}
