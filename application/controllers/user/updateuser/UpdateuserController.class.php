<?php

  class UpdateuserController
  {
    public function httpGetMethod(Http $http, array $queryFields)
    {
      $render = (new UserSession)->getAll();
      $http->redirectTo('profile');



       /*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */

    	  return $render;
    }

/**
 * Mise à jour du profil utilisateur selon les informations saisies dans le formulaire.
 * @param  Http   $http       [description]
 * @param  array  $formFields [description]
 * @return [type]             [description]
 */
    public function httpPostMethod(Http $http, array $formFields)
    {
      
      /*Récupération de la session en cours*/
      $render = (new UserSession)->getAll();

      /*Déclaration des class*/
      $user = new UserModel(new Database);
      $update = new UpdateUserModel(new Database);

      /*Mise à jour du profil utilisateur*/
      $sqlString = $update->UpdateUser($formFields);

      /*Gestion du $_FILES*/
      if ($_FILES['avatar']['error']==0)
      {
        $inputFile=$_FILES['avatar'];
        $inputFile['id']=$render['user']['id'];
        $update->UpdateAvatar($inputFile);
      }

      /*Mise à jour du $_SESSION*/
      $result = $user->updateSession([$_SESSION['user']['mail']]);
      $_SESSION['user']=$result;
      $render['user']=$result;
       /*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
    	$http->redirectTo('profile');
    	return $render;
    }
  }

?>
