<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'string|required|max:1000',
            'comment' => 'string|nullable|max:100000',
            'date' => 'required|date',
            'mins_spent' => 'required|numeric'
        ]);

        $task = Task::create([
            'user_id' => Auth::user()->id,
            'title' => $validated['title'],
            'comment' => $validated['comment'],
            'date' => $validated['date'],
            'mins_spent' => $validated['mins_spent']
        ]);
        if($task){
            return redirect()->route('home');
        }
    }

    public function destroy(Task $task)
    {
        $this->authorize('destroy', $task);
        $result = $task->delete();
        return response()->json([
            'success' => 'Task deleted successfully',
            'tasks_left' => auth()->user()->task()->count(),
        ]);
    }
}
