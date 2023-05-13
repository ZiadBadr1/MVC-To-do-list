<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        //$tasks = Task::get ();
        return view('tasks.index',compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // first method
//        $task = new Task();
//        $task->title = $request->title;
//        $task->comment = $request->comment;
//        $task->save();
//        return response("added");

        // second method
        Task::create(
            [
                'title' => $request->title ,
                "comment" => $request->comment
            ]
        );
        // third method
        // this method work only if the name of field in table same that in input field (title --> title not title --> my_title)
//        Task::create(
//            $request->all()
//        );
        return redirect('tasks');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $tasks = Task::onlyTrashed()->get();
        return view("tasks.SoftDelete",compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::findorFail($id);
        return view("tasks.edit",compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,$id)
    {
        $task = Task::findorFail($id);
        // first method
//        $task->title = $request->title;
//        $task->comment = $request->comment;
//        $task->save();

        // second method
        $task->update(
            [
                'title' => $request->title,
                'comment' => $request->comment
            ]
        );
        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Task::findorFail($id)->delete();
//        Task::destroy($id);
        return redirect('tasks');
    }

    public function restore($id)
    {
        Task::withTrashed()->where('id',$id)->  restore();
        return redirect()->back();
    }
    public function delete($id)
    {
        Task::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();
    }

    public function showDeletedTask()
    {
        $tasks = Task::onlyTrashed()->get();
        return view("tasks.SoftDelete",compact('tasks'));
    }
}
