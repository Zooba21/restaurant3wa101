<?php


class LoginController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    return [];
  }
  public function httpPostMethod(Http $http, array $queryFields)
  {
    $login = new UserModel(new Database);
    $login->login($queryFields);
  }
}

 ?>
