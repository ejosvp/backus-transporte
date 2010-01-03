<?php

/**
 * Tracto form base class.
 *
 * @method Tracto getObject() Returns the current form's model object
 *
 * @package    transporte
 * @subpackage form
 * @author     ejosvp
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTractoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'placa'         => new sfWidgetFormInputText(),
      'peso'          => new sfWidgetFormInputText(),
      'configuracion' => new sfWidgetFormInputText(),
      'propia'        => new sfWidgetFormInputCheckbox(),
      'tara'          => new sfWidgetFormInputText(),
      'tipo_unidad'   => new sfWidgetFormInputText(),
      'empresa_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'placa'         => new sfValidatorString(array('max_length' => 8)),
      'peso'          => new sfValidatorNumber(),
      'configuracion' => new sfValidatorString(array('max_length' => 10)),
      'propia'        => new sfValidatorBoolean(),
      'tara'          => new sfValidatorInteger(),
      'tipo_unidad'   => new sfValidatorString(array('max_length' => 15)),
      'empresa_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'))),
    ));

    $this->widgetSchema->setNameFormat('tracto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tracto';
  }

}
