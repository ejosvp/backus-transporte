<?php

/**
 * vision actions.
 *
 * @package    transporte
 * @subpackage vision
 * @author     ejosvp
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class visionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->getUser()->setAttribute('activo', 'vision');
    if($request->getParameter('fecha'))
    {
      $fecha = $request->getParameter('fecha');
      $fecha = strtotime($fecha['day'].'-'.$fecha['month'].'-'.$fecha['year']);
    }
    else
    {
      $fecha = time();
    }
    $this->registros = Doctrine::getTable('Registro')->getVision($fecha);
    $this->fecha = $fecha;
    $this->form = new VisionForm();
    $this->estadistica = array(
      'atendidos' => Doctrine::getTable('Registro')->countEstadistica(6,$fecha),
      'ingreso'   => Doctrine::getTable('Registro')->countEstadistica(0,$fecha),
      'salida'    => Doctrine::getTable('Registro')->countEstadistica(5,$fecha),
    );
  }
}
