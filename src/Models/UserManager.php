<?php
namespace BlogObjMvc\Models;

use BlogObjMvc\Models\User;

/** Class UserManager **/
class UserManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getBdd()
    {
        return $this->bdd;
    }

    public function find($name)
    {
        $result = $this->bdd->prepare("SELECT * FROM User WHERE name = ?");
        $result->execute(
            array(
                $name
            )
        );
        $result->setFetchMode(\PDO::FETCH_CLASS, "BlogObjMvc\Models\User");

        return $result->fetch();
    }

    public function all()
    {
        $result = $this->bdd->query('SELECT * FROM User');

        return $result->fetchAll(\PDO::FETCH_CLASS, "BlogObjMvc\Models\User");
    }

    public function store($password)
    {
        $result = $this->bdd->prepare("INSERT INTO User(name, password) VALUES (?, ?)");
        $result->execute(
            array(
                $_POST["name"],
                $password
            )
        );
    }
}
