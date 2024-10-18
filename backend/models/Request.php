<?php

class Request
{
    public function __construct($id_usuario, $id_colaborador, $descricao, $status = false)
    {
        $this->setIdUsuario($id_usuario);
        $this->setIdColaborador($id_colaborador);
        $this->setDescricao($descricao);
        $this->setStatus($status);
    }

    private int $id_usuario;
    private int $id_colaborador;
    private string $descricao;
    private bool $status;

    /**
     * @return int
     */
    public function getIdUsuario(): int
    {
        return $this->id_usuario;
    }

    /**
     * @return int
     */
    public function getIdColaborador(): int
    {
        return $this->id_colaborador;
    }

    /**
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param int $id_usuario
     */
    public function setIdUsuario(int $id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @param int $id_colaborador
     */
    public function setIdColaborador(int $id_colaborador): void
    {
        $this->id_colaborador = $id_colaborador;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }
}