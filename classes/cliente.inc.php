<?php
class Cliente
{
    protected $cpf;
    protected $nome;
    protected $logradouro;
    protected $cidade;
    protected $estado;
    protected $cep;
    protected $telefone;
    protected $data_nascimento;
    protected $email;
    protected $senha;
    protected $rg;
    protected $data_exclusao;

    //metodo para setar todos os valores
    function setAll(
        $novo_nome,
        $novo_logradouro,
        $nova_cidade,
        $novo_estado,
        $novo_cep,
        $novo_telefone,
        $nova_data_nascimento,
        $novo_email,
        $nova_senha,
        $novo_rg
    ) {
        ($this)->nome = $novo_nome;
        ($this)->logradouro = $novo_logradouro;
        ($this)->cidade = $nova_cidade;
        ($this)->estado = $novo_estado;
        ($this)->cep = $novo_cep;
        ($this)->telefone = $novo_telefone;
        ($this)->data_nascimento = strtotime(str_replace('/', '-', $nova_data_nascimento)); //transformando em timestamp
        ($this)->email = $novo_email;
        ($this)->senha = $nova_senha;
        ($this)->rg = $novo_rg;
    }

    //getters and setters
    function get_cpf()
    {
        return ($this)->cpf;
    }

    function set_cpf($novo_cpf)
    {
        ($this)->cpf = $novo_cpf;
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

    function get_estado()
    {
        return ($this)->estado;
    }

    function set_estado($novo_estado)
    {
        ($this)->estado = $novo_estado;
    }

    function get_cep()
    {
        return ($this)->cep;
    }

    function set_cep($novo_cep)
    {
        ($this)->cep = $novo_cep;
    }

    function get_telefone()
    {
        return ($this)->telefone;
    }

    function set_telefone($novo_telefone)
    {
        ($this)->telefone = $novo_telefone;
    }

    function get_data_nascimento()
    {
        return ($this)->data_nascimento;
    }

    function set_data_nascimento($nova_data_nascimento)
    {
        ($this)->data_nascimento = strtotime($nova_data_nascimento); //com alteração para timestamp
    }

    function get_email()
    {
        return ($this)->email;
    }

    function set_email($novo_email)
    {
        ($this)->email = $novo_email;
    }

    function get_senha()
    {
        return ($this)->senha;
    }

    function set_senha($nova_senha)
    {
        ($this)->senha = $nova_senha;
    }

    function get_rg()
    {
        return ($this)->rg;
    }

    function set_rg($novo_rg)
    {
        ($this)->rg = $novo_rg;
    }

    function get_data_exclusao()
    {
        return ($this)->data_exclusao;
    }

    function set_data_exclusao($nova_data_exclusao)
    {
        ($this)->data_exclusao = $nova_data_exclusao;
    }
}
