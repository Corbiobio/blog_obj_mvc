<?php
namespace BlogObjMvc\Models;

use BlogObjMvc\Models\User;
use PDO;

/** Class UserManager **/
class UserManager
{

    private PDO $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getBdd(): PDO
    {
        return $this->bdd;
    }

    public function find($name): bool|User
    {
        $result = $this->bdd->prepare("SELECT * FROM User WHERE name = ?");
        $result->execute([$name]);
        $result->setFetchMode(PDO::FETCH_CLASS, "BlogObjMvc\Models\User");

        return $result->fetch();
    }

    public function all(): array
    {
        $result = $this->bdd->query('SELECT * FROM User');

        return $result->fetchAll(PDO::FETCH_CLASS, "BlogObjMvc\Models\User");
    }

    public function store($password): void
    {
        $result = $this->bdd->prepare("INSERT INTO User(name, password) VALUES (?, ?)");
        $result->execute(
            [
                $_POST["name"],
                $password
            ]
        );
    }
}
