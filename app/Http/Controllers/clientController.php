<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    	    'first_name' => 'Required|max:255',
    	    'last_name' => 'Required|max:255',
    	    'address' => 'Required|max:255',
    	    'phone' => 'Required|max:255',
    	    'contract_number' => 'Required|unique:App\Models\Client|max:255',
    	    'services' => '',
    	]);

    	

    }
}
