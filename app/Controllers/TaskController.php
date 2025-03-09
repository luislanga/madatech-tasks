<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{

    public function index()
    {
        $model = new TaskModel();
        $tasks = $model->findAll();
        return view('tasks/index', ['title' => 'Lista de Tarefas', 'tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks/create', ['title' => 'Lista de Tarefas']);
    }

    public function createNewTask()
    {
        $validationConfig = include APPPATH . 'Controllers/helpers/TaskValidation.php';
        helper(['form']);

        if (!$this->validate($validationConfig['rules'], $validationConfig['messages'])) {
            return view('tasks/create', [
                'errors' => $this->validator->getErrors(),
                'old'    => $this->request->getPost()
            ]);
        }

        $model = new TaskModel();
        $model->save($this->request->getPost());
        return redirect()->to('/')->with('success', 'Tarefa criada com sucesso!');
    }


    public function edit($id)
    {
        $model = new TaskModel();
        $task = $model->find($id);
        return view('tasks/edit',  ['task' => $task]);
    }

    public function editTask($id)
{
    $model = new TaskModel();
    $task = $model->find($id);

    if (!$task) {
        return redirect()->to('/')->with('error', 'Task not found');
    }

    $validationConfig = include APPPATH . 'Controllers/helpers/TaskValidation.php';
    helper(['form']);

    if (!$this->validate($validationConfig['rules'], $validationConfig['messages'])) {
        return view('tasks/edit', [
            'errors' => $this->validator->getErrors(),
            'task'   => $task,
            'old'     => $this->request->getPost()
        ]);
    }

    $model->update($id, $this->request->getPost());
    return redirect()->to('/')->with('success', 'Task updated successfully');
}


    public function delete($id)
    {
        $model = new TaskModel();
        $model->delete($id);
        return redirect()->to('/');
    }
}
