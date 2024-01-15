<?php
namespace BlogObjMvc\Models;

use BlogObjMvc\Models\Todo;

/** Class UserManager **/
class TodoManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function find($name, $userId)
    {
        $result = $this->bdd->prepare("SELECT * FROM List WHERE name = ? AND user_id = ?");
        $result->execute(
            array(
                $name,
                $userId
            )
        );
        $result->setFetchMode(\PDO::FETCH_CLASS, "Todo\Models\Todo");

        return $result->fetch();
    }

    public function store()
    {
        $result = $this->bdd->prepare("INSERT INTO List(name, user_id) VALUES (?, ?)");
        $result->execute(
            array(
                $_POST["name"],
                $_SESSION["user"]["id"]
            )
        );
    }

    public function update($slug)
    {
        $result = $this->bdd->prepare("UPDATE List SET name = ? WHERE name = ? AND user_id = ?");
        $result->execute(
            array(
                $_POST['nameTodo'],
                $slug,
                $_SESSION["user"]["id"]
            )
        );
    }

    public function delete($slug)
    {

        $result = $this->bdd->prepare("DELETE FROM List WHERE id = ? AND user_id = ?");
        $result->execute(
            array(
                $_POST["idList"],
                $_SESSION["user"]["id"]
            )
        );
    }

    public function getAll()
    {
        $result = $this->bdd->prepare('SELECT * FROM List WHERE user_id = ?');
        $result->execute(
            array(
                $_SESSION["user"]["id"]
            )
        );

        return $result->fetchAll(\PDO::FETCH_CLASS, "Todo\Models\Todo");
    }
}
