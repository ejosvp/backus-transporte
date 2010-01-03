<?php

/**
 * BaseMotivo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $Registro
 * 
 * @method integer             getId()       Returns the current record's "id" value
 * @method string              getName()     Returns the current record's "name" value
 * @method Doctrine_Collection getRegistro() Returns the current record's "Registro" collection
 * @method Motivo              setId()       Sets the current record's "id" value
 * @method Motivo              setName()     Sets the current record's "name" value
 * @method Motivo              setRegistro() Sets the current record's "Registro" collection
 * 
 * @package    transporte
 * @subpackage model
 * @author     ejosvp
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseMotivo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('motivo');
        $this->hasColumn('id', 'integer', null, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             ));
        $this->hasColumn('name', 'string', 40, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '40',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Registro', array(
             'local' => 'id',
             'foreign' => 'motivo_id'));
    }
}