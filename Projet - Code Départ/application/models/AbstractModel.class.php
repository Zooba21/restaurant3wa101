<?php

abstract class AbstractModel implements ModelInterface
{
  public function __construct(Database $db)
  {
    $this->database=$db;
  }

/*  abstract function create(array $field);
  abstract function find(int $id);
  abstract function delete(ind $id);*/
}
