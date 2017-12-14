<?php

  class ItemSoldModel extends AbstractModel
  {
    /**
     * [SQL String correspondant à la chaîne de caractère permettant de récupérer une adresse e-mail correspondant à ce qui a été inscrit dans le formulaire de connexion]
     * @var string
     */

    const SQL =
    "SELECT `type`, `name`, `url`, `alt`, `description`, `salePrice`
    FROM `itemSold`";

      public function getMeal(array $productFields)
      {
        var_dump($productFields);
        $result = $this->database->query(self::SQL, $productFields);
        var_dump($result);
        return($result);
      }

  }

 ?>
