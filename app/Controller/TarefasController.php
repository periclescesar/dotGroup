<?php
/**
 * Created by PhpStorm.
 * User: pericles
 * Date: 25/08/18
 * Time: 02:33
 */

class TarefasController extends AppController
{
    public $components = array('RequestHandler');

    public function index()
    {
        $tarefas = $this->Tarefa->find('all',  array(
            'order' => array('ordem'=> 'asc')
        ));

        $this->set(array(
            'tarefas' => $tarefas,
            '_serialize' => array('tarefas')
        ));
    }

    public function view($id)
    {
        $tarefa = $this->Tarefa->findById($id);
        $this->set(array(
            'tarefa' => $tarefa,
            '_serialize' => array('tarefa')
        ));
    }

    public function add()
    {
        $this->Tarefa->create();
        if ($this->Tarefa->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function edit($id)
    {
        $this->Tarefa->id = $id;
        if ($this->Tarefa->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function delete($id)
    {
        if ($this->Tarefa->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
}