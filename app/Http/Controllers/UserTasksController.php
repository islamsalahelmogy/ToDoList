<?php

namespace App\Http\Controllers;

use App\Models\UserTasks;
use App\Http\Requests\StoreUserTasksRequest;
use App\Http\Requests\UpdateUserTasksRequest;

class UserTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreUserTasksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserTasksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function show(UserTasks $userTasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTasks $userTasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserTasksRequest  $request
     * @param  \App\Models\UserTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserTasksRequest $request, UserTasks $userTasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTasks  $userTasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTasks $userTasks)
    {
        //
    }
}
