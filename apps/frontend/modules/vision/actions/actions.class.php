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
    $this->registros = Doctrine::getTable('Registro')->getVision();
  }
}
