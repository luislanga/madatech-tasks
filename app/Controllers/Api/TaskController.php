<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TaskModel;

class TaskController extends ResourceController
{
    protected $modelName = 'App\Models\TaskModel';
    protected $format    = 'json';

    // GET /api/tasks
    public function index()
    {
        $model = new TaskModel();
        $tasks = $model->findAll();

        return $this->respond($tasks);
    }

    // GET /api/task/{id}
    public function show($id = null)
    {
        $model = new TaskModel();
        $task = $model->find($id);

        if (!$task) {
            return $this->failNotFound('Task not found');
        }

        return $this->respond($task);
    }

    // POST /api/task
    public function create()
    {
        $validationConfig = include APPPATH . 'Controllers/helpers/TaskValidation.php';
        $validation = \Config\Services::validation();
    
        if (!$this->validate($validationConfig['rules'], $validationConfig['messages'])) {
            return $this->failValidationErrors($validation->getErrors());
        }
    
        $model = new TaskModel();
        $data = $this->request->getJSON();
    
        $insertedId = $model->insert($data);
    
        return $this->respondCreated([
            'message' => 'Task created successfully',
            'data'    => array_merge((array) $data, ['id' => $insertedId])
        ]);
    }

    // PUT /api/task/{id}
    public function update($id = null)
    {
        $model = new TaskModel();
        $task = $model->find($id);

        if (!$task) {
            return $this->failNotFound('Task not found');
        }

        $validationConfig = include APPPATH . 'Controllers/helpers/TaskValidation.php';
        $validation =  \Config\Services::validation();

        if (!$this->validate($validationConfig['rules'], $validationConfig['messages'])) {
            return $this->failValidationErrors($validation->getErrors());
        }

        $data = $this->request->getJSON();
        $model->update($id, $data);

        return $this->respond([
            'message' => 'Task updated successfully',
            'data'    => $data
        ]);
    }

    // DELETE /api/task/{id}
    public function delete($id = null)
    {
        $model = new TaskModel();
        $task = $model->find($id);

        if (!$task) {
            return $this->failNotFound('Task not found');
        }

        $model->delete($id);

        return $this->respondDeleted([
            'message' => 'Task deleted successfully'
        ]);
    }
}