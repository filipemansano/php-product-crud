<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_can_create_product() {

        $data = [
            'name' => $this->faker->sentence,
            'quantity' => 1,
            'category_id' => Category::factory()->create()->id
        ];

        $this->json('POST','/products', $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    /** @test */
    public function it_can_update_product() {

        $product = Product::factory()->create();

        $data = [
            'name' => $this->faker->sentence,
            'quantity' => 2,
            'category_id' => $product->category_id
        ];

        $this->json('PUT','/products/' . $product->id, $data)
            ->assertStatus(200)
            ->assertJsonFragment([
                'name' => $data['name'],
                'quantity' => (string) ($product->quantity + $data['quantity']),
                'category_id' => (string) $data['category_id'],
            ]);
    }

    /** @test */
    public function it_can_show_product() {

        $product = Product::factory()->create();

        $this->json('GET','/products/' . $product->id)
            ->assertStatus(200);
    }

     /** @test */
    public function it_can_delete_product() {

        $product = Product::factory()->create();

        $this->json('DELETE','/products/' . $product->id)
            ->assertStatus(200);
    }

     /** @test */
    public function it_can_list_products() {

        $products = Product::factory()->count(3)->create();

        $this->json('GET','/products')
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [ 'id', 'name', 'quantity', 'category_id', 'created_at', 'updated_at' ],
            ]);
    }
}
