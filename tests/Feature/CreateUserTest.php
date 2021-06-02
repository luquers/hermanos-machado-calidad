<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    public function setUp() : void {
        parent::setUp();

        $this->setBaseRoute('user');
        $this->setBaseModel('App\Models\User');
    }

    /**
     * @test
     */
    public function a_user_can_create_an_user() {
        $user = User::find(1);
        $this->signIn($user);
        $this->create([
            'name' => 'Test',
            'email' => 'test@example.org',
            'password' => '123456789',
            'password_confirmation' => '123456789'
        ]);
    }
}
