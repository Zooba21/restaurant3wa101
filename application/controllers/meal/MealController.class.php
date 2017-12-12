<?php
  /**
   * [Class permettant de générer la page /meal qui renvoi les meals disponibles sur le site]
   */
  class MealController
  {
    public function httpGetMethod(Http $http, array $queryFields)
    {
      $id = $queryFields['id'];
      $entity = new MealModel(new Database);
      $result = $entity->findOne($id);
    }

  }

 ?>
