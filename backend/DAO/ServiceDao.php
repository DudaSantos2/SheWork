<?php

class ServiceDao extends Database
{
    public function all()
    {
        $sql = "SELECT * FROM servicos";
        $query = $this->conexao->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}