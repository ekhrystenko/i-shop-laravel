<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function execute()
    {
        return view('index');
    }
}
