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
        return Lists::select(
                    'lists.name  AS list_name',
                    'users.name  AS user_name',
                    'users.email AS user_email'
                )
               ->leftJoin('users_lists AS ul', 'lists.id', '=', 'ul.list_id')
               ->leftJoin('users', 'users.id', '=', 'ul.user_id')
               ->orderBy('lists.created_at', 'DESC')
               ->paginate(15);
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
