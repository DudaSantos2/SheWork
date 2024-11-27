<?php
require_once "../../Database.php";
require_once "../../models/User.php";

class UserDao extends Database
{
    public function create(User $user)
    {
        $sql = "INSERT INTO users 
            values (
                    default, 
                    :email, 
                    :password, 
                    :name, 
                    :phone, 
                    :cep, 
                    :isCollaborator, 
                    :idServico, 
                    null)";

        $stmt = $this->conexao->prepare($sql);
        $email = $user->getEmail();
        $password = $user->getPassword();
        $name = $user->getName();
        $phone = $user->getPhone();
        $cep = $user->getCep();
        $isCollaborator = $user->getIsCollaborator();
        $idServico = $user->getIdServico();

        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":cep", $cep);
        $stmt->bindParam(":isCollaborator", $isCollaborator, PDO::PARAM_BOOL);
        $stmt->bindParam(":idServico", $idServico);

        $stmt->execute();
    }

    public function delete($id): bool
    {
        $sql = "DELETE FROM users WHERE id = :id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    public function update($id, $avatar): bool
    {
        $sql = "update users set avatar = :avatar where id = :id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':avatar', $avatar, PDO::PARAM_LOB);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function get($cep, $email, $phone)
    {
        $where = "";

        if (!empty($cep)) {
            $where .= " AND cep like '%$cep%'";
        }

        if (!empty($email)) {
            $where .= " AND email like '%$email%'";
        }

        if (!empty($phone)) {
            $where .= " AND phone like '%$phone%'";
        }

        $sql = "SELECT 
                users.id, users.email, users.name, users.phone, users.cep, users.isCollaborator, users.avatar, servicos.descricao, avg(reviews.nota) as media, count(reviews.id) as quantidade
            FROM users 
                LEFT JOIN servicos 
                    on users.id_servico = servicos.id
                LEFT JOIN reviews
                    on reviews.id_colaborador = users.id
            WHERE isCollaborator = 1 $where
            GROUP BY users.id
            HAVING quantidade is not null";

        $query = $this->conexao->query($sql);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByEmail($email)
    {
        $userExistsSql = "SELECT * FROM users WHERE email = '$email'";

        $query = $this->conexao->query($userExistsSql);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}