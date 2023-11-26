<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\models\Item;
use App\models\User;
use Tests\TestCase;

class ItemsTest extends TestCase
{
    //runs and refreshes the database sqlite 
    use RefreshDatabase;
    // runs a test for an auntheticated user having empty items in the database
    public function test_dashboardpage_contains_empty_tables()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get(uri:'/dashboard');
        $response->assertStatus(status:200);
        $response->assertSee(__(key:'No Items Found'));
        

       
    }
    //runs a test for an auntheticated user creating items in the database
    public function test_dashboardpage_contains_non_empty_tables()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        Item::create([
            'user_id' => $user->id,
            'name' => 'Saar',
            'quantity' => '6',
            'description' => 'hello',
            'category_id' => 1,
            'priority_id' => 1
        ]);
        $response = $this->get(uri:'/dashboard');
        $response->assertStatus(status:200);
        $response->assertDontSee(__(key:'No Items Found'));
        

       
    }
}
