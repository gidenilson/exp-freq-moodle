<?php


class Montador
{
    private $itens;

    public function __construct()
    {
        $this->itens = array();

    }

    public function addItem($item)
    {
        array_push($this->itens, $item);
    }

    public function sum()
    {
        $sum = 0;
        foreach ($this->itens as $item) {
            $sum += $item->getFreq();
        }
        return $sum;
    }

    public function monta()
    {
        $body = "";
        foreach ($this->itens as $item) {
            $body .= "(([[{$item->getId()}]]/([[{$item->getId()}]]+0.0001))*{$item->getFreq()})+";
        }
        $body = substr($body, 0, strlen($body) - 1);
        return "=(" . $body . ")/" . $this->sum() . "*100";
    }
}
