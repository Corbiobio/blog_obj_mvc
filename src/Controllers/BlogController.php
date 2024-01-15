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
        $img_name = $_FILES["img"]["name"];
        $rd = rand(0, mt_getrandmax());
        $img_path = "./img/" . $rd . "_" . $img_name;

        move_uploaded_file($_FILES["img"]["tmp_name"], $img_path);

        $this->post_manager->add_post();

        // header("Location: /dashboard/" . $slug);
    }
}


