<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Routines\Tasks\Save;
use App\Routines\Tasks\Update;
use App\Routines\Tasks\Delete;
use App\Routines\Tasks\Restore;
class TaskController extends Controller
{

    public function index()
    {
        return Task::orderBy('created_at', 'DESC')->paginate(15);
    }

    public function store(Request $request)
    {
        return (new Save())->execute($request);
    }

    public function update(Request $request, int $id)
    {
        return (new Update())->execute($request, $id);
    }

    public function destroy(int $id)
    {
        return (new Delete())->execute($id);
    }

    public function restore(int $id)
    {
        return (new Restore())->execute($id);
    }
}
