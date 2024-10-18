<?php

class Review
{
    public function __construct($id_usuario, $id_colaborador, $nota)
    {
        $this->setIdUsuario($id_usuario);
        $this->setIdColaborador($id_colaborador);
        $this->setNota($nota);
    }

    private int $id_usuario;
    private int $id_colaborador;
    private int $nota;

    /**
     * @return int
     */
    public function getIdColaborador(): int
    {
        return $this->id_colaborador;
    }

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
    public function getNota(): int
    {
        return $this->nota;
    }

    /**
     * @param int $id_colaborador
     */
    public function setIdColaborador(int $id_colaborador): void
    {
        $this->id_colaborador = $id_colaborador;
    }

    /**
     * @param int $id_usuario
     */
    public function setIdUsuario(int $id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @param int $nota
     */
    public function setNota(int $nota): void
    {
        $this->nota = $nota;
    }
}