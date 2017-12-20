<?php

  class OrderModel extends AbstractModel
  {

    const SQL_NEW_ORDER =
    "INSERT INTO `orders` (`userId`)
    VALUES (?)";

    const SQL_NEW_ORDER_LINE =
    "INSERT INTO `orderDetails` (`itemSoldId`,`orderLineNumber`,`orderNumber`,`quantityOrdered`)
    VALUES (?,?,?,?)";

    const SQL_GET_CLIENT_ORDER_LIST=
    "SELECT `id`, `orderDate`, `status` FROM `orders` WHERE userID=?";

    const SQL_GET_ORDER_DETAILS=
    "SELECT O.`id`, O.`userId`, I.`name`, I.`description`, OD.`quantityOrdered`, I.`salePrice`, (I.`salePrice`* OD.`quantityOrdered`) AS 'Price' FROM `orders` AS O
    INNER JOIN `orderDetails` as OD ON OD.`orderNumber`=O.`id`
    INNER JOIN `itemSold` as I ON I.`id`=OD.`itemSoldId`
    WHERE O.`id`=?`
    ORDER BY DESC";

    CONST SQL_GET_LAST_ORDERS =
    "SELECT * FROM `orders`
    ORDER BY `orderDate` DESC
    LIMIT 8";


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

    public function getClientOrderList(array $queryFields)
    {
      $result=$this->database->query(self::SQL_GET_CLIENT_ORDER_LIST,$queryFields);
      return($result);
    }

    public function getLastOrder(array $queryFields = array())
    {
      $result=$this->database->query(self::SQL_GET_LAST_ORDERS,$queryFields);
      return($result);
    }

    public function getOrderDetails(array $queryFields)
    {
      $result = $this->database->query(self::SQL_GET_ORDER_DETAILS($queryFields));
      return($result);
    }



  }

 ?>
