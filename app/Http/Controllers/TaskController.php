<?php

namespace App\Http\Controllers;

use App\Http\Resources\Task as TaskResource;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskController extends Controller
{
    /**
     * return all tasks
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $tasks = Task::all();

        return TaskResource::collection($tasks);
    }

    /**
     * Update a task with PUT or
     * Create a new Task with POST
     *
     * @param Request $request
     * @return TaskResource
     */
    public function store(Request $request)
    {
        //load an existing or a new task depending on the request verb
        $task = $request->isMethod('put') ? Task::findOrFail($request->id) : new Task;

        if ($request->isMethod('put')) {
            $task->id = $request->input('id');
        }

        $task->name =                       $request->input('name');
        $task->description =                $request->input('description');
        $task->complete =                   $request->input('complete');
        $task->status_id =                  $request->input('status_id');
        $task->target_completion_date =     $request->input('target_completion_date');

        //if task save is successful, return the Task resource for the relevant task
        if ($task->save()) {
            return new TaskResource($task);
        }
    }

    /**
     * Return a single task
     *
     * @param $id
     * @return TaskResource
     */
    public function show($id)
    {
        //get the task
        $task = Task::findOrFail($id);

        //return the task as a resource
        return new TaskResource($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Delete a single task
     *
     * @param $id
     * @return TaskResource
     */
    public function destroy($id)
    {
        //get the task
        $task = Task::findOrFail($id);

        //if delete is successful, return the (now deleted) task as a resource
        //this provides details for confirmation messages
        if ($task->delete()) {
            return new TaskResource($task);
        }
    }
}
