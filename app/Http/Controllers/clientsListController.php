<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class clientsListController extends Controller
{
    public function index()
    {
    	return view('admin.clients_list', [
            'clients' => DB::table('clients')
            ->join('users', 'users.id', '=', 'clients.user_id')
            ->paginate(5)
        ]);
    }

    public function ajax(Request $data)
    {
    	return view('layouts.datatable', [
            'clients' => DB::table('clients')
            ->join('users', 'users.id', '=', 'clients.user_id')
            ->where('user_id', 'like', '%'.$data['key'].'%')
            ->orWhere('username', 'like', '%'.$data['key'].'%')
            ->orWhere('first_name', 'like', '%'.$data['key'].'%')
            ->orWhere('last_name', 'like', '%'.$data['key'].'%')
            ->orWhere('email', 'like', '%'.$data['key'].'%')
            ->orWhere('address', 'like', '%'.$data['key'].'%')
            ->orWhere('phone', 'like', '%'.$data['key'].'%')
            ->paginate(5)
        ]);
    }
}
