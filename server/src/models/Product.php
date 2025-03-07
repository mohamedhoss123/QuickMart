<?php
require_once __DIR__ . "/Base.php";


Class ProductModel extends BaseModel{
    public $table = "products";

    public function __construct()
    {
        parent::__construct();
    }

    public function create(string $name, int $category_id, int $price, int $stock_quantity): void
    {

        $stmt = $this->conn->prepare("INSERT INTO $this->table (name,category_id,price,stock_quantity) VALUES (:name,:category_id,:price,:stock_quantity)");
        $stmt->execute([
            ":name" => $name,
            ":category_id" => $category_id,
            ":price" => $price,
            ":stock_quantity" => $stock_quantity
        ]); 
    }
    public function paginate(): array  {    
        $stmt = $this->conn->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}