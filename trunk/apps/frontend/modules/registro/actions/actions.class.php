<?php

/**
 * registro actions.
 *
 * @package    transporte
 * @subpackage registro
 * @author     ejosvp
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registroActions extends sfActions
{
  public function executeReload($var)
  {
    $q = Doctrine_Query::create()
      ->from($var['objeto'].' j')
      ->where('j.'.$var['id'].' = ?', $var['inicio_id']);
    $datos = $q->execute();
    $op = "<option value=''></option>";
    foreach ($datos as $chofer)
    {
      $op = $op."<option value='".$chofer->getId()."'>".$chofer."</option>";
    }
    $this->renderText($op);
    return sfView::NONE;
  }

  public function executeLoad($var)
  {
    $q = Doctrine_Query::create()
      ->from($var['objeto'].' j')
      ->where('j.id = ?', $var['inicio_id']);
    $datos = $q->execute();
    if($var['id'] == 'propia')
      if($datos[0][$var['id']]==1)
        $datos[0][$var['id']]='<img src="/images/icon/propio.png" alt="propio">';
      else
        $datos[0][$var['id']]='<img src="/images/icon/no-propio.png" alt="tercero">' ;
    $this->renderText($datos[0][$var['id']]);
    return sfView::NONE;
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->getUser()->setAttribute('activo', 'ingreso');
    $this->registros = Doctrine::getTable('Registro')->getPorIngresar();
  }

  public function executeIngreso(sfWebRequest $request)
  {
    $registro = $this->getRoute()->getObject();
    if($registro->getMotivo()->getTipo() == '0')
      $registro->setEstado('1');
    else
      $registro->setEstado('3');
    $registro->setIngresoAt(date('Y-m-d H:i:s',time()));
    $registro->save();
    return sfView::NONE;
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->getUser()->setAttribute('activo', 'registro');
    $this->formExtend = array(
      'area' => new sfWidgetFormDoctrineChoice(array(
        'model' => 'Area',
        'add_empty' => true,
      )),
      'tipo_lugar' => new sfWidgetFormDoctrineChoice(array(
        'model' => 'TipoLugar',
        'add_empty' => true,
      )),
      'area_default' => $request->getParameter('area',0),
      'tipo_lugar_default' => $request->getParameter('tipo_lugar',0),
    );
    $this->form = new RegistroForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->formExtend = array(
      'area' => new sfWidgetFormDoctrineChoice(array(
        'model' => 'Area',
        'add_empty' => true,
      )),
      'tipo_lugar' => new sfWidgetFormDoctrineChoice(array(
        'model' => 'TipoLugar',
        'add_empty' => true,
      )),
      'area_default' => $request->getParameter('area',0),
      'tipo_lugar_default' => $request->getParameter('tipo_lugar',0),
    );
    $this->form = new RegistroForm();

    $this->processForm($request, $this->form);
    $this->getUser()->setFlash('error', 'Problemas al guardar Registro');
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new RegistroForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new RegistroForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $registro = $form->save();
      $this->getUser()->setFlash('notice', 'Registro Satisfactorio');
      $this->redirect('registro/new');
    }
  }
}