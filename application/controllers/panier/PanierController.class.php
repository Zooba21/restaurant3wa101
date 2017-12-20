<?php

class PanierController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    $render = (new UserSession)->getAll();
    $render['flashbag']= new FlashBag;
    if (isset($_SESSION['cart']))
    {
      $cartClass = new CartModel(new Database);

      $render['cart'] = [];
      $productList = $_SESSION['cart'];

      foreach($productList as $value)
      {
        $result=$cartClass->getCartEntry($value['id']);
        $result['quantity']=$value['quantity'];
        array_push($render['cart'],$result);
      }
    }


    return($render);
  }
  public function httpPostMethod(Http $http, array $queryFields)
  {

  }
}


?>
