<?php

namespace Sukohi\LaravelJsHelper\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class AccessToJsTest extends TestCase
{
    public function test_js_route_exists()
    {
        $response = $this->get('/js/helper.js');

        $response->assertStatus(200);
    }

    public function test_constants_can_be_shown()
    {
        $checking_text = Str::random(10);

        config(['js_helper.constants' => [
            'TEST_NAME' => $checking_text,
        ]]);
        $response = $this->get('/js/helper.js');

        $response->assertSeeText('"'. $checking_text .'"', $escaped = false);
    }
}
