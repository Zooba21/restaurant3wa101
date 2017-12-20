<?php

  class ProfileController
  {
    public function httpGetMethod(Http $http, array $queryFields)
    {
      $render = (new UserSession)->getAll();
      $render['flashbag']= new FlashBag;
      $order = new OrderModel(new Database);
      if (!isset($render['user']))
      {
        $flashbag= new Flashbag;
        $flashbag->add("Veuillez vous inscrire ou vous connecter pour accéder à cette page");
        $http->redirectTo('user/registre');
      }
      $orderList = $order->getClientOrderList([$render['user']['id']]);
      if($orderList)
      {
        $render['order']=$orderList;
        foreach($render['order'] as $key=>$value);
        {
          $render['order'][$key]['orderDetails']=$order->getOrderDetails([$value['id']]);
        }
          $render['user']['orderNumber']=count($render['order']);
      }
      else
      {
        $render['user']['orderNumber']=0;
      }




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

    	// return $render;
    }
  }

?>
