<?php
session_start();
require __DIR__ . "/vendor/autoload.php";

$router = new \CoffeeCode\Router\Router(ROOT);
$router->namespace("Source\App")->group("/");
$router->get("/", "Web:home");
$router->get("/create", "Web:create", "web.create");
$router->post("/create", "Web:store", "web.store");
$router->get("/edit/{id}", "Web:edit", "web.edit");
$router->post("/edit/{id}", "Web:update", "web.update");
$router->post("/delete/", "Web:destroy", "web.destroy");


$router->namespace("Source\App")->group("/ops");
$router->get("/{errcode}", "Web:error");

$router->dispatch();

if($router->error()){
    $router->redirect("/ops/{$router->error()}");

}