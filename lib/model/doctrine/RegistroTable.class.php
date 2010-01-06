<?php

class RegistroTable extends Doctrine_Table
{
  public function getPorIngresar()
  {
    $q = $this->createQuery('c')
      ->where('c.estado = ?', 0)
      ->leftJoin('c.Tracto t')
      ->leftJoin('c.Carreta a')
      ->leftJoin('c.Chofer h')
      ->leftJoin('c.Lugar l')
      ->leftJoin('c.Empresa e')
      ->leftJoin('c.TipoCarga r')
      ->leftJoin('c.Motivo m')
      ->leftJoin('r.Area j')
      ->leftJoin('c.TipoCarga i');
    return $q->execute();
  }
  public function getPorDescargar()
  {
    $q = $this->createQuery('c')
      ->leftJoin('c.Motivo m')
      ->leftJoin('c.Chofer h')
      ->leftJoin('c.Tracto t')
      ->where('c.estado = ?', 1);
    return $q->execute();
  }
  public function getPorCargar()
  {
    $q = $this->createQuery('c')
      ->leftJoin('c.Motivo m')
      ->leftJoin('c.Chofer h')
      ->leftJoin('c.Tracto t')
      ->where('c.estado = ?', 3);
    return $q->execute();
  }
  public function getPorSalir()
  {
    $q = $this->createQuery('c')
      ->where('c.estado = ?', 5);
    return $q->execute();
  }
}