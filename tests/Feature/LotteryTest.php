<?php

namespace Tests\Feature;

use App\Lottery;
use App\Lot;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class LotteryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * indexページの表示
     *
     * @return void
     */
    public function testGuestCanViewIndexPage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * 新しいくじ引きが作成される
     *
     * @return void
     */
    public function testNewLotteryCreated()
    {
        $beforeCount = DB::table('lotteries')->count();

        $response = $this->get('/k/create');

        $afterCount = DB::table('lotteries')->count();
        $this->assertEquals($beforeCount + 1, $afterCount);
    }

    /**
     * 作成ページから編集ページへリダイレクト
     *
     * @return void
     */
    public function testRedirectToEditPage()
    {
        $response = $this->get('/k/create');
        $lottery = DB::table('lotteries')->orderBy('id', 'desc')->first();

        $response->assertRedirect("/k/{$lottery->uname}/edit");
    }

    /**
     * 編集ページの表示
     *
     * @return void
     */
    public function testGuestCanViewEditPage()
    {
        $lottery = factory(Lottery::class)->create();
        $response = $this->get("/k/{$lottery->uname}/edit");
        $response->assertStatus(200);
    }

    /**
     * 存在しないunameの編集ページにアクセスしたら、表示ページにリダイレクト
     *
     * @return void
     */
    public function testEmptyEditPageRedirectToShowPage()
    {
        $response = $this->get('/k/empty/edit');
        $response->assertRedirect('/k/empty');
    }

    /**
     * 編集期限が切れている編集ページにアクセスしたら、表示ページにリダイレクト
     *
     * @return void
     */
    public function testNotEditablePageRedirectToShowPage()
    {
        $lottery = factory(Lottery::class)->create([
            'created_at' => date('Y-m-d H:i:s', strtotime('-2 hours'))
        ]);
        $response = $this->get("/k/{$lottery->uname}/edit");
        $response->assertRedirect("/k/{$lottery->uname}");
    }

    /**
     * くじ引きページの表示
     *
     * @return void
     */
    public function testGuestCanViewShowPage()
    {
        $lottery = factory(Lottery::class)->create();
        $response = $this->get("/k/{$lottery->uname}/");
        $response->assertStatus(200);
    }

}
