<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $this->postJson(route('user.register'), [
            'first_name' => 'shashika',
            'last_name' => 'nuwan',
            'phone_number' => '0769226409',
            'email' => 'shashika@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])
            ->assertCreated();

        $this->assertDatabaseHas('users', ['first_name' => 'shashika']);
    }
}
