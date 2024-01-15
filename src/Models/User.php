<?php
namespace BlogObjMvc\Models;

/** Class User **/
class User
{

    private $name;
    private $password;
    private $id;

    public function getName()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}
