<?php

class PanierController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    $render = (new UserSession)->getAll();
    $render['flashbag']= new FlashBag;

    $cartClass = new CartModel(new Database);
    if (!isset($_SESSION['cart']))
    {
      $flashBag = (new FlashBag)->add('Votre panier est vide pour le moment !');
      $http->redirectTo('panier');
    }
    else
    {
      $render['cart'] = [];
      $productList = $_SESSION['cart'];
      foreach($productList as $value)
      {
        $result=$cartClass->getCartEntry($value);
        array_push($render['cart'],$result);
      }
    }
    var_dump($render['cart']);
    return($render);
  }
  public function httpPostMethod(Http $http, array $queryFields)
  {

  }
}


?>
