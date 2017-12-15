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

    $loginForm = [$queryFields['email'],$queryFields['passwd']];
    $result = $login->login($loginForm);
    var_dump($result);

    if (!empty($result))
    {
      $session->create($result);
      if ($result['rights']=="Employed")
      {
        $target->redirectTO('dashboard');
      }
      else
      {
        $target->redirectTO('');
      }

    }
    else
    {
      $flashBag = new Flashbag;
      $flashBag->add("Identifiant ou mot de passe incorrect ! Veuillez réessayer.");
      $target->redirectTO('');
    }
  }

}


 ?>
