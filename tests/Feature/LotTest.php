<?php

namespace Tests\Feature;

use App\Lot;
use App\Lottery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LotTest extends TestCase
{
    /**
     * くじ引きに登録されているクジの数をjson形式で取得できる
     *
     * @return void
     */
    public function testGetLotsCount()
    {
        $count = 10;

        $lottery = factory(Lottery::class)->create();
        factory(Lot::class, $count)->create([
            'lottery_id' => $lottery->id
        ]);
        $response = $this->json('GET', "/api/lot/{$lottery->uname}/count");
        $response->assertJson([
            'count' => $count
        ]);
    }
}
