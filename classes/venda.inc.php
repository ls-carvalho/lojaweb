<?php
class Venda
{
    private $id_venda;
    private $id_cliente;
    private $valorTotal;

    function __construct($id_cliente, $valor)
    {
        ($this)->id_cliente = $id_cliente;
        ($this)->valorTotal = $valor;
    }

    public function get_id_venda()
    {
        return ($this)->id_venda;
    }

    public function set_id_venda($novo_id)
    {
        ($this)->id_venda = $novo_id;
    }

    public function get_id_cliente()
    {
        return ($this)->id_cliente;
    }

    public function set_id_cliente($novo_id_cliente)
    {
        ($this)->id_cliente = $novo_id_cliente;
    }

    public function get_valorTotal()
    {
        return ($this)->valorTotal;
    }

    public function set_valorTotal($novo_valorTotal)
    {
        ($this)->valorTotal = $novo_valorTotal;
    }
}
