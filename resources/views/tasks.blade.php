@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
    @livewire('tasks')
    </div>
  </div>
</section>
@endsection


