<?php

/**
 * Operacion form.
 *
 * @package    transporte
 * @subpackage form
 * @author     ejosvp
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OperacionForm extends BaseOperacionForm
{
  public function configure()
  {
    $this->fields();
  }
  protected function fields()
  {
    $this->useFields(array(
      'observacion',
    ));
  }
}
