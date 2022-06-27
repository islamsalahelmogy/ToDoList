<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditTask extends Component
{
    public $users;
    public $title;
    public $priority;
    public $status;
    public $description;
    public $start_date;
    public $end_date;
    public $users_assigned;
    public $old_start_date;
    public $old_end_date;
    public $old_users_assigned;
    public $task;

    protected $rules = [
        'title' => 'required|max:50',
        'priority' => 'required|max:50',
        'description' => 'required|max:255',
        'status' => 'required',
    ];

    public function mount($task_id)
    {
        $this->task=Task::find($task_id);
        $this->title=$this->task->title;
        $this->priority=$this->task->priority;
        $this->status=$this->task->status;
        $this->description=$this->task->description;
        $this->old_start_date=$this->task->start_date;
        $this->old_end_date=$this->task->end_date;
        $this->old_users_assigned=$this->task->users;  
        
    }
    
    public function updatedStartDate()
    {
            $this->validate(
                [
                    'start_date' => ['required'],
                    'end_date'   => ['required'] ,
                ]
            );
    }
    public function updatedEndDate()
    {
            $this->validate(
                [
                    'start_date' => ['required'],
                    'end_date'   => ['required'] ,
                ]
            );
    }

    public function edit()
    {
        $today = new DateTime('today');
        $start = new DateTime($this->start_date) ;
        $finish = new DateTime($this->end_date) ;

        $data = $this->validate($this->rules);
        if($this->start_date && $this->end_date){
            $data = array_merge(
                $data,
                [
                    'start_date' => $this->start_date,
                    'end_date' => $this->end_date,
                ]
            );
        }
        if(!empty($this->start_date) && $start < $today) 
        {
            session()->flash('error', "Start date must not before today");
        }
        elseif (!empty($this->end_date) && $start > $finish)
        {
            session()->flash('error', "Start date must not after end date");
        } 
        else 
        {   
            $this->task->update($data);
            if($this->users_assigned !=null)
            {
                $this->task->users()->detach($this->task->users);
                $this->task->users()->attach(Auth::user()->id);
                $this->task->users()->attach($this->users_assigned);
            }
            $this->emit('DeleteModal');
            $this->emitTo(Tasks::class,'refreshTasks');

        }
    }

    public function render()
    {
        $this->users=User::all()->except(Auth::user()->id);
        return view('livewire.edit-task');
    }
}
