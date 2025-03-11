<?php

require_once __DIR__ . "/Base.php";
class FavouriteModel extends BaseModel
{
    public $table = 'favourite';
    public function __construct()
    {
        parent::__construct();
    }

    public function addToFav(int $userId, int $productId)
    {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (user_id,product_id) VALUES (:userid,:productid)");
        $stmt->execute([
            ':userid' => $userId,
            ':productid' => $productId
        ]);
    }
    public function removeFromFav(int $userId, int $productId)
    {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE user_id = :userid and product_id = :productid");
        $stmt->execute([
            ':userid' => $userId,
            ':productid' => $productId
        ]);
    }


    public function getFav(int $userId)
    {
        $stmt  = $this->conn->prepare("SELECT * FROM $this->table JOIN products on products.id = $this->table.product_id WHERE user_id = :userid");
        $stmt->execute([':userid' => $userId]);
        $result = $stmt->fetchAll();
        return $result;
    }
}
