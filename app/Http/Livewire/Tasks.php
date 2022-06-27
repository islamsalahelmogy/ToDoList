<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Tasks extends Component
{
    public $tasks;

    protected $listeners = [
        'refreshTasks' => '$refresh'            
    ];
    public function delete($id)
    {
        $task=Task::find($id);
        $task->users()->detach();
        $task->delete();

        $this->emit('$refresh');
    }
    public function render()
    {
        $user=Auth::user();
        $this->tasks=$user->tasks;
        return view('livewire.tasks');
    }
    
}
