<?php

/**
 * BaseSalida
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $registro_id
 * @property integer $chofer_id
 * @property integer $tracto_id
 * @property integer $carreta_id
 * @property integer $tipo_carga_id
 * @property integer $lugar_id
 * @property integer $cantidad
 * @property string $guia1
 * @property string $guia2
 * @property string $observacion
 * @property Registro $Registro
 * @property Chofer $Chofer
 * @property Tracto $Tracto
 * @property Carreta $Carreta
 * @property Lugar $Lugar
 * @property TipoCarga $TipoCarga
 * 
 * @method integer   getId()            Returns the current record's "id" value
 * @method integer   getRegistroId()    Returns the current record's "registro_id" value
 * @method integer   getChoferId()      Returns the current record's "chofer_id" value
 * @method integer   getTractoId()      Returns the current record's "tracto_id" value
 * @method integer   getCarretaId()     Returns the current record's "carreta_id" value
 * @method integer   getTipoCargaId()   Returns the current record's "tipo_carga_id" value
 * @method integer   getLugarId()       Returns the current record's "lugar_id" value
 * @method integer   getCantidad()      Returns the current record's "cantidad" value
 * @method string    getGuia1()         Returns the current record's "guia1" value
 * @method string    getGuia2()         Returns the current record's "guia2" value
 * @method string    getObservacion()   Returns the current record's "observacion" value
 * @method Registro  getRegistro()      Returns the current record's "Registro" value
 * @method Chofer    getChofer()        Returns the current record's "Chofer" value
 * @method Tracto    getTracto()        Returns the current record's "Tracto" value
 * @method Carreta   getCarreta()       Returns the current record's "Carreta" value
 * @method Lugar     getLugar()         Returns the current record's "Lugar" value
 * @method TipoCarga getTipoCarga()     Returns the current record's "TipoCarga" value
 * @method Salida    setId()            Sets the current record's "id" value
 * @method Salida    setRegistroId()    Sets the current record's "registro_id" value
 * @method Salida    setChoferId()      Sets the current record's "chofer_id" value
 * @method Salida    setTractoId()      Sets the current record's "tracto_id" value
 * @method Salida    setCarretaId()     Sets the current record's "carreta_id" value
 * @method Salida    setTipoCargaId()   Sets the current record's "tipo_carga_id" value
 * @method Salida    setLugarId()       Sets the current record's "lugar_id" value
 * @method Salida    setCantidad()      Sets the current record's "cantidad" value
 * @method Salida    setGuia1()         Sets the current record's "guia1" value
 * @method Salida    setGuia2()         Sets the current record's "guia2" value
 * @method Salida    setObservacion()   Sets the current record's "observacion" value
 * @method Salida    setRegistro()      Sets the current record's "Registro" value
 * @method Salida    setChofer()        Sets the current record's "Chofer" value
 * @method Salida    setTracto()        Sets the current record's "Tracto" value
 * @method Salida    setCarreta()       Sets the current record's "Carreta" value
 * @method Salida    setLugar()         Sets the current record's "Lugar" value
 * @method Salida    setTipoCarga()     Sets the current record's "TipoCarga" value
 * 
 * @package    transporte
 * @subpackage model
 * @author     ejosvp
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseSalida extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('salida');
        $this->hasColumn('id', 'integer', null, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             ));
        $this->hasColumn('registro_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('chofer_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('tracto_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('carreta_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('tipo_carga_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('lugar_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('cantidad', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('guia1', 'string', 15, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '15',
             ));
        $this->hasColumn('guia2', 'string', 15, array(
             'type' => 'string',
             'length' => '15',
             ));
        $this->hasColumn('observacion', 'string', null, array(
             'type' => 'string',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Registro', array(
             'local' => 'registro_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT'));

        $this->hasOne('Chofer', array(
             'local' => 'chofer_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT'));

        $this->hasOne('Tracto', array(
             'local' => 'tracto_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT'));

        $this->hasOne('Carreta', array(
             'local' => 'carreta_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT'));

        $this->hasOne('Lugar', array(
             'local' => 'lugar_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT'));

        $this->hasOne('TipoCarga', array(
             'local' => 'tipo_carga_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}