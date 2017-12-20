<?php

  class OrderModel extends AbstractModel
  {

    const SQL_NEW_ORDER =
    "INSERT INTO `orders` (`userId`)
    VALUES (?)";

    const SQL_NEW_ORDER_LINE =
    "INSERT INTO `orderDetails` (`itemSoldId`,`orderLineNumber`,`orderNumber`,`quantityOrdered`)
    VALUES (?,?,?,?)";

    public function createOrder(array $queryFields = array())
    {

      $result = $this->database->executeSql(self::SQL_NEW_ORDER,$queryFields);
      return($result);
    }

    public function createOrderLine(array $queryFields)
    {
      $result = $this->database->executeSql(self::SQL_NEW_ORDER_LINE,$queryFields);
      return($result);
    }

  }

 ?>
