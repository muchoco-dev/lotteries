<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    const UPDATED_AT = null;

    public function lots()
    {
        $this->hasMany('App\Lot');
    }

    /**
     * クジの追加が可能なくじ引きを取得
     *
     * @param $uname str
     */
    public static function findAddableLotteryByUname($uname)
    {
        return Lottery::where('uname', $uname)
            //            ->where('created_at', '>=', strtotime('Y-m-d H:i:s', '-'))
            ->where('created_at', '>=', date('Y-m-d H:i:s', strtotime('- ' . config('lottery.deadline'))))
            ->first();
    }
}
