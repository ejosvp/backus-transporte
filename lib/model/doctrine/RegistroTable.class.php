<?php

class RegistroTable extends Doctrine_Table
{
  public function getRegistrosActivos()
  {
    $q = $this->createQuery('c')
      ->where('c.estado = ?', 0);
    return $q->execute();
  }
  public function getPorDescargar()
  {
    $q = $this->createQuery('c')
      ->where('c.estado = ?', 1);
    return $q->execute();
  }
  public function getPorCargar()
  {
    $q = $this->createQuery('c')
      ->where('c.estado = ?', 1)
      ->orWhere('c.estado = ?', 2);
    return $q->execute();
  }
}