<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class billsController extends Controller
{
    public function add()
    {
    	return view('hoadon.addHoaDon');
    }
}
