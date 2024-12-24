<?php

namespace domain\Services;

use App\Models\Todo;
use GuzzleHttp\Psr7\Request;

class TodoService
{
    protected $task;

    public function __construct()
    {
        $this->task = new Todo();
    }

    public function all()
    {
        return $this->task->all();
    }

    public function store($data)
    {
        // dd($request);
        $this->task->create($data);
    }
    public function delete($task_id)
    {
        $task = $this->task->find($task_id);
        $task->delete();
    }

    public function done($task_id){
        $task = $this->task->find($task_id);
        $task->done = 1;
        $task->update();
    }
}
