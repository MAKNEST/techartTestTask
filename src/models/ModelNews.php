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
        $query = "SELECT `id`, `date`, `title`, `announce`, `image` FROM `news` ORDER BY `date` DESC LIMIT :limit OFFSET :offset";

        $params = [
            [
                "param" => ":limit",
                "value" => (int) $limit,
                "param_type" => PDO::PARAM_INT,
            ],
            [
                "param" => ":offset",
                "value" => (int) $offset,
                "param_type" => PDO::PARAM_INT,
            ],
        ];

        // $query = "SELECT `id`, `date`, `title`, `announce`, `image` FROM `news` ORDER BY `date` DESC LIMIT ? OFFSET ?";

        // $params = [
        //     $limit,
        //     $offset,
        // ];

        return $this->query($this->db, $query, $params) ?? null;
    }

    public function getOne($id)
    {
        $query = "SELECT * FROM `news` WHERE id = :id";

        $params = [
            [
                "param" => ":id",
                "value" => (int) $id,
                "param_type" => PDO::PARAM_INT,
            ],
        ];

        return $this->query($this->db, $query, $params)[0] ?? null;
    }

    public function getLatest()
    {
        $query = "SELECT `id`, `title`, `announce`, `image` FROM `news` ORDER BY `date` DESC LIMIT :limit";

        $params = [
            [
                "param" => ":limit",
                "value" => (int) 1,
                "param_type" => PDO::PARAM_INT,
            ],
        ];

        return $this->query($this->db, $query, $params) ?? null;
    }

    public function getCountNews()
    {
        $query = "SELECT COUNT(`id`) FROM `news`";
        return $this->query($this->db, $query, [])[0]['COUNT(`id`)'] ?? null;
    }
}