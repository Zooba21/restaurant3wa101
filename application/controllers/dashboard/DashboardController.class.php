<?php

class DashBoardController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    $render = (new UserSession)->getAll();
    $acces = new AccessModel(new Database);

    $acces->verifyAcces($http, $render, "Employed");




     /*
     * Méthode appelée en cas de requête HTTP GET
     *
     * L'argument $http est un objet permettant de faire des redirections etc.
     * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
     */
      return $render;
  }
  public function httpPostMethod(Http $http, array $queryFields)
  {

  }
}

 ?>
