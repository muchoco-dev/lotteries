<?php

namespace App\Http\Controllers;

use App\Lot;
use App\Lottery;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LotController extends Controller
{
    /**
     * 登録されているクジの数をjsonで返す
     *
     * @param str $uname
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

    /**
     * クジを登録する
     *
     * @param Request $request
     * @param string  $uname
     */
    public function add(Request $request, $uname)
    {
        // 追加可能ならくじ引きデータを取得
        $lottery = Lottery::findAddableLotteryByUname($uname);
        if (!$lottery) {
            return response()->json([
                'result' => false
            ]);
        }

        // バリデーション
        $request->validate([
            'title' => [
                'required',
                'max:255',
                Rule::unique('lots', 'title')
                    ->where('lottery_id', $lottery->id)
            ]
        ]);

        // 保存
        $lot = new Lot;
        $lot->lottery_id = $lottery->id;
        $lot->title = $request->title;
        $lot->save();

        return response()->json([
            'result' => true
        ]);
    }
}
