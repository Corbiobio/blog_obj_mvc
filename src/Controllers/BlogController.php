<?php

namespace BlogObjMvc\Controllers;

use BlogObjMvc\Models\PostManager;

class BlogController
{

    private $post_manager;

    function __construct()
    {
        $this->post_manager = new PostManager();
    }

    function index()
    {
        //show view home
        require VIEWS . "./Blog/home.php";
    }

    function showCreate()
    {
        //show view create
        require VIEWS . "./Blog/create.php";
    }

    function createPost()
    {
        //rename and move img
        $rd = rand(0, mt_getrandmax());
        $img_name = $rd . "_" . $_FILES["img"]["name"];
        $img_path = "./img/" . $img_name;

        move_uploaded_file($_FILES["img"]["tmp_name"], $img_path);

        $this->post_manager->add_post($img_name);

        header("Location: /dashboard/");
    }

    function showAllPost()
    {
        $posts = $this->post_manager->get_all_post();
        require VIEWS . "./Blog/all_post.php";
    }

    function deletePost($slug)
    {
        $result = $this->post_manager->get_one_post($slug);

        //if post exist
        if ($result) {
            $this->post_manager->delete_post($slug);

            //delete img
            unlink("./img/" . $result->getImg());
        }

        $this->showAllPost();
    }
}


