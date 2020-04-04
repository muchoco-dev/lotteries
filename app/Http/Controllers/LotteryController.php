<?php

namespace App\Http\Controllers;

use App\Lottery;
use Illuminate\Http\Request;

class LotteryController extends Controller
{
    public function index()
    {
        return view('lottery.index');
    }

    public function create()
    {
        $lottery = new Lottery;
        $lottery->uname = uniqid();
        $lottery->save();

        return redirect("/k/{$lottery->uname}/edit");
    }

    public function edit($uname)
    {
    
    }
}
