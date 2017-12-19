<?php

class CartModel extends AbstractModel
{

  const SQL = "SELECT `name`, `itemType`, `description`, `salePrice` FROM `itemSold` WHERE `id`=?";

  public function getCartEntry($queryFields)
  {
    $result = $this->database->QueryOne(self::SQL,[$queryFields]);
    return($result);
  }

}

 ?>
