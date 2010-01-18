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
            ->where('c.estado = ?', 1)
            ->orWhere('c.estado = ?', 2);
    return $q->execute();
  }
  public function getPorCargar()
  {
    $q = $this->createQuery('c')
            ->leftJoin('c.Motivo m')
            ->leftJoin('c.Chofer h')
            ->leftJoin('c.Tracto t')
            ->where('c.estado = ?', 3)
            ->orWhere('c.estado = ?', 4);
    return $q->execute();
  }
  public function getPorSalir()
  {
    $q = $this->createQuery('c')
            ->leftJoin('c.Chofer h')
            ->leftJoin('c.Tracto t')
            ->leftJoin('c.Operaciones o')
            ->where('c.estado = ?', 5);
    return $q->execute();
  }
  public function getVision($fecha1 = false, $fecha2 = false)
  {
    if(!$fecha1)
      $fecha1 = time();
    if(!$fecha2)
      $fecha2 = $fecha1 + 86400;
    $q = $this->createQuery('c')
            ->leftJoin('c.Tracto t')
            ->leftJoin('c.Carreta q')
            ->leftJoin('c.Chofer h')
            ->leftJoin('c.Lugar l')
            ->leftJoin('c.Empresa e')
            ->leftJoin('c.TipoCarga r')
            ->leftJoin('c.Motivo m')
            ->leftJoin('r.Area j')
            ->leftJoin('c.TipoCarga i')
            ->leftJoin('c.Salida s')
            ->leftJoin('c.Operaciones o')
            ->where('c.created_at < ?',date('Y-m-d', $fecha2)." 00:00:00")
            ->andWhere('c.created_at > ?',date('Y-m-d', $fecha1)." 00:00:00");
    return $q->execute();
  }
}