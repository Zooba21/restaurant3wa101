<?php

class RegistreController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    $render['flashbag']= new FlashBag;
    return $render;
  }
  public function httpPostMethod(Http $http, array $queryFields)
  {
    if ($queryFields['password']==$queryFields['passwordControl'])
    {
      $account = new AccountCreationModel(new Database);
      $userEntry = [$queryFields['firstName'],$queryFields['name'],$queryFields['mail']];

      try
      {
          $lastId = $account->createUser($userEntry);
      }
      catch (ErrorException $e)
      {
        $flashBag = new Flashbag;
        $flashBag->add("Le mail saisi existe déjà, veuilez en saisir un autre");
        $http->redirectTO('user/registre');
      }

      $passWordForm = [$queryFields['password'],$lastId];
      $account->createPassword($passWordForm);

      $session = new UserSession;
      $loginForm =[$queryFields['mail'],$queryFields['password']];
      var_dump($loginForm);

      $newAccount = (new UserModel(new Database))->login($loginForm);
      var_dump($newAccount);

      $session->create($newAccount);

      $http->redirectTO('profile');
    }
    else {
      $flashBag = new Flashbag;
      $flashBag->add("Les mots de passes ne correspondent pas");
      $http->redirectTO('registre');
     }



  }
}


?>
