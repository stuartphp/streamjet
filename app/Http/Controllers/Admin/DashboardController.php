<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(session()->has('company_id'))
        {
          return view('admin.dashboard');
        }
        return redirect('companies');
    }

}
