<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LotteryController extends Controller
{
    public function index()
    {
        return view('lottery.index');
    }
}
