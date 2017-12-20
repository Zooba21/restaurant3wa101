<?php

/**
 * Exécute une requête permettant de récupérer la liste des items disponibles. Une requête est lancée pour chaque catégorie mentionnée dans le tableau $enumList.
 */
class MenuController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    $render = (new UserSession)->getAll();// Permet de rester connecté
    if (empty($_GET));
    {
      $render['flashbag']= new FlashBag;// Mettre sur toutes les pages

      $menu = new ItemSoldModel(new Database) ;
      $enumList = ['entrée','plat','dessert','boisson'];


      foreach($enumList as $key=>$value)
      {
        $render['menu']["$value"] = $menu->getMeal(["$value"]);
      }

    }

    return $render;

  }
  public function httpPostMethod(Http $http, array $queryFields)
  {


    $render = (new UserSession)->getAll();// Permet de rester connecté
    $render['flashbag']= new FlashBag;// Mettre sur toutes les pages
    if (!isset($render['user']))
    {
        $flashBag= (new FlashBag)->add("Vous devez être connecté pour pouvoir ajouer des produits à votre panier");
        $http->redirectTo("user/registre");
    }
      $menu = new ItemSoldModel(new Database) ;
      $enumList = ['entrée','plat','dessert','boisson'];


      foreach($enumList as $key=>$value)
      {
        $render['menu']["$value"] = $menu->getMeal(["$value"]);
      }

var_dump($queryFields['id']);
if (!isset($_SESSION['cart']))
{
  $_SESSION['cart'] = [['id'=>$queryFields['id'],'quantity'=>1]];
}
else
{
  $find = 0;
  foreach($_SESSION['cart'] as $key=>$value)
  {
    foreach($value as $innerKey=>$innerValue)
    {
      if ($innerKey=='id')
      {

        if ($innerValue==$queryFields['id'])
        {

          $_SESSION['cart'][$key]['quantity']++;
          $find++;
          var_dump($find);
          break;
        }
      }
    }
  }
  if ($find == 0)
  {
    $newItemCart = ['id'=>$queryFields['id'],'quantity'=>1];
    var_dump($newItemCart);
    array_push($_SESSION['cart'],$newItemCart);
  }
}


    //  array_push($_SESSION['cart'],$queryFields['id']);


    //  $flashBag = (new FlashBag)->add("Votre article a bien été ajouté au panier !");
var_dump($_SESSION['cart']);

    return $render;
  }
}


?>
