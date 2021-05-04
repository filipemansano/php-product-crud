<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_can_create_category() {

        $data = [
            'name' => $this->faker->sentence
        ];

        $this->json('POST','/categories', $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    /** @test */
    public function it_can_update_category() {

        $category = Category::factory()->create();

        $data = [
            'name' => $this->faker->sentence
        ];

        $this->json('PUT','/categories/' . $category->id, $data)
            ->assertStatus(200)
            ->assertJson([
                'name' => $data['name']
            ]);
    }

    /** @test */
    public function it_can_show_category() {

        $category = Category::factory()->create();

        $this->json('GET','/categories/' . $category->id)
            ->assertStatus(200);
    }

     /** @test */
    public function it_can_delete_category() {

        $category = Category::factory()->create();

        $this->json('DELETE','/categories/' . $category->id)
            ->assertStatus(200);
    }

     /** @test */
    public function it_can_list_categories() {

        $categories = Category::factory()->count(3)->create();

        $this->json('GET','/categories')
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [ 'id', 'name', 'created_at', 'updated_at' ],
            ]);
    }
}
