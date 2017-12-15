<?php

class UpdatepasswordController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {


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
    $render = (new UserSession)->getAll();
    $update = new UpdateUserModel(new Database);
    $flashbag = new Flashbag;
    var_dump($queryFields);

    if ($queryFields['password'] == $queryFields['confirmPassword'])
    {
      $queryFields['id']=$render['user']['id'];
      $result = $update->updatePassword($queryFields);
      var_dump($result);
      if (!$result)
      {
        $flashbag->add("L'ancien mot de passe est incorrect.");
        $http->redirectTo('profile');
      }
      else
      {
        $flashbag->add("Le mot de passe a bien été modifié.");
        $http->redirectTo('profile');
      }
    }
    else
    {
      $flashbag->add("Les mots de passes ne correspondent pas. Veuillez réessayer.");
      $http->redirectTo('profile');
    }

  }
}

?>
