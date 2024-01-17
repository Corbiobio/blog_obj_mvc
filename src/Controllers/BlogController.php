<?php

namespace BlogObjMvc\Controllers;

use BlogObjMvc\Models\PostManager;

class BlogController
{

    private PostManager $post_manager;

    function __construct()
    {
        $this->post_manager = new PostManager();
    }

    function verif_if_user_connect(): void
    {
        if (!isset($_SESSION["user"]["name"])) {
            header("Location: /login");
        }
    }

    function index(): void
    {
        //show view home
        require VIEWS . "./Blog/home.php";
    }

    function showCreate(): void
    {
        $this->verif_if_user_connect();

        //show view create
        require VIEWS . "./Blog/create.php";
    }

    function createPost(): void
    {
        $this->verif_if_user_connect();

        //rename and move img
        $rd = rand(0, mt_getrandmax());
        $img_name = $rd . "_" . $_FILES["img"]["name"];
        $img_path = "./img/" . $img_name;

        move_uploaded_file($_FILES["img"]["tmp_name"], $img_path);

        $this->post_manager->add_post($img_name);

        header("Location: /dashboard/");
    }

    function showAllPost(): void
    {
        $posts = $this->post_manager->get_all_post();
        require VIEWS . "./Blog/all_post.php";
    }

    function showUpdate($slug): void
    {
        $this->verif_if_user_connect();

        $post = $this->post_manager->get_one_post($slug);
        require VIEWS . "./Blog/modify.php";
    }

    function deletePost($slug): void
    {
        $this->verif_if_user_connect();

        $result = $this->post_manager->get_one_post($slug);

        //if post exist
        if ($result) {
            $this->post_manager->delete_post($slug);

            //delete img
            unlink("./img/" . $result->getImg());
        }

        $this->showAllPost();
    }

    function updatePost($slug): void
    {
        $this->verif_if_user_connect();

        $result = $this->post_manager->get_one_post($slug);

        //if post exist
        if ($result) {

            $result->setTitle($_POST["title"]);
            $result->setLabel($_POST["label"]);

            if ($_FILES["img"]["error"] == 0) {


                //delete previews img
                unlink("./img/" . $result->getImg());

                //rename and move new img
                $rd = rand(0, mt_getrandmax());
                $img_name = $rd . "_" . $_FILES["img"]["name"];
                $img_path = "./img/" . $img_name;

                move_uploaded_file($_FILES["img"]["tmp_name"], $img_path);

                //set new img
                $result->setImg($img_name);
            }
            $this->post_manager->update_post($result);
        }

        $this->showAllPost();
    }
}


