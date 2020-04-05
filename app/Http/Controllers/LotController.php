<?php

namespace App\Http\Controllers;

use App\Lottery;
use Illuminate\Http\Request;

class LotController extends Controller
{
    /**
     * 登録されているクジの数をjsonで返す
     *
     * @param $uname str
     *
     */
    public function getCount($uname)
    {
        $lottery = Lottery::where('uname', $uname)
                    ->first();
        if ($lottery) {
            $count = $lottery->lots()->count();
        }
        return response()->json([
           'count' => $count
        ]);
    }
}
