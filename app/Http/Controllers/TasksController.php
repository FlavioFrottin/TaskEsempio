<?php

namespace App\Http\Controllers;

use App\User;
use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    	
    	//return $tasks;
    	$users = User::all();
    	
    	
    	$search = \Request::get('Stringa-di-Ricerca');
    	$tasks = Task::where('titolo','like','%'.$search.'%')->orderBy('titolo')->paginate(3);
    	//$tasks = Task::with('user')->paginate(5);
    	return view('index',compact('tasks','users'));
    	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
    	$this->validate($request,[
    			
    			'titolo'=>'required',
    			'corpo'=>'required',
    			'utente_id'=>'required',
    	]);
        
    	Task::create(['titolo'=>$request->titolo,
    	              'corpo'=>$request->corpo,
    			      'utente_id'=>$request->utente_id,
    	]);
    	
    	return back();
    	
    	
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
        $task->update([
        		
        		'completo'=>true,
        		
        ]);
        
        return back();
    	
    	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();
        
        return back();
    	
    	
    }
}
