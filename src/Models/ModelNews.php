<?php

namespace Models;

use Core\Model;
use Core\Database;

class ModelNews extends Model
{
    private $db = null;
    
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnect();
    }

    public function getAllNews($newsOnPage, $offset)
    {
        $query = "SELECT `id`, `date`, `title`, `announce`, `image` FROM `news` ORDER BY `date` DESC LIMIT $newsOnPage OFFSET $offset;";
        return $this->query($this->db, $query) ?? null;
    }

    public function getOneNews($id)
    {
        $query = "SELECT * FROM `news` WHERE id=$id";
        return $this->query($this->db, $query)[0] ?? null;
    }

    public function getLatestNews()
    {
        $query = "SELECT `id`, `title`, `announce`, `image` FROM `news` ORDER BY `date` DESC LIMIT 1";
        return $this->query($this->db, $query);
    }

    public function getCountPages($newOnPage)
    {
        $query = "SELECT COUNT(`id`) FROM `news`";
        return ceil($this->query($this->db, $query)[0]['COUNT(`id`)'] / $newOnPage);
    }
}