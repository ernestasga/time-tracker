<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['home']);
    }
    public function index(){
        
        return view('pages.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home(){
        $tasks = auth()->user()->task();
        $total_tasks = $tasks->count();
        $tasks = $tasks->paginate(10);
        return view('pages.home', compact('tasks', 'total_tasks'));
    }
}
