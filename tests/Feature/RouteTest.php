<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
//    public function test_example()
//    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
//    }

    public function testAdminRouteAsGuest() {
        $response = $this->get('/admin/article');
        $response->assertRedirect('/login');
    }

    public function testAdminRouteAsAdmin() {
        $admin = Auth::loginUsingId(1);
        $this->actingAs($admin);

        $response = $this->get('/admin/article');
        $response->assertStatus(200);

    }
}
