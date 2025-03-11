<?php
require_once "../helpers/controller.php";
require_once "../middleware/isUserAuthed.php";
require_once "../models/Favourite.php";
get(function () use($session){
    $favourite = new FavouriteModel();
    $user_id = $session->data['id'];
    $favourites = $favourite->getFav($user_id);
    response($favourites,200);
});

post(function () use($session){
    $favourite = new FavouriteModel();
    $user_id = $session->data['id'];
    $data = validate(["product_id"=>"number"],getRequestBody());
    $favourite->addToFav($user_id,$data["product_id"]);
    response("Created",201);
});

delete(function () use($session){
    $favourite = new FavouriteModel();
    $user_id = $session->data['id'];
    $data = validate(["id"=>"number"],getQueryParams());
    $favourite->removeFromFav($user_id,$data["id"]);
    response("Deleted",200);
});