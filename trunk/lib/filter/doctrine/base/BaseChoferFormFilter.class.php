<?php

/**
 * Chofer filter form base class.
 *
 * @package    transporte
 * @subpackage filter
 * @author     ejosvp
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseChoferFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'brevete'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'empresa_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'telefono'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'brevete'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'empresa_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('chofer_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Chofer';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'name'       => 'Text',
      'telefono'   => 'Number',
      'brevete'    => 'Number',
      'empresa_id' => 'ForeignKey',
    );
  }
}
