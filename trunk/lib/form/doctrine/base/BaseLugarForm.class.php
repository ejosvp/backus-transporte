<?php

/**
 * Lugar form base class.
 *
 * @method Lugar getObject() Returns the current form's model object
 *
 * @package    transporte
 * @subpackage form
 * @author     ejosvp
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseLugarForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'tipo_lugar_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoLugar'), 'add_empty' => false)),
      'name'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'tipo_lugar_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoLugar'))),
      'name'          => new sfValidatorString(array('max_length' => 40)),
    ));

    $this->widgetSchema->setNameFormat('lugar[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lugar';
  }

}
