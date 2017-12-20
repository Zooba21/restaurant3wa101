<?php

class AddOrderController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    $render = (new UserSession)->getAll();

    if (isset($_SESSION['cart']))
    {
      $order = new OrderModel(new Database);
      $newOrderNumber = $order->createOrder([$render['user']['id']]);
      $x=1;
      foreach($_SESSION['cart'] as $key=>$value)
      {
        $orderLineInfo = [$value['id'],$x,$newOrderNumber,$value['quantity']];
        $order->createOrderLine($orderLineInfo);
        $x++;
      }
      $flashbag = (new FlashBag)->add("Commande bien enregistrée.");
      $http->redirectTo('');
    }
    else
    {
      $flashbag = (new FlashBag)->add("Votre panier est vide. Enregistrement de la commande impossible");
      $http->redirectTo('');
    }

  }
  public function httpPostMethod(Http $http, array $queryFields)
  {

    // $http->redirectTo('');

  }
}


?>
