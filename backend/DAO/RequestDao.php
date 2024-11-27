<?php
require_once "../../Database.php";
require_once "../../models/Request.php";
class RequestDao extends Database
{
    public function create(Request $request): bool
    {
        $sql = "INSERT INTO requests (
                      id_usuario, 
                      id_colaborador, 
                      descricao, 
                      status) values (
                                      :id_usuario, 
                                      :id_colaborador, 
                                      :descricao, 
                                      :status)";

        $stmt = $this->conexao->prepare($sql);

        $id_usuario = $request->getIdUsuario();
        $id_colaborador = $request->getIdColaborador();
        $descricao = $request->getDescricao();
        $status = $request->getStatus();

        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_colaborador', $id_colaborador);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':status', $status);

        return $stmt->execute();
    }

    public function check($id): bool
    {
        $sql = "UPDATE requests SET status = :status WHERE id = :id";

        $stmt = $this->conexao->prepare($sql);

        $status = 1;
        $stmt->bindParam(':status', $status, PDO::PARAM_BOOL);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function get($cep, $user, $status, $id)
    {
        $where = "";

        if (!empty($cep)) {
            $where .= " AND u.cep like '%$cep%'";
        }

        if (!empty($user)) {
            $where .= " AND u.name like '%$user%'";
        }

        if (!empty($status) || $status == "0") {
            $where .= " AND requests.status = $status";
        }

        $sql = "SELECT requests.*, u.name, u.email, u.phone, u.cep FROM requests LEFT JOIN users u on u.id = requests.id_usuario WHERE id_colaborador = $id $where";

        $stmt = $this->conexao->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}