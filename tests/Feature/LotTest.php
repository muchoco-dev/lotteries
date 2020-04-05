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

    /**
     * くじ引きにクジを登録する
     */
    public function testAddLot()
    {
        $lottery = factory(Lottery::class)->create();
        $title = 'test';

        $response = $this->json('POST', "/api/lot/{$lottery->uname}/add", [
            'title' => $title
        ]);
        $response->assertJson([
            'result' => true
        ]);

        $this->assertDatabaseHas('lots', [
            'lottery_id'    => $lottery->id,
            'title'         => $title
        ]);
    }

    /**
     * くじ引きに空のクジは登録できない
     */
    public function testCanNotAddNullTitleLot()
    {
        $lottery = factory(Lottery::class)->create();

        $response = $this->json('POST', "/api/lot/{$lottery->uname}/add", []);
        $response->assertJsonValidationErrors(['title']);
    }

    /**
     * 1つのくじ引きに重複するクジは登録できない
     */
    public function testCanNotAddDuplicationLot()
    {
        $lottery = factory(Lottery::class)->create();
        $title = 'Duplication';

        $this->json('POST', "/api/lot/{$lottery->uname}/add", [
            'title' => $title
        ]);
        $response = $this->json('POST', "/api/lot/{$lottery->uname}/add", [
            'title' => $title
        ]);
        $response->assertJsonValidationErrors(['title']);
    }
}
