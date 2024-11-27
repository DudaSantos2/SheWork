<?php
require_once "../../Database.php";
require_once "../../models/Review.php";

class ReviewDao extends Database
{
    public function create(Review $review)
    {
        $sql = "INSERT INTO reviews (id_usuario, id_colaborador, nota) values (:id_usuario, :id_colaborador, :nota)";

        $stmt = $this->conexao->prepare($sql);

        $idUsuario = $review->getIdUsuario();
        $idColaborador = $review->getIdColaborador();
        $nota = $review->getNota();

        $stmt->bindParam(":id_usuario", $idUsuario);
        $stmt->bindParam(":id_colaborador", $idColaborador);
        $stmt->bindParam(":nota", $nota);

        return $stmt->execute();
    }
}