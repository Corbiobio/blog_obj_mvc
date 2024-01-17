<?php

namespace BlogObjMvc\Models;

class Post
{
    private $id;
    private $user_id;
    private $title;
    private $label;
    private $img;
    private $date;


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setUser_id($id)
    {
        $this->id = $id;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setTitle($title)
    {
        $this->title = htmlspecialchars($title);
    }

    public function getTitle()
    {
        return trim($this->title);
    }
    public function setLabel($label)
    {
        $this->label = htmlspecialchars($label);
    }

    public function getLabel()
    {
        return trim($this->label);
    }
    public function setImg($img)
    {
        $this->img = $img;
    }

    public function getImg()
    {
        return $this->img;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }
}

?>