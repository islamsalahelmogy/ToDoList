<form wire:submit.prevent='add'>
@if (session()->has('error'))
        <div class="col-lg-12 alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    <div class="form-group">
        <label for="title">Task title</label>
        <input type="text" wire:model.lazy='title' id="title" class="form-control"  placeholder="title" required>
        @error('title') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="priority">Priority</label>
        <select class="form-control" id="priority"  wire:model.lazy='priority' required>
            <option value="1">VIP</option>
            <option value="2">Important</option>
            <option value="3">Normal</option>
        </select>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" wire:model.lazy='status' required>
            <option value="Complete">Complete</option>
            <option value="In progress">In progress</option>
            <option value="To Do">To Do</option>
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" rows="3" wire:model.lazy='description' required></textarea>
        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="start_date">start date</label>
        <input type="datetime-local" class="form-control" id="start_date" wire:model.lazy='start_date' required>
            @error('start_date') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="end_date">End date</label>
        <input type="datetime-local" class="form-control" id="end_date" wire:model.lazy='end_date' required>
            @error('end_date') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="status">Assign Users</label>
        <select class="form-control" id="users_assigned" multiple wire:model.lazy='users_assigned'>
        @foreach ($users as $user )  
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">
        Add Task
        </button>
    </div>

</form>