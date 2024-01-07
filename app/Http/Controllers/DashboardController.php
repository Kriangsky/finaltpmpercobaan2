<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function data(){
        $data['title'] = 'Dashboard';
        return view('navbarlogin/dashboard', $data);
    }
}
