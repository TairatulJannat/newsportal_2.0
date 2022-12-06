<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReporterController extends Controller
{
    //
     public function index()
     {
      
        return view('backend.users.reporter.reporter_index');

     }
}
