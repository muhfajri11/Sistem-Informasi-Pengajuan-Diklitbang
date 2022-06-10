<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function index(){
        return view('dashboard.internship.pengajuan');
    }
}
