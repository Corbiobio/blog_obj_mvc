<?php
namespace BlogObjMvc\Models;

/** Class User **/
class User
{

    private string $name;
    private string $password;
    private int $id;

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
