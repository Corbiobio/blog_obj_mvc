<?php

namespace BlogObjMvc\Models;

use BlogObjMvc\Models\Blog;

class BlogManager
{
    private $blog;

    function __construct()
    {
        $this->blog = new Blog();
    }
}

?>