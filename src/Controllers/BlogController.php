<?php

namespace BlogObjMvc\Controllers;

use BlogObjMvc\Models\BlogManager;

class BlogController
{

    private $blog_manager;

    function __construct()
    {
        $this->blog_manager = new BlogManager();
    }

    function index()
    {
        require VIEWS . "./Blog/home.php";
    }
}


?>