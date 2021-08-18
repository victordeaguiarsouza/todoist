<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use App\Routines\Lists\Save;
use App\Routines\Lists\Update;
use App\Routines\Lists\Delete;
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

    public function update(Request $request, $id)
    {
        return (new Update())->execute($request, $id);
    }

    public function destroy($id)
    {
        return (new Delete())->execute($id);
    }

    public function restore($id)
    {
        return (new Restore())->execute($id);
    }

}
