<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use App\Models\Client;

class clientController extends Controller
{
    public function create(Request $data)
    {
    	$data->validate([
    	    'username' => 'Required|unique:App\Models\Client|max:255',
    	    'password' => 'Required|min:8|max:255',
    	    'email' => 'Required|unique:App\Models\User|max:255|email:rfc',
    	    'first_name' => 'Required|string|max:255',
    	    'last_name' => 'Required|string|max:255',
    	    'address' => 'Required|string|max:255',
    	    'phone' => 'Required|max:255',
    	    'services' => '',
    	]);

        $name = $data->first_name.' '.$data->last_name;
        $U_entry = new User;
        $U_entry->name = $name;
        $U_entry->email = $data->email;
        $U_entry->password = Hash::make($data->password);
        $U_entry->save();

        $C_entry = new Client;
        $C_entry->user_id = $U_entry->id;
        $C_entry->username = $data->username;
        $C_entry->first_name = $data->first_name;
        $C_entry->last_name = $data->last_name;
        $C_entry->address = $data->address;
        $C_entry->phone = $data->phone;
        $C_entry->save();

        return redirect(route('create_client'))->with('success', ' ');
    }

    public function index()
    {
        return view('admin.create_client');
    }
}
