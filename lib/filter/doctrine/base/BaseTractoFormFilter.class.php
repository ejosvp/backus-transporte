<?php

/**
 * Tracto filter form base class.
 *
 * @package    transporte
 * @subpackage filter
 * @author     ejosvp
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTractoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'placa'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'peso'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'configuracion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'propia'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'tara'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo_unidad'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'empresa_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Empresa'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'placa'         => new sfValidatorPass(array('required' => false)),
      'peso'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'configuracion' => new sfValidatorPass(array('required' => false)),
      'propia'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'tara'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tipo_unidad'   => new sfValidatorPass(array('required' => false)),
      'empresa_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Empresa'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('tracto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tracto';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'placa'         => 'Text',
      'peso'          => 'Number',
      'configuracion' => 'Text',
      'propia'        => 'Boolean',
      'tara'          => 'Number',
      'tipo_unidad'   => 'Text',
      'empresa_id'    => 'ForeignKey',
    );
  }
}
