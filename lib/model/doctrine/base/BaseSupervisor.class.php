<?php

/**
 * BaseSupervisor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $sf_guard_user_id
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property sfGuardUser $User
 * @property Doctrine_Collection $Operacion
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method integer             getSfGuardUserId()    Returns the current record's "sf_guard_user_id" value
 * @method string              getName()             Returns the current record's "name" value
 * @method string              getLastName()         Returns the current record's "last_name" value
 * @method string              getEmail()            Returns the current record's "email" value
 * @method sfGuardUser         getUser()             Returns the current record's "User" value
 * @method Doctrine_Collection getOperacion()        Returns the current record's "Operacion" collection
 * @method Supervisor          setId()               Sets the current record's "id" value
 * @method Supervisor          setSfGuardUserId()    Sets the current record's "sf_guard_user_id" value
 * @method Supervisor          setName()             Sets the current record's "name" value
 * @method Supervisor          setLastName()         Sets the current record's "last_name" value
 * @method Supervisor          setEmail()            Sets the current record's "email" value
 * @method Supervisor          setUser()             Sets the current record's "User" value
 * @method Supervisor          setOperacion()        Sets the current record's "Operacion" collection
 * 
 * @package    transporte
 * @subpackage model
 * @author     ejosvp
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseSupervisor extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('supervisor');
        $this->hasColumn('id', 'integer', null, array(
             'primary' => true,
             'type' => 'integer',
             'autoincrement' => true,
             ));
        $this->hasColumn('sf_guard_user_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('name', 'string', 40, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '40',
             ));
        $this->hasColumn('last_name', 'string', 40, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '40',
             ));
        $this->hasColumn('email', 'string', 60, array(
             'type' => 'string',
             'length' => '60',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'sf_guard_user_id',
             'foreign' => 'id'));

        $this->hasMany('Operacion', array(
             'local' => 'id',
             'foreign' => 'supervisor_id'));
    }
}