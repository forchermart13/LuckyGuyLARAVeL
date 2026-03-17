<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewProController extends Controller
{
    public function showProducts()
    {
        return view('admin.viewpro');
    }
}