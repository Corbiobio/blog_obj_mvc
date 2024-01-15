<?php

namespace BlogObjMvc\Models;

use BlogObjMvc\Models\Post;

class PostManager
{
    private $post;
    private $bdd;

    function __construct()
    {
        $this->post = new Post();
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    function add_post()
    {
        $sql = "INSERT INTO `post` (`id`, `user_id`, `title`, `label`, `img`, `date`) VALUES (?, ?, ?, ?, ?,NOW())";

        $result = $this->bdd->prepare($sql);
        $result->execute([
            uniqid(),
            $_SESSION["user"]["id"],
            $_POST["title"],
            $_POST["label"],
            $_FILES["img"]["name"]
        ]);
    }
}