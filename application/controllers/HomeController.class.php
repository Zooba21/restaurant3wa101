<?php

class HomeController /*implements ControllerInterface*/
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      $session = new UserSession;
      
      if (isset($_SESSION['user']))
      {
        $render['user']=$_SESSION['user'];
      }
      else
      {
        $render = [];
      }

       /*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
    	  return $render;
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
       /*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
    	return [ ];
    }


}
