<?php
require_once __DIR__ . '/../database/Database.php';

class ModelNews extends Model
{
    private $db = null;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnect();
    }

    public function getAll($limit, $offset)
    {
        $query = "SELECT `id`, `date`, `title`, `announce`, `image` FROM `news` ORDER BY `date` DESC LIMIT $limit OFFSET $offset";
        return $this->query($this->db, $query) ?? null;
    }

    public function getOne($id)
    {
        $query = "SELECT * FROM `news` WHERE id=$id";
        return $this->query($this->db, $query)[0] ?? null;
    }

    public function getLatest()
    {
        $query = "SELECT `id`, `title`, `announce`, `image` FROM `news` ORDER BY `date` DESC LIMIT 1";
        return $this->query($this->db, $query);
    }

    public function getCountPages()
    {
        $query = "SELECT COUNT(`id`) FROM `news`";
        return $this->query($this->db, $query)[0]['COUNT(`id`)'];
    }
}