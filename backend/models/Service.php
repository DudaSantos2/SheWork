<?php

class Service
{
    public function __construct(string $descricao)
    {
        $this->setDescricao($descricao);
    }

    private string $descricao;

    /**
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }
}