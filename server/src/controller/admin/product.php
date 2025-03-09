<?php

require_once "../../models/Product.php";
require_once "../../helpers/controller.php";
// require_once "../../middleware/isAdminAuthed.php";


get(function () {
    $params = getQueryParams();
    $product = new ProductModel();

    if (isset($params["id"])) {
        $product = $product->findById($params["id"]);
        if ($product) {
            response($product, 200);
        }
        response(["message" => "Product not found"], 404);
    }
    $product = $product->paginate();
    response($product, 200);
});


post(function () {
    $data = validate(["name" => "string", "price" => "number", "category_id" => "number", "stock_quantity" => "number"], getRequestBody());
    $product = new ProductModel();
    $product->create(...$data);
    $file = $_FILES['file'];

    $info = new SplFileInfo($file['name']);
    $destination =  "/var/www/html/public/" . generateUuidV4() . "." . $info->getExtension();
    if (move_uploaded_file($file['tmp_name'], $destination)) {
        response(["message" => "Product created successfully"], 200);
    } else {
        response(["error" => "File upload failed"], 500);
    }
});



delete(function () {

    $data = validate(["id" => "number"], getQueryParams());
    $product = new ProductModel();
    $product->deleteById($data["id"]);
    response(["message" => "Category deleted successfully"], 200);
});
