<?php

class RegistreController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    var_dump($queryFields);
    $account = new AccountCreationModel;
  }
  public function httpPostMethod(Http $http, array $queryFields)
  {

  }
}


?>
