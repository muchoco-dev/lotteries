<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    public $timestamps = false;

    public function lottery()
    {
        return $this->belongsTo('App\Lottery');
    }

    /**
     * ランダムでクジを取得
     *
     * @param $lottery_id int
     */
    public static function findRandomByLotteryId($lottery_id)
    {
        return Lot::where('lottery_id', $lottery_id)
            ->inRandomOrder()
            ->first();
    }
}
