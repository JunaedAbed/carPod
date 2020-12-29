<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Admin;
use App\Models\Car;
use Tests\TestCase;


class AdminTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function an_admin_can_see_requests(){
        
        $this->withoutMiddleware();
         
        $this->actingAs(Admin::factory()->create());
        
        $response = $this->get('admin/requests')->assertOk();
    }
    
    /** @test */
    public function admin_can_see_customers(){
        
        $this->withoutMiddleware();
         
        $this->actingAs(Admin::factory()->create());
        
        $response = $this->get('admin/customers')->assertOk();
    }
    
    /** @test */
    public function admin_can_see_messages(){
        
        $this->withoutMiddleware();
         
        $this->actingAs(Admin::factory()->create());
        
        $response = $this->get('admin/client_messages')->assertOk();
    }
    
     /** @test */
    public function a_car_can_be_added_to_the_database()
    {
        $this->withoutMiddleware();
          
        $file = UploadedFile::fake()->image('test.jpg');
        
        $response = $this->post('admin/', [
            'car_name' => 'test',
            'car_type' => 'test',
            'image' => $file,
            'hire_cost' => 20000,
            'capacity' => 2,
            'year' => 2020,
            'color' => 'test',
            'chassis' => 'test',
            'status' => 'test',
        ]);

        

        $this->assertCount(1, Car::all());
        
    }
    
     
}

