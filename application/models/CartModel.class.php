<?php


class CartModel extends AbstractModel
{

  const SQL = "SELECT `name`, `itemType`, `description`, `salePrice` FROM `itemSold` WHERE `id`=?";

/**
 * Permet de récupérer une entrée produit selon son id
 * @param  [array] $queryFields doit uniquement contenir l'id du produit recherché.
 * @return [string]              string contenat l'id du produit recherché
 */
  public function getCartEntry(string $queryFields)
  {
    $result = $this->database->QueryOne(self::SQL,[$queryFields]);
    return($result);
  }

}

 ?>
