<?php

/**
 * BaseOperacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $registro_id
 * @property integer $supervisor_id
 * @property string $observacion
 * @property integer $tipo
 * @property timestamp $termino_at
 * @property Supervisor $Supervisor
 * @property Registro $Registro
 * 
 * @method integer    getId()            Returns the current record's "id" value
 * @method integer    getRegistroId()    Returns the current record's "registro_id" value
 * @method integer    getSupervisorId()  Returns the current record's "supervisor_id" value
 * @method string     getObservacion()   Returns the current record's "observacion" value
 * @method integer    getTipo()          Returns the current record's "tipo" value
 * @method timestamp  getTerminoAt()     Returns the current record's "termino_at" value
 * @method Supervisor getSupervisor()    Returns the current record's "Supervisor" value
 * @method Registro   getRegistro()      Returns the current record's "Registro" value
 * @method Operacion  setId()            Sets the current record's "id" value
 * @method Operacion  setRegistroId()    Sets the current record's "registro_id" value
 * @method Operacion  setSupervisorId()  Sets the current record's "supervisor_id" value
 * @method Operacion  setObservacion()   Sets the current record's "observacion" value
 * @method Operacion  setTipo()          Sets the current record's "tipo" value
 * @method Operacion  setTerminoAt()     Sets the current record's "termino_at" value
 * @method Operacion  setSupervisor()    Sets the current record's "Supervisor" value
 * @method Operacion  setRegistro()      Sets the current record's "Registro" value
 * 
 * @package    transporte
 * @subpackage model
 * @author     ejosvp
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseOperacion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('operacion');
        $this->hasColumn('id', 'integer', null, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             ));
        $this->hasColumn('registro_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('supervisor_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('observacion', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('tipo', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '1',
             ));
        $this->hasColumn('termino_at', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Supervisor', array(
             'local' => 'supervisor_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT'));

        $this->hasOne('Registro', array(
             'local' => 'registro_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}