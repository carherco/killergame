<?php

/**
 * KillJugadores filter form base class.
 *
 * @package    killer
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseKillJugadoresFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_departamento'     => new sfWidgetFormPropelChoice(array('model' => 'KillDepartamentos', 'add_empty' => true)),
      'alias'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'foto'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'usuario'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contrasena'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_victima'          => new sfWidgetFormPropelChoice(array('model' => 'KillJugadores', 'add_empty' => true)),
      'confirmacion_muerte' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'activo'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre'              => new sfValidatorPass(array('required' => false)),
      'id_departamento'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'KillDepartamentos', 'column' => 'id')),
      'alias'               => new sfValidatorPass(array('required' => false)),
      'foto'                => new sfValidatorPass(array('required' => false)),
      'usuario'             => new sfValidatorPass(array('required' => false)),
      'contrasena'          => new sfValidatorPass(array('required' => false)),
      'email'               => new sfValidatorPass(array('required' => false)),
      'descripcion'         => new sfValidatorPass(array('required' => false)),
      'id_victima'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'KillJugadores', 'column' => 'id')),
      'confirmacion_muerte' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'activo'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('kill_jugadores_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'KillJugadores';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'nombre'              => 'Text',
      'id_departamento'     => 'ForeignKey',
      'alias'               => 'Text',
      'foto'                => 'Text',
      'usuario'             => 'Text',
      'contrasena'          => 'Text',
      'email'               => 'Text',
      'descripcion'         => 'Text',
      'id_victima'          => 'ForeignKey',
      'confirmacion_muerte' => 'Number',
      'activo'              => 'Number',
    );
  }
}
