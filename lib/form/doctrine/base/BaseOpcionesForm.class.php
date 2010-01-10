<?php

/**
 * Opciones form base class.
 *
 * @method Opciones getObject() Returns the current form's model object
 *
 * @package    transporte
 * @subpackage form
 * @author     ejosvp
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseOpcionesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'    => new sfWidgetFormInputHidden(),
      'name'  => new sfWidgetFormInputText(),
      'value' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'    => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'name'  => new sfValidatorString(array('max_length' => 40)),
      'value' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('opciones[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Opciones';
  }

}
