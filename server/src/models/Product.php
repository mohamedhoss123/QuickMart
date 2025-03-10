<?php
require_once __DIR__ . "/Base.php";


Class ProductModel extends BaseModel{
    public $table = "products";

    public function __construct()
    {
        parent::__construct();
    }

    public function create(string $name, int $category_id, int $price, int $stock_quantity): int
    {

        $stmt = $this->conn->prepare("INSERT INTO $this->table (name,category_id,price,stock_quantity) VALUES (:name,:category_id,:price,:stock_quantity)");
        $stmt->execute([
            ":name" => $name,
            ":category_id" => $category_id,
            ":price" => $price,
            ":stock_quantity" => $stock_quantity
        ]); 
        return $this->conn->lastInsertId();
    }

    public function addImageToProduct(int $product_id, string $image_url, bool $is_main){
        $stmt = $this->conn->prepare("INSERT INTO product_images (product_id,image_url,is_main) VALUES (:product_id,:image_url,:is_main)");
        $stmt->execute([
            ":product_id" => $product_id,
            ":image_url" => $image_url,
            ":is_main" => $is_main ? 1 : 0
        ]); 
    }
    public function paginate(): array  {    
        $stmt = $this->conn->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}