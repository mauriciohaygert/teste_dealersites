<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\User;

class UsersController extends Controller
{

    public function index(Request $request) {
        $users = User::withCount('user_access')->orderby('name')->paginate(10);
            
        return view('users.index', ['users' => $users]);
    }

    public function filtrar(Request $request) {

        $input = $request->all();

        $users = User::withCount(['user_access' =>  function (Builder $query) use ($input){
                $query->wherebetween('last_login', [ $input['dt_inicio'] ?? 0, $input['dt_fim'] ?? now() ] );
            }]);
            if ($input['nome']) $users = $users->where('name', 'like', '%'.$input['nome'].'%');
            if ($input['orderby']) $users = $users->orderby($input['orderby'], $input['sort'] ?? 'asc');
            $users = $users->orderby('name', $input['name_sort'] ?? 'asc')
                ->paginate($input['paginacao'] ?? 10);

        return view('users.tabela', compact('users'));
}
    
    
    
}