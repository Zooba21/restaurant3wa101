<?php
/**
 * [LoginController description]
 */
class LoginController
{
  public function httpGetMethod()
  {

  }
  /**
   * [httpPostMethod Opère la vérification du formulaire de connexion et remplit le cas échéant la variable $_SERVER (id utilisateur et niveau de droits) puis redirige l'utilisateur sur la page d'accueil.]
   * @param  Http   $http        [Type de requête (GET ou POST)]
   * @param  array  $queryFields [Contenu du $_POST]
   * @return [void]              [pas de return]
   */
  public function httpPostMethod(Http $http, array $queryFields)
  {
    $login = new UserModel(new Database);
    $target = new Http;
    $session = new UserSession;

    $loginForm = [$queryFields['email']];
    $result = $login->login($loginForm);
    var_dump($result);

    if ($queryFields['email'] == $result['mail'] && $queryFields['passwd'] == $result['password'])
    {
      $session->create($result);
      $target->redirectTO('');
    }
    else
    {
      echo('erreur : identifiant ou mot de passe incorrecte');
    }
  }

}


 ?>
