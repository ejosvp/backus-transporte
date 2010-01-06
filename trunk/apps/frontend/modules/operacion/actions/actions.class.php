<?php

/**
 * operacion actions.
 *
 * @package    transporte
 * @subpackage operacion
 * @author     ejosvp
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class operacionActions extends sfActions
{
  public function executeDescarga(sfWebRequest $request)
  {
    $this->registros = Doctrine::getTable('Registro')->getPorDescargar();
    $this->titulo = "Descarga";
    $this->getUser()->setAttribute('tipo',0);
    $this->setTemplate('index');
  }

  public function executeCarga(sfWebRequest $request)
  {
    $this->registros = Doctrine::getTable('Registro')->getPorCargar();
    $this->titulo = "Carga";
    $this->getUser()->setAttribute('tipo',1);
    $this->setTemplate('index');
  }

  public function executeInicio(sfWebRequest $request)
  {
    $tipo = $this->getUser()->getAttribute('tipo');
    $super = $this->getUser()->getGuardUser()->getSupervisor();
    $registro = $this->getRoute()->getObject();
    if($tipo == '0')
      $registro->setEstado(2);
    else
      $registro->setEstado(4);
    $registro->save();
    $operacion = new Operacion();
    $operacion->setRegistro($registro);
    $operacion->setSupervisor($super);
    $operacion->setTipo($tipo);
    $operacion->save();
    return sfView::NONE;
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new OperacionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new OperacionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $registro = $this->getRoute()->getObject();
    $this->graba($registro);
    $operacion = $registro->getOperacion();
    $this->form = new OperacionForm($operacion);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new OperacionForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    //$this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->redirect('operacion/index');
  }

  protected function graba($registro)
  {
    $operacion = $registro->getOperacion();
    $tipo = $operacion->getTipo();
    if($tipo == '0')
      $registro->setEstado(3);
    else
      $registro->setEstado(5);
    $registro->save();
    $operacion->setTerminoAt(date('Y-m-d H:i:s', time()));
    $operacion->save();
    return sfView::NONE;
  }
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $operacion = $form->save();

      //$this->redirect('operacion/edit?id='.$operacion->getId());
    }
  }
}