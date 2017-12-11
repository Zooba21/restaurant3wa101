<?php

class LoginController
{
  public function httpGetMethod()
  {

  }

  public function httpPostMethod(Http $http, array $queryFields)
  {
    $login = new UserModel(new Database);

    $loginForm = [$queryFields['email'],$queryFields['passwd']];
    $result = $login->login($loginForm);

    if ($queryFields['email'] == $result['mail'] && $queryFields['passwd'] == $result['password'])
    {
      
    }
    else
    {

    }

  }

}


 ?>
