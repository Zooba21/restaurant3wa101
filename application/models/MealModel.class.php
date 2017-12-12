<?php

Class MealModel extends AbstractModel
{
  /**
   * Fonction destinée à chercher un meal particulier correspondant à $id passé en paramètre.
   * @param  string $id [id demandé]
   * @return [type]     [description]
   */
  public function findOne(string $id)
  {
    const SQL = "SELECT * FROM `itemssold` WHERE `id=?`"
    $values=[$id];
    $this->queryOne(self::SQL,$values);
  }

  public function findAll()
  {
    const SQL = "SELECT * FROM `itemssold`"
    $this->query(self::SQL);
  }


}

?>
