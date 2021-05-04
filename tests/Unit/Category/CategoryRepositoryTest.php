<?php

namespace Tests\Unit\Category;

use App\Models\Category;
use App\Repositores\Eloquent\CategoryRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryRepositoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_can_delete_the_category()
    {
        $category = Category::factory()->create();

        $categoryRepo = new CategoryRepository($category);
        $delete = $categoryRepo->destroy($category->id);

        $this->assertInstanceOf(Category::class, $delete);
    }

    /** @test */
    public function it_can_update_the_category()
    {
        $category = Category::factory()->create();

        $data = [
            'name' => $this->faker->word,
        ];

        $categoryRepo = new CategoryRepository($category);
        $update = $categoryRepo->update($data, $category->id);

        $this->assertInstanceOf(Category::class, $update);
        $this->assertEquals($data['name'], $update->name);
    }

    /** @test */
    public function it_can_show_the_category()
    {
        $category = Category::factory()->create();
        $categoryRepo = new CategoryRepository(new Category);
        $found = $categoryRepo->show($category->id);

        $this->assertInstanceOf(Category::class, $found);
        $this->assertEquals($found->name, $category->name);
    }

    /** @test */
    public function it_can_make_a_category()
    {
        $data = [
            'name' => $this->faker->word,
        ];

        $categoryRepo = new CategoryRepository(new Category());
        $category = $categoryRepo->store($data);

        $this->assertInstanceOf(Category::class, $category);
        $this->assertEquals($data['name'], $category->name);
    }


    // negative tests

    /** @test */
    public function it_should_throw_update_error_exception_when_the_poroduct_has_failed_to_update()
    {
        $this->expectException(QueryException::class);

        $category = Category::factory()->create();
        $categoryRepo = new CategoryRepository($category);

        $data = ['name' => null];
        $categoryRepo->update($data, $category->id);
    }

     /** @test */
     public function it_should_throw_not_found_error_exception_when_the_category_is_not_found()
     {
        $this->expectException(ModelNotFoundException::class);

        $categoryRepo = new CategoryRepository(new category);
        $categoryRepo->show(999);

        $this->assertTrue(false);
     }

     /** @test */
     public function it_should_throw_an_error_when_the_required_columns_are_not_filled()
     {
        $this->expectException(QueryException::class);

         $categoryRepo = new CategoryRepository(new category);
         $categoryRepo->store([]);
     }
}
