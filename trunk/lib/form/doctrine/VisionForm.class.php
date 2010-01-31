<?php

/**
 * Registro form.
 *
 * @package    transporte
 * @subpackage form
 * @author     ejosvp
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VisionForm extends BaseForm
{
  public function configure()
  {
    /** Widgets **/
    $this->setWidgets(array(
      'fecha' => new sfWidgetFormJQueryDate(array(
        'culture' => 'es',
        'image'   => '/images/icon/date.png',
      ))
    ));
    /** Validators **/
  }
}
