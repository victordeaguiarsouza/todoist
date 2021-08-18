<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Commons\Contents\Content;
use Illuminate\Support\Facades\Auth;
use App\Routines\Tasks\Save;
use App\Routines\Tasks\Update;
class TaskController extends Controller
{

    public function index()
    {
        return Task::orderBy('created_at', 'DESC')->get();
    }

    public function store(Request $request)
    {
        return (new Save())->execute($request);
    }

    public function update(Request $request, $id)
    {   
        return (new Update())->execute($request, $id);
    }

    public function destroy($id)
    {
        //
    }
}
