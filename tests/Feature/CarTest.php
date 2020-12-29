<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Car;
use Tests\TestCase;

class CarTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function only_logged_in_users_can_buy_cars(){
        $response = $this->get('cars/pay')->assertRedirect('/login');
    }
    
    /** @test */
    public function logged_in_users_can_see_status(){
        $this->actingAs(User::factory()->create());
        
        $response = $this->get('cars/1/status')->assertOk();
    }
    
    /** @test */
    
}
