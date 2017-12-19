<?php

class AccessModel extends AbstractModel
{
  /**
   * Permet de vérifier les privilèges utilisateurs afin de rediriger vers la page d'accueil si un utilisateur essaie d'accéder à une page non autorisée.
   * @param  Http   $http   [class http permettant l'application de la méthode redirect]
   * @param  [array] $render [tableau de session contenant les privilèges utilisateurs]
   * @param  [string] $level [niveau de droit à vérifier]
   * @return [type]         [description]
   */
  public function verifyAcces(Http $http, $render, $level)
  {
    $flashbag = new FlashBag;
  if (isset($render['user']))
  {
    if ($render['user']['rights'] != $level)
    {
      $flashbag->add("accès refusé. Vous devez être administrateur pour accéder à cette page");
      $http->redirectTo('');
    }
  }
  else
  {
    $flashbag->add("accès refusé, veuillez vous connecter");
    $http->redirectTo('');
  }
}

}

 ?>
