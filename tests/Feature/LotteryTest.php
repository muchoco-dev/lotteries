<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LotteryTest extends TestCase
{
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
}
