<?php
/**
 * Description of IngresoFormclass
 *
 * @author ejosvp
 */
class IngresoForm extends RegistroForm
{
  public function configure()
  {
    $this->fields();
    $this->widgetSchema['ingreso'] = new sfWidgetFormInputHidden();
  }
  protected function fields()
  {
    $this->useFields(array(
      'ingreso_at'
    ));
  }
}

