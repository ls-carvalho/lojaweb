<?php
class Cliente{
    private $d_cliente;
    private $cod_cliente;
    private $nome;
    private $endereco;
    private $telefone;
    private $cpf;
    private $dt_nascimento;
    private $email;
    private $senha;

function setAll(
    $cod_cliente,
    $nome,
    $endereco,
    $telefone,
    $cpf,
    $dt_nascimento,
    $email,
    $senha
){
    ($this)->cod_cliente = $cod_cliente;
    ($this)->nome = $nome;
    ($this)->endereco = $endereco;
    ($this)->telefone = $telefone;
    ($this)->cpf = $cpf;
    ($this)->dt_nascimento = $dt_nascimento;
    ($this)->email = $email;
    ($this)->senha = $senha;
}

function set_id_cliente($id_cliente) { $this->id_cliente = $id_cliente; }
function get_id_cliente() { return $this->id_cliente; }
function set_cod_cliente($cod_cliente) { $this->cod_cliente = $cod_cliente; }
function get_cod_cliente() { return $this->cod_cliente; }
function set_nome($nome) { $this->nome = $nome; }
function get_nome() { return $this->nome; }
function set_endereco($endereco) { $this->endereco = $endereco; }
function get_endereco() { return $this->endereco; }
function set_telefone($telefone) { $this->telefone = $telefone; }
function get_telefone() { return $this->telefone; }
function set_cpf($cpf) { $this->cpf = $cpf; }
function get_cpf() { return $this->cpf; }
function set_dt_nascimento($dt_nascimento) { $this->dt_nascimento = $dt_nascimento; }
function get_dt_nascimento() { return $this->dt_nascimento; }
function set_email($email) { $this->email = $email; }
function get_email() { return $this->email; }
function set_senha($senha) { $this->senha = $senha; }
function get_senha() { return $this->senha; }

    
}
?>