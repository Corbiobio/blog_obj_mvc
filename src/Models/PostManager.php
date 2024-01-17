<?php

namespace BlogObjMvc\Models;

use BlogObjMvc\Models\Post;
use PDO;

class PostManager
{
    private Post $post;
    private PDO $bdd;

    function __construct()
    {
        $this->post = new Post();
        $this->bdd = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function add_post(string $img_name)
    {
        $sql = "INSERT INTO `post` (`id`, `user_id`, `title`, `label`, `img`, `date`) VALUES (?, ?, ?, ?, ?,NOW())";

        $result = $this->bdd->prepare($sql);
        $result->execute([
            uniqid(),
            $_SESSION["user"]["id"],
            htmlspecialchars($_POST["title"]),
            htmlspecialchars($_POST["label"]),
            $img_name
        ]);
    }

    function get_all_post(): array
    {
        $sql = "SELECT * FROM `post`";
        $result = $this->bdd->prepare($sql);
        $result->execute();

        //put data in class
        return $result->fetchAll(PDO::FETCH_CLASS, "BlogObjMvc\Models\Post");
    }

    function get_one_post(string $post_id): Post
    {
        $sql = "SELECT * FROM post WHERE id = ?";
        $result = $this->bdd->prepare($sql);
        $result->execute([$post_id]);

        //put data in class
        $result->setFetchMode(PDO::FETCH_CLASS, "BlogObjMvc\Models\Post");
        return $result->fetch(PDO::FETCH_CLASS);
    }

    function delete_post(string $post_id): void
    {
        $sql = "DELETE FROM post WHERE id = ?";
        $result = $this->bdd->prepare($sql);
        $result->execute([$post_id]);
    }

    function update_post(Post $post): void
    {
        $sql = "UPDATE post SET title = ?, label = ?, img = ? WHERE id = ?";
        $result = $this->bdd->prepare($sql);
        $result->execute([
            $post->getTitle(),
            $post->getLabel(),
            $post->getImg(),
            $post->getId()
        ]);
    }
}