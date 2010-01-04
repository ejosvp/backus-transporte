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
  public function executeIndex(sfWebRequest $request)
  {
    $this->operacions = Doctrine::getTable('Registro')->getPorCargar();
  }

  public function executeDescarga(sfWebRequest $request)
  {
    $this->registros = Doctrine::getTable('Registro')->getPorDescargar();
    $this->titulo = "Descarga";
    $this->setTemplate('index');
  }

  public function executeCarga(sfWebRequest $request)
  {
    $this->registros = Doctrine::getTable('Registro')->getPorCargar();
    $this->titulo = "Carga";
    $this->setTemplate('index');
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
    $this->form = new OperacionForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new OperacionForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->redirect('operacion/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $operacion = $form->save();

      $this->redirect('operacion/edit?id='.$operacion->getId());
    }
  }
}
