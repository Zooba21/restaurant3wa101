<?php

class LoginController
{
  public function httpGetMethod()
  {

  }

  public function httpPostMethod(Http $http, array $queryFields)
  {
    $login = new UserModel(new Database);

    $loginForm = [$queryFields['email']];
    $result = $login->login($loginForm);

    if ($queryFields['email'] == $result['mail'] && $queryFields['passwd'] == $result['password'])
    {
      
      if ($result['rights'] == "Employed")
      {

      }
      else
      {

      }
    }
    else
    {

    }

  }

}


 ?>
