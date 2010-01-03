<?php

/**
 * Lugar filter form base class.
 *
 * @package    transporte
 * @subpackage filter
 * @author     ejosvp
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseLugarFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo_lugar_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoLugar'), 'add_empty' => true)),
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'tipo_lugar_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoLugar'), 'column' => 'id')),
      'name'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lugar_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lugar';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'tipo_lugar_id' => 'ForeignKey',
      'name'          => 'Text',
    );
  }
}
