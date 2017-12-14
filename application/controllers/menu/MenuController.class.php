<?php

class MenuController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    $render = (new UserSession)->getAll();// Permet de rester connecté
    $render['flashbag']= new FlashBag;// Mettre sur toutes les pages

$menu = new ItemSoldModel(new Database) ;
$enumList = ['entrée','plat','dessert','boisson'];
foreach($enumList as $key=>$value)
{
  $render['menu']["$value"] = $menu->getMeal(["$value"]);
}

var_dump($render);
    return $render;

  }
  public function httpPostMethod(Http $http, array $queryFields)
  {

  }
}


?>
