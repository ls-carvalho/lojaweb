<?php
class Venda
{
    private $id_venda;
    private $cpf;
    private $valorTotal;
    private $data;

    function __construct($cpf, $valor)
    {
        ($this)->cpf = $cpf;
        ($this)->valorTotal = $valor;
        ($this)->data = time();
    }

    public function get_id_venda()
    {
        return ($this)->id_venda;
    }

    public function set_id_venda($novo_id)
    {
        ($this)->id_venda = $novo_id;
    }

    public function get_cpf()
    {
        return ($this)->cpf;
    }

    public function set_cpf($novo_cpf)
    {
        ($this)->cpf = $novo_cpf;
    }

    public function get_valorTotal()
    {
        return ($this)->valorTotal;
    }

    public function set_valorTotal($novo_valorTotal)
    {
        ($this)->valorTotal = $novo_valorTotal;
    }

    public function get_data()
    {
        return ($this)->data;
    }

    public function set_data($nova_data)
    {
        ($this)->data = $nova_data;
    }
}
