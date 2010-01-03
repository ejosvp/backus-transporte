<?php

class ChoferTable extends Doctrine_Table
{
  public function getChoferesEmpresa($empresa_id)
  {
    $q = Doctrine_Query::create()
      ->from('Chofer j')
      ->where('j.empresa_id = ?', $empresa_id);
    $c = $q->execute();
    return $c;
  }
}