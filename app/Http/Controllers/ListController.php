<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use App\Routines\Lists\Save;
use App\Routines\Lists\Update;
use App\Routines\Lists\Delete;
use App\Routines\Lists\Restore;
use Illuminate\Http\Request;

class ListController extends Controller
{

    public function index()
    {
        return Lists::orderBy('created_at', 'DESC')->get();
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
