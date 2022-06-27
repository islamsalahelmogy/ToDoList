<div class="col col-lg-8 col-xl-10">
        <div class="card rounded-3">
            <div class="card-body p-4">

            <h4 class="text-center my-3 pb-3">To Do App</h4>

                        <button type="button" class="btn btn-primary m-auto d-block" data-bs-toggle="modal" data-bs-target="#add_task">
                        Add
                        </button>


                <table class="table mb-4">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">priority</th>
                        <th scope="col">Status</th>
                        <th scope="col">Description</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Assigned</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                        <td>{{$task->title}}</td>
                        <td>{{$task->priority}}</td>
                        <td>{{$task->status}}</td>
                        <td>{{nl2br($task->description)}}</td>
                        <td>{{$task->start_date}}</td>
                        <td>{{$task->end_date}}</td>
                        <td>
                        @foreach ($task->users as $user)
                            {{$user->name}}<br>
                        @endforeach
                        </td>
                        <td>
                        
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#task-edit-{{$task->id}}">
                        Edit
                        </button>
                        <button type="button" wire:click="delete({{$task->id}})" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>


        <!-- Modal add task -->
        <div class="modal fade" id="add_task" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Task</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @livewire('add-task')
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal edit task -->
        @foreach ($tasks as $task)
            <div class="modal fade" id="task-edit-{{$task->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @livewire('edit-task',['task_id'=>$task->id],key('task_'.$task->id))
                    </div>
                        
                    </div>
                </div>
            </div>
        @endforeach
        
</div>