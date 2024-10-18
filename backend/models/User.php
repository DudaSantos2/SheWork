<?php

class User
{
    public function __construct(
        $email,
        $password,
        $name,
        $phone,
        $cep,
        $isCollaborator,
        $id_servico,
        $avatar = "")
    {
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setName($name);
        $this->setPhone($phone);
        $this->setCep($cep);
        $this->setIsCollaborator($isCollaborator);
        $this->setIdServico($id_servico);
        $this->setAvatar($avatar);
    }

    private string $email;
    private string $password;
    private string $name;
    private string $phone;
    private string $cep;
    private bool $isCollaborator;
    private int $id_servico;
    private string $avatar;

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @return string
     */
    public function getCep(): string
    {
        return $this->cep;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getIdServico(): int
    {
        return $this->id_servico;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function getIsCollaborator(): bool
    {
        return $this->isCollaborator;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * @param string $cep
     */
    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param int $id_servico
     */
    public function setIdServico(int $id_servico): void
    {
        $this->id_servico = $id_servico;
    }

    /**
     * @param bool $isCollaborator
     */
    public function setIsCollaborator(bool $isCollaborator): void
    {
        $this->isCollaborator = $isCollaborator;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
}