<?php

class RegistreController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

  }
  public function httpPostMethod(Http $http, array $queryFields)
  {
    var_dump($_POST);
    var_dump($queryFields);
    $account = new AccountCreationModel;
  }
}


?>
