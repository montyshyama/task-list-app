<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index() {
    	
    	$tasks = Task::all();
    	return view('tasks.index', compact('tasks'));
    }
    
    public function store(Request $request) {

 		$request->validate([
 			'title' => 'required'
 		]);

 		Task::Create([
 			'title' => $request->title
 		]);

 		session()->flash('msg', 'Task has been added');
 		return redirect('/');
    }

    public function destroy($id) {

    	Task::destroy($id);
    	return redirect()->back()->with('msg', 'Task has been deleted');
    }
}
