<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Message;

class MessageTest extends TestCase
{
    use RefreshDatabase;
     /** @test */
    public function users_can_send_messages()
    {
        
        $response = $this->post('message/', [
            'client_id' => 1,
            'message' => 'test',
            'status' => 'Unread',
            'time' => now(),
        ]);

        $response = $this->get('cars/message')->assertOk();
    }
}
