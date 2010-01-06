<?php

/**
 * Registro
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    transporte
 * @subpackage model
 * @author     ejosvp
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class Registro extends BaseRegistro
{
  public function getTurno()
  {
    if ($this->getDateTimeObject('created_at')->format('G') < sfConfig::get('app_cambio_turno'))
      return "1";
    else
      return "2";
  }
  public function getGuia()
  {
    return $this->getGuia1()."/".$this->getGuia1();
  }
}