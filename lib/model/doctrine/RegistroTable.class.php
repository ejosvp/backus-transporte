<?php

class RegistroTable extends Doctrine_Table
{
  public function getRegistrosActivos()
  {
    $q = $this->createQuery('c')
      ->where('c.estado = ?', 0);
    return $q->execute();
  }
}