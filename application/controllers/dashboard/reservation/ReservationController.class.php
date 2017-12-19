<?php

class ReservationController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    $render = (new UserSession)->getAll();
    $acces = new AccessModel(new Database);

    $acces->verifyAcces($http, $render, "Employed");
    return($render);
  }
  public function httpPostMethod(Http $http, array $queryFields)
  {

  }
}

 ?>
