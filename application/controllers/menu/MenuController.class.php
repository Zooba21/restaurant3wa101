<?php

/**
 * Exécute une requête permettant de récupérer la liste des items disponibles. Une requête est lancée pour chaque catégorie mentionnée dans le tableau $enumList.
 */
class MenuController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    $render = (new UserSession)->getAll();// Permet de rester connecté
    if (empty($_GET));
    {
      $render['flashbag']= new FlashBag;// Mettre sur toutes les pages

      $menu = new ItemSoldModel(new Database) ;
      $enumList = ['entrée','plat','dessert','boisson'];


      foreach($enumList as $key=>$value)
      {
        $render['menu']["$value"] = $menu->getMeal(["$value"]);
      }

    }

    return $render;

  }
  public function httpPostMethod(Http $http, array $queryFields)
  {

  }
}


?>
