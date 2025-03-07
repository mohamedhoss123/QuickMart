<?php

require_once "../../models/Category.php";
require_once "../../helpers/controller.php";
require_once "../../middleware/isAdminAuthed.php";


get(function () {
    $category = new CategoryModel();
    $categories = $category->findAll();
    response($categories,200);
});


post(function () {
    $data = validate(["name"=>"string"],getRequestBody());
    $category = new CategoryModel();
    $category->create(...$data);
    response(["message"=>"Category created successfully"],200);

});


put(function () {
    $data = validate(["name"=>"string","id"=>"number"],getRequestBody());

    $category = new CategoryModel();
    $category->update($data["id"],$data["name"]);
    response(["message"=>"Category updated successfully"],200);
});

delete(function () {
    
    $data = validate(["id"=>"number"],getQueryParams());
    $category = new CategoryModel();
    $category->deleteById($data["id"]);
    response(["message"=>"Category deleted successfully"],200);
});