<?php
/**
 * Created by PhpStorm.
 * User: pericles
 * Date: 25/08/18
 * Time: 02:29
 */

App::uses('AppModel', 'Model');

class Tarefa extends AppModel
{
    public $name = 'Tarefa';
    public $useTable = 'tarefas';
    public $primaryKey = 'id';
    public $validate = array(
        'titulo' => array(
            'tituloRule' => array(
                'rule' => array('minLength', 3),
                'message' => 'Minimo 3 caracteres'
            )
        ),
        'ordem' => array(
            'rule' => array('naturalNumber', true),
            'allowEmpty'=> true
        )
    );
}