<?php

/**
 * salida actions.
 *
 * @package    transporte
 * @subpackage salida
 * @author     ejosvp
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class salidaActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->getUser()->setAttribute('activo', 'salida');
		$this->registros = Doctrine::getTable('Registro')->getPorSalir();
	}

	public function executeNew(sfWebRequest $request)
	{
		$registro = $this->getRoute()->getObject();
		$this->form = new SalidaForm();
		$this->form->setDefault('registro_id', $registro->getId());
		$this->form->setDefault('chofer_id', $registro->getChofer()->getId());
		$this->form->setDefault('tracto_id', $registro->getTracto()->getId());
		$this->form->setDefault('carreta_id', $registro->getCarreta()->getId());
		$this->reg_id = $registro->getId();
	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->registro = Doctrine::getTable('Registro')->find($request->getParameter('reg_id'));
		
		$this->form = new SalidaForm();

		$this->processForm($request, $this->form);

		$this->reg_id = $this->registro->getId();
		$this->setTemplate('new');
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->form = new SalidaForm($this->getRoute()->getObject());
	}

	public function executeUpdate(sfWebRequest $request)
	{
		$this->form = new SalidaForm($this->getRoute()->getObject());

		$this->processForm($request, $this->form);

		$this->setTemplate('edit');
	}

	public function executeDelete(sfWebRequest $request)
	{
		$request->checkCSRFProtection();

		$this->getRoute()->getObject()->delete();

		$this->redirect('salida/index');
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$this->registro->setEstado(6);
			$this->registro->save();
			$salida = $form->save();

			$this->redirect('salida');
		}
	}
}
