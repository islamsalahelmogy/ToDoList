<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddTask extends Component
{
    public $users;
    public $title;
    public $priority;
    public $status;
    public $description;
    public $start_date;
    public $end_date;
    public $users_assigned =[];
    

    protected $rules = [
        'title' => 'required|max:50',
        'priority' => 'required|max:50',
        'description' => 'required|max:255',
        'status' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
    ];
    public function add()
    {
        $today = new DateTime('today');
        $start = new DateTime($this->start_date) ;
        $finish = new DateTime($this->end_date) ;

        $data = $this->validate();

        if($start < $today) 
        {
            session()->flash('error', "Start date must not before today");
        }
        elseif ($start > $finish)
        {
            session()->flash('error', "Start date must not after end date");
        } 
        else 
        {   
            $task= Task::create($data);
            $task->users()->attach(Auth::user()->id);
            if($this->users_assigned !=null)
            {
                $task->users()->attach($this->users_assigned);
            }
            $this->emit('DeleteModal');
            $this->emitTo(Tasks::class,'refreshTasks');

        }
    }

    public function render()
    {
        $this->users=User::all()->except(Auth::user()->id);
        return view('livewire.add-task');
    }
}