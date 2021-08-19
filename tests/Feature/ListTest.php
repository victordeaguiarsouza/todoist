<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ListTest extends TestCase
{
    protected $user;

    public function test_create_list()
    {
        $user = User::factory()->create();

        $response = $this->post('/api/list/store', [
            'user_id' => $user->id,
            'name'    => 'Lista 1 teste'
        ]);

        $response->assertStatus(200);
    }

    public function test_update_list()
    {

        $response = $this->put('/api/list/1', [
            'name' => 'Lista 1 update'
        ]);

        $response->assertStatus(200);
    }

    public function test_delete_list()
    {

        $response = $this->delete('/api/list/1');

        $response->assertStatus(200);
    }

}
