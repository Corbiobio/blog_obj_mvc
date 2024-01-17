<?php

namespace BlogObjMvc\Models;

class Post
{
    private string $id;
    private string $user_id;
    private string $title;
    private string $label;
    private string $img;
    private string $date;

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }
    public function setUser_id($id): void
    {
        $this->id = $id;
    }

    public function getUser_id(): string
    {
        return $this->user_id;
    }

    public function setTitle($title): void
    {
        $this->title = htmlspecialchars($title);
    }

    public function getTitle(): string
    {
        return trim($this->title);
    }
    public function setLabel($label): void
    {
        $this->label = htmlspecialchars($label);
    }

    public function getLabel(): string
    {
        return trim($this->label);
    }
    public function setImg($img): void
    {
        $this->img = $img;
    }

    public function getImg(): string
    {
        return $this->img;
    }
    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getDate(): string
    {
        return $this->date;
    }
}

?>