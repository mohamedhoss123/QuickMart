

<?php
require_once __DIR__ . "/Base.php";


class CategoryModel extends BaseModel {
    public $table ="categories";
    public $name;
    public function __construct()
    {
        parent::__construct();
    }

    public function create(string $name): void
    {

        $stmt = $this->conn->prepare("INSERT INTO $this->table (name) VALUES (:name)");
        $stmt->execute([
            ':name'=>$name
        ]);
    }

    public function delete(int $id){
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = :id ");
        $stmt->execute([':id'=>$id]);
    }
    public function update(int $id,string $name){
        $stmt = $this->conn->prepare("UPDATE $this->table SET name = :name WHERE id = :id ");
        $stmt->execute([':id'=>$id,":name"=>$name]);
    }
}