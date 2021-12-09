<?php

namespace App\Entity;

class Post{
    private $idPost;
    private $title;
    private $content;
    private $author;
    private $authorUserName;
    private $date;

    public function getIdPost(): ?int
    {
        return $this->idPost;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getAuthor(): ?int
    {
        return $this->author;
    }

    public function setAuthor(int $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getAuthorUserName(): ?string
    {
        return $this->authorUserName;
    }

    public function setAuthorUserName(string $authorUserName): self
    {
        $this->authorUserName = $authorUserName;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

}